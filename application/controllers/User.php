<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('blog', $this->session->userdata('language'));
    }

    public function signup() {
        $data['title'] = lang('ecn').' | '.lang('register');
        $data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
        $data['view'] = 'external/user/registration';
        $data['sidebar'] = 'external/sidebars/sidebar-short';
        $this->load->view('external/index', $data);
    }

    public function forgot() {
        if (!$this->session->userdata('ecnuserauth')) {
            $data['title'] = lang('ecn').' | '.lang('recoverpass');
            $data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
            $data['view'] = 'external/user/forgotpassword';
            $data['sidebar'] = 'external/sidebars/sidebar-short';
            $this->load->view('external/index', $data);
        }else{
            redirect($this->agent->referrer());
        }
    }

    public function signin() {
        if (!$this->session->userdata('ecnuserauth')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[9]|max_length[30]|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]|max_length[20]');
            if ($this->form_validation->run() == TRUE) {
                $udata = array(
                    'email' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'active' => 1,
                );
                $user = $this->external_model->login_query('tb_users', $udata);
                if ($user != FALSE) {
                    $uauthdata = array('id' => $user->id, 'email' => $user->email, 'name' => $user->name, 'photo' => $user->photo);
                    $this->session->set_userdata('ecnuserauth', $uauthdata);
                    $this->session->set_flashdata('successtoast', lang('login_success'));
                } else {
                    $this->session->set_flashdata('errorstoast', lang('login_error'));
                }
            } else {
                $this->session->set_flashdata('errorstoast', validation_errors());

            }
        }
        redirect($this->agent->referrer());
    }

    public function myaccount(){
        if ($userd = $this->session->userdata('ecnuserauth')) {
            $data['title'] = lang('ecn').' | '.lang('profile');
            $data['intro'] = $this->external_model->exsquery('tb_posts', array('intro' => 1));
            $data['user'] = $this->external_model->exsquery('tb_users', array('id' => $userd['id']));
            $data['view'] = 'external/user/myaccount';
            $data['sidebar'] = 'external/sidebars/sidebar-short';
            $this->load->view('external/index', $data);
        }else{
            redirect($this->agent->referrer());
        }
    }

    public function registration(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[40]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|min_length[9]|max_length[40]|is_unique[tb_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|xss_clean|required|min_length[6]|max_length[20]|matches[password]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean|min_length[11]|max_length[14]');
        $this->form_validation->set_rules('about', 'About', 'trim|xss_clean|max_length[200]');
        $this->form_validation->set_rules('terms', 'Terms & Conditions', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'mobile' => $this->input->post('mobile'),
                'about' => $this->input->post('about'),
                'photo' => mycrypt::single_image('assets/external/img/users', 'photo'),
                'token' => sha1(mycrypt::randompass()),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            $config['smtp_host'] = 'ecnbd.com';
            $config['smtp_user'] = 'info@ecnbd.com';
            $config['smtp_pass'] = 'pB4&R]bbRd7w';
            $config['smtp_port'] = '465';
            $this->email->initialize($config);
            $message = $this->load->view('external/email/confirm-user', $data, TRUE);
            $this->email->from('info@ecnbd.com', 'ECN Bangladesh');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Account Activation');
            $this->email->message($message);
            if($this->email->send()){
                $this->external_model->exinsert('tb_users', $data);
                $this->session->set_flashdata('successtoast', lang('reg_success'));
            }else{
                $this->session->set_flashdata('errorstoast', lang('reg_error'));
            }
        } else {
            $this->session->set_flashdata('errorstoast', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function forgotpassword(){
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|min_length[9]|max_length[40]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|xss_clean|required|min_length[6]|max_length[20]|matches[password]');
        if ($this->form_validation->run() == TRUE) {
            $user = $this->external_model->login_query('tb_users', array('email' => $this->input->post('email')));
            if ($user != FALSE){
                $newdata = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'token' => $user->token,
                );
                $config['smtp_host'] = 'ecnbd.com';
                $config['smtp_user'] = 'info@ecnbd.com';
                $config['smtp_pass'] = 'pB4&R]bbRd7w';
                $config['smtp_port'] = '465';
                $this->email->initialize($config);
                $message = $this->load->view('external/email/forgotpassword', $newdata, TRUE);
                $this->email->from('info@ecnbd.com', 'ECN Bangladesh');
                $this->email->to($this->input->post('email'));
                $this->email->subject('New Password Activation');
                $this->email->message($message);
                if($this->email->send()){
                    $this->session->set_flashdata('successtoast', lang('pc_success'));
                }else{
                    $this->session->set_flashdata('errorstoast', lang('reg_error'));
                }
            }
        } else {
            $this->session->set_flashdata('errorstoast', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function changeuserpassbyemail(){
        $password = $this->uri->segment(3);
        $token = $this->uri->segment(4);
        if ($token != NULL && $this->input->get('email') != NULL) {
            $data = array('password' => $password, 'ip' => $this->input->ip_address());
            if ($this->external_model->exupdate('tb_users', $data, array('email' => $this->input->get('email'), 'token' => $token))) {
                redirect('welcome/success?id=u');
            } else {
                redirect('welcome/error?id=u');
            }
        }
    }

    public function updatepass(){
        if ($this->session->userdata('ecnuserauth')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|xss_clean|required|min_length[6]|max_length[20]|matches[password]');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'password' => md5($this->input->post('password')),
                    'ip' => $this->input->ip_address(),
                );
                if ($this->external_model->exupdate('tb_users', $data, array('id' => $this->input->post('puserid'), 'password' => md5($this->input->post('oldpassword'))))) {
                    $this->session->set_flashdata('usuccess', lang('uup_success'));
                } else {
                    $this->session->set_flashdata('uerrors', lang('uup_error'));
                }
            }
        }
        redirect($this->agent->referrer());
    }

    public function update(){
        if ($this->session->userdata('ecnuserauth')) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[40]');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean|min_length[11]|max_length[14]');
            $this->form_validation->set_rules('about', 'About', 'trim|xss_clean|max_length[200]');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'about' => $this->input->post('about'),
                    'ip' => $this->input->ip_address(),
                );
                if($_FILES['photo']['name'] != NULL) {
                    $data['photo'] = mycrypt::single_image('assets/external/img/users', 'photo');
                }
                if ($this->external_model->exupdate('tb_users', $data, array('id' => $this->input->post('userid')))) {
                    $this->session->set_flashdata('usuccess', lang('uup_success'));
                } else {
                    $this->session->set_flashdata('uerrors', lang('uup_error'));
                }
            } else {
                $this->session->set_flashdata('uerrors', validation_errors());
            }
        }
        redirect($this->agent->referrer());
    }

    public function activateuserbyemail($token){
        if ($token != NULL && $this->input->get('email') != NULL) {
            $data = array('active' => 1, 'ip' => $this->input->ip_address());
            $where = array('token' => $token, 'email' => $this->input->get('email'));
            if ($this->external_model->exupdate('tb_users', $data, $where)) {
                redirect('welcome/success?id=u');
            } else {
                redirect('welcome/error?id=u');
            }
        }
    }

    public function signout(){
        if ($this->session->userdata('ecnuserauth')){
            #$this->session->sess_destroy();
            $this->session->unset_userdata('ecnuserauth');
            $this->session->set_flashdata('successtoast', lang('logout_success'));
        }
        redirect('article');
    }
}