<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function adminlogin() {
        if (!$this->session->userdata('coadminauth')) {
            $data['title'] = 'Admin | Login';
            $this->load->view('internal/signin', $data);
        }else{
            redirect('admin/dashboard');
        }

    }

    public function adminsignin() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[9]|max_length[30]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[20]');
        if ($this->form_validation->run() == TRUE) {
            $adata = array(
                'email' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'active' => 1,
            );
            $admin = $this->external_model->login_query('tb_admin', $adata);
            if ($admin != FALSE) {
                #&& mycrypt::ipcheck($admin->IPs)
                $authdata = array('id' => $admin->id, 'email' => $admin->email, 'name' => $admin->name, 'photo' => $admin->photo, 'role' => $admin->role);
                $this->session->set_userdata('coadminauth', $authdata);
                $this->session->set_userdata('language', 'english');
                $this->external_model->exinsert('tb_logs', array('user' => $admin->id, 'ip' => $this->input->ip_address(), 'login' => time(), 'device' => $this->agent->browser() . ' ' . $this->agent->version()));
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        }
    }

    public function adminsignout() {
        $lid = mycrypt::lastrecord('tb_logs', array('user' => $this->session->userdata('coadminauth')['id']));
        $this->external_model->exupdate('tb_logs', array('logout' => time()), array('id' => $lid));
        #$this->session->unset_userdata('coadminauth');
        $this->session->sess_destroy();
        redirect('admin/signin');
    }

}
