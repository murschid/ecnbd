<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('blog', $this->session->userdata('language'));
        $this->load->model(array('admin_model', 'external_model'));
    }

    public function add_moderator() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|min_length[9]|max_length[30]|is_unique[tb_admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('passwordtwo', 'Confirm Password', 'trim|xss_clean|required|min_length[6]|max_length[20]|matches[password]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'education' => $this->input->post('education'),
                'profession' => $this->input->post('profession'),
                'skills' => $this->input->post('skills'),
                'location' => $this->input->post('location'),
                'facebook' => $this->input->post('facebook'),
                'token' => sha1(uniqid()),
                'photo' => mycrypt::single_image('assets/internal/img/admin', 'photo'),
                'IPs' => $this->input->ip_address(),
                'last_update' => time(),
                'time' => time(),
            );
            if ($this->admin_model->adinsert('tb_admin', $data)) {
                $this->admin_model->adinsert('tb_settings', array('user' => $data['email'], 'time' => time()));
                $data['title'] = 'Confirm | Account';
                $data['modpassword'] = $this->input->post('password');
                if (!mycrypt::localhost()) {
                    $config['smtp_host'] = 'ecnbd.com';
                    $config['smtp_user'] = 'info@ecnbd.com';
                    $config['smtp_pass'] = 'pB4&R]bbRd7w';
                    $config['smtp_port'] = '465';
                    $this->email->initialize($config);
                    $message = $this->load->view('internal/email/confirmEmail', $data, TRUE);
                    $this->email->from('info@ecnbd.com', 'ECN Bangladesh - Admin');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Account Confirmation');
                    $this->email->message($message);
                    $this->email->send();
                } else {
                    redirect('email/confirm');
                }
                $this->session->set_flashdata('success', 'Registration successful');
            } else {
                $this->session->set_flashdata('errors', 'Registration unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function add_post() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|min_length[6]|max_length[200]');
        $this->form_validation->set_rules('shortdesc', 'Short Denscription', 'trim|xss_clean|min_length[6]|max_length[400]');
        $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean|required|min_length[100]');
        $this->form_validation->set_rules('writer', 'Writer', 'trim|xss_clean|min_length[6]|max_length[150]');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean|min_length[3]|max_length[150]');
        $this->form_validation->set_rules('caption', 'Caption', 'trim|xss_clean|min_length[3]|max_length[150]');
        #$this->form_validation->set_rules('photo', 'Photo', 'required');
        #$this->form_validation->set_rules('thumbnail', 'Thumbnail', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'short_desc' => $this->input->post('shortdesc'),
                'description' => $this->input->post('description'),
                'writer' => $this->input->post('writer'),
                'category' => $this->input->post('category'),
                'tags' => $this->input->post('tags'),
                'intro' => $this->input->post('intro'),
                'selected' => $this->input->post('selected'),
                'thumbnail' => mycrypt::thumbnail('assets/external/img/thumbnails', 'thumbnail'),
                'caption' => $this->input->post('caption'),
                'photo_credit' => $this->input->post('photocredit'),
                'main_article' => $this->input->post('mainlink'),
                'link_title' => $this->input->post('linktitle'),
                'language' => $this->input->post('language'),
                'images' => mycrypt::single_image('assets/external/img/posts', 'photo'),
                'moderator' => $this->session->userdata('coadminauth')['name'],
                'archive' => date('mY', time()),
                'ip' => $this->input->ip_address(),
                'updated' => time(),
                'time' => time(),
            );
            if ($this->admin_model->adinsert('tb_posts', $data)) {
                $this->session->set_flashdata('success', 'News entry successful');
            } else {
                $this->session->set_flashdata('errors', 'News entry unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function update_post() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|min_length[6]|max_length[220]');
        $this->form_validation->set_rules('shortdesc', 'Short Denscription', 'trim|xss_clean|min_length[6]|max_length[400]');
        $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean|required|min_length[100]');
        $this->form_validation->set_rules('writer', 'Writer', 'trim|xss_clean|min_length[6]|max_length[150]');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean|min_length[3]|max_length[150]');
        $this->form_validation->set_rules('caption', 'Caption', 'trim|xss_clean|min_length[3]|max_length[150]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'short_desc' => $this->input->post('shortdesc'),
                'description' => $this->input->post('description'),
                'writer' => $this->input->post('writer'),
                'category' => $this->input->post('category'),
                'tags' => $this->input->post('tags'),
                'intro' => $this->input->post('intro'),
                'selected' => $this->input->post('selected'),
                'caption' => $this->input->post('caption'),
                'photo_credit' => $this->input->post('photocredit'),
                'main_article' => $this->input->post('mainlink'),
                'link_title' => $this->input->post('linktitle'),
                'language' => $this->input->post('language'),
                'ip' => $this->input->ip_address(),
                'updated' => time(),
            );
            if($_FILES['photo']['name'] != NULL) {
                $data['images'] = mycrypt::single_image('assets/external/img/posts', 'photo');
            }
            if($_FILES['thumbnail']['name'] != NULL) {
                $data['thumbnail'] = mycrypt::thumbnail('assets/external/img/thumbnails', 'thumbnail');
            }
            if ($this->admin_model->adupdate('tb_posts', $data, array('id' => $this->input->post('postid')))) {
                $this->session->set_flashdata('success', 'News update successful');
            } else {
                $this->session->set_flashdata('errors', 'News update unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function addcontact() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|min_length[9]|max_length[40]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean|min_length[11]|max_length[14]');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|min_length[3]|max_length[500]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->admin_model->adinsert('tb_contacts', $data)) {
                $this->session->set_flashdata('success', lang('con_success'));
            } else {
                $this->session->set_flashdata('errors', lang('con_error'));
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function addcategory() {
        $this->form_validation->set_rules('bcategory', 'Bengali Category', 'trim|required|xss_clean|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('ecategory', 'English Category', 'trim|required|xss_clean|min_length[3]|max_length[100]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'category' => $this->input->post('bcategory'),
                'english' => $this->input->post('ecategory'),
                'moderator' => $this->session->userdata('coadminauth')['name'],
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->admin_model->adinsert('tb_category', $data)) {
                $this->session->set_flashdata('success', 'Added Successfully');
            } else {
                $this->session->set_flashdata('errors', 'Operation Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function advertisement() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('advertise', 'Advertisement Code', 'trim|required|xss_clean|min_length[3]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'advertise' => $this->input->post('advertise'),
                'moderator' => $this->session->userdata('coadminauth')['name'],
                'active' => $this->input->post('active'),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->admin_model->adinsert('tb_advertise', $data)) {
                $this->session->set_flashdata('success', 'Insertion Successful');
            } else {
                $this->session->set_flashdata('errors', 'Insertion Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function addbreaking() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('breaking', 'Breaking News', 'trim|required|xss_clean|min_length[3]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'breaking' => $this->input->post('breaking'),
                'moderator' => $this->session->userdata('coadminauth')['name'],
                'active' => $this->input->post('active'),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->admin_model->adinsert('tb_breaking', $data)) {
                $this->session->set_flashdata('success', 'Insertion Successful');
            } else {
                $this->session->set_flashdata('errors', 'Insertion Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function update_advertise() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('advertise', 'Advertisement Code', 'trim|required|xss_clean|min_length[3]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'advertise' => $this->input->post('advertise'),
                'moderator' => $this->session->userdata('coadminauth')['name'],
                'active' => $this->input->post('active'),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->admin_model->adupdate('tb_advertise', $data, array('id' => $this->input->post('addvid')))) {
                $this->session->set_flashdata('success', 'Update Successful');
            } else {
                $this->session->set_flashdata('errors', 'Update Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function generalupdate() {
        $this->form_validation->set_rules('gencontent', 'Content', 'trim|required|xss_clean|min_length[3]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'content' => $this->input->post('gencontent'),
                'moderator' => $this->session->userdata('coadminauth')['name'],
                'time' => time(),
            );
            if ($this->admin_model->adupdate('tb_general', $data, array('id' => $this->input->post('generalid')))) {
                $this->session->set_flashdata('successtoast', 'Update successful!');
            } else {
                $this->session->set_flashdata('errorstoast', 'Update unsuccessful!');
            }
        } else {
            $this->session->set_flashdata('errorstoast', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function breakingupdate() {
        $this->form_validation->set_rules('breaking', 'Breaking', 'trim|required|xss_clean|min_length[3]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('brtitle'),
                'breaking' => $this->input->post('breaking'),
                'moderator' => $this->session->userdata('coadminauth')['name'],
                'time' => time(),
            );
            if ($this->admin_model->adupdate('tb_breaking', $data, array('id' => $this->input->post('breakid')))) {
                $this->session->set_flashdata('successtoast', 'Update successful!');
            } else {
                $this->session->set_flashdata('errorstoast', 'Update unsuccessful!');
            }
        } else {
            $this->session->set_flashdata('errorstoast', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function update_moderator() {
        if ($this->input->get('key') == 'admin' && $this->session->userdata('coadminauth')['role'] == 'admin') {
            $profile = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'education' => $this->input->post('education'),
                'profession' => $this->input->post('profession'),
                'skills' => $this->input->post('skills'),
                'location' => $this->input->post('location'),
                'facebook' => $this->input->post('facebook'),
                'IPs' => $this->input->post('ipaddress'),
                'last_update' => time(),
            );
        } else {
            $profile = array(
                'name' => $this->input->post('name'),
                'education' => $this->input->post('education'),
                'profession' => $this->input->post('profession'),
                'skills' => $this->input->post('skills'),
                'location' => $this->input->post('location'),
                'facebook' => $this->input->post('facebook'),
                'about' => $this->input->post('about'),
                'IPs' => $this->input->post('ipaddress'),
                'last_update' => time(),
            );
        }
        if($_FILES['photo']['name'] != NULL) {
            $profile['photo'] = mycrypt::single_image('assets/internal/img/admin', 'photo');
        }
        if ($this->admin_model->adupdate('tb_admin', $profile, array('email' => $this->session->userdata('coadminauth')['email']))) {
            $this->session->set_flashdata('successtoast', 'Update successful!');
        } else {
            $this->session->set_flashdata('errorstoast', 'Update unsuccessful!');
        }
        redirect($this->agent->referrer());
    }

    public function updatemodpass(){
        $this->form_validation->set_rules('curpassword', 'Current Password', 'trim|xss_clean|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|xss_clean|required|min_length[6]|max_length[20]|matches[password]');
        if ($this->form_validation->run() == TRUE) {
            if ($this->admin_model->adupdate('tb_admin', array('password' => md5($this->input->post('password'))), array('id' => $this->input->post('modid'), 'email' => $this->session->userdata('coadminauth')['email']))) {
                $this->session->set_flashdata('successtoast', 'Update successful!');
            } else {
                $this->session->set_flashdata('errorstoast', 'Update unsuccessful!');
            }
        }else{
            $this->session->set_flashdata('errorstoast', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function chatmsg() {
        if ($this->input->post('data') != NULL) {
            $data = array(
                'text' => $this->input->post('data'),
                'mod' => $this->session->userdata('coadminauth')['id'],
                'user' => $this->session->userdata('chatid'),
                'sender' => 'm',
                'time' => time()
            );
            $this->admin_model->adinsert('tb_chatting', $data);
        }
    }

}
