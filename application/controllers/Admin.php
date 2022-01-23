<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('admin', $this->session->userdata('language'));
        $this->load->model('admin_model');
        Mycrypt::onlinecounter();
        if (!$this->session->userdata('coadminauth')) {
            redirect('admin/signin');
        }
    }

    public function dashboard() {
        $last = mycrypt::countbygrp('tb_chatting', 'user', array('sender' => 'u'));
        $cid = $this->input->get('msg') ? $this->input->get('msg') : $last;
        $this->session->set_userdata('chatid', $cid);
        $data['title'] = 'Admin | Dashboard';
        $data['dashcls'] = array('main' => 'active', 'first' => 'active');
        $data['chats'] = $this->admin_model->getchathead('tb_chatting', 'DESC', 'user', array('sender' => 'u'));
        $data['messages'] = $this->admin_model->getchatmsg('tb_chatting', 'DESC', array('user' => $cid));
        $data['posts'] = $this->admin_model->adquery('tb_posts', NULL, 10, 'DESC', array());
        $data['comments'] = $this->admin_model->adquery('tb_comments', NULL, 10, 'DESC', array());
        $this->admin_model->adupdate('tb_chatting', array('seen' => 1), array('user' => $cid));
        $data['setting'] = mycrypt::settings();
        if ($data['setting']->refresh >= 60) {
            header('refresh:' . $data['setting']->refresh);
        }
        $data['header'] = array('internal/header', lang('dashboard'));
        $data['view'] = 'internal/dashboard';
        $this->load->view('internal/starter', $data);
    }

    public function visitors() {
        $data['title'] = 'Admin | Visitors';
        $data['visitorcls'] = 'active';
        #Pagination_Start
        $config['base_url'] = base_url('admin/visitors');
        $config['total_rows'] = $this->external_model->countall('tb_visitors', array());
        $offset = $this->uri->segment(3);
        $limit = $config['per_page'] = 100;
        $config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination_End
        $data['visitors'] = $this->admin_model->adquery('tb_visitors', $offset, $limit, 'DESC', array('country !=' => NULL));
        $data['header'] = array('internal/header', lang('visitors'));
        $data['view'] = 'internal/visitors';
        $this->load->view('internal/starter', $data);
    }

    public function myprofile() {
        $data['title'] = 'Admin | Profile';
        $data['profile'] = $this->admin_model->adsquery('tb_admin', array('email' => $this->session->userdata('coadminauth')['email']));
        $data['header'] = array('internal/header', 'Profile');
        $data['view'] = 'internal/myprofile';
        $this->load->view('internal/starter', $data);
    }

    public function moderators() {
        $data['title'] = 'Admin | Moderators';
        $data['modcls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        $data['moderstors'] = $this->admin_model->adquery('tb_admin', NULL, NULL, 'DESC', array('role !=' => 'admin'));
        $data['header'] = array('internal/header', lang('moderators'));
        $data['view'] = 'internal/admins';
        $this->load->view('internal/starter', $data);
    }

    public function posts() {
        $data['title'] = 'Admin | Posts';
        $data['postcls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        #Pagination_Start
        $config['base_url'] = base_url('admin/posts');
        $config['total_rows'] = $this->external_model->countall('tb_posts', array());
        $offset = $this->uri->segment(3);
        $limit = $config['per_page'] = 50;
        $config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination_End
        $data['posts'] = $this->admin_model->adquery('tb_posts', $offset, $limit, 'DESC', array());
        $data['header'] = array('internal/header', lang('moderators'));
        $data['view'] = 'internal/posts';
        $this->load->view('internal/starter', $data);
    }

    public function breaking() {
        $data['title'] = 'Admin | Posts';
        $data['postcls'] = array('open' => 'menu-open', 'main' => 'active', 'second' => 'active');
        $data['breakings'] = $this->admin_model->adquery('tb_breaking', NULL, 20, 'DESC', array());
        $data['header'] = array('internal/header', lang('moderators'));
        $data['view'] = 'internal/breaking';
        $this->load->view('internal/starter', $data);
    }

    public function advertise() {
        $data['title'] = 'Admin | Advertisements';
        $data['adscls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        $data['advertises'] = $this->admin_model->adquery('tb_advertise', NULL, NULL, 'ASC', array());
        $data['header'] = array('internal/header', lang('moderators'));
        $data['view'] = 'internal/advertise';
        $this->load->view('internal/starter', $data);
    }

    public function comments() {
        $data['title'] = 'Admin | Comments';
        $data['cmntcls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        $data['comments'] = $this->admin_model->adquery('tb_comments', NULL, 100, 'DESC', array());
        $data['header'] = array('internal/header', lang('moderators'));
        $data['view'] = 'internal/comments';
        $this->load->view('internal/starter', $data);
    }

    public function newpost() {
        $data['title'] = 'Admin | New Post';
        $data['postcls'] = array('open' => 'menu-open', 'main' => 'active', 'third' => 'active');
        $data['header'] = array('internal/header', lang('moderators'));
        $data['categories'] = $this->admin_model->adquery('tb_category', NULL, NULL, 'ASC', array());
        $data['view'] = 'internal/forms/post';
        $this->load->view('internal/starter', $data);
    }

    public function addmoderator() {
        $data['title'] = 'Admin | Moderators';
        $data['modcls'] = array('open' => 'menu-open', 'main' => 'active');
        $data['header'] = array('internal/header', lang('moderators'));
        $data['view'] = 'internal/forms/moderator';
        $this->load->view('internal/starter', $data);
    }

    public function users() {
        $data['title'] = 'Admin | Users';
        $data['modcls'] = array('open' => 'menu-open', 'main' => 'active', 'second' => 'active');
        #Pagination_Start
        $config['base_url'] = base_url('admin/users');
        $config['total_rows'] = $this->external_model->countall('tb_users', array());
        $offset = $this->uri->segment(3);
        $limit = $config['per_page'] = 50;
        $config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination_End
        $data['users'] = $this->admin_model->adquery('tb_users', $offset, $limit, 'DESC', array());
        $data['header'] = array('internal/header', lang('users'));
        $data['view'] = 'internal/users';
        $this->load->view('internal/starter', $data);
    }

    public function mailing() {
        $data['title'] = 'Admin | Mailing';
        $data['mailcls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        $data['header'] = array('internal/header', lang('Email'));
        $data['view'] = 'internal/forms/email';
        $this->load->view('internal/starter', $data);
    }

    public function sentitem() {
        $data['title'] = 'Admin | Sent Mail';
        $data['mailcls'] = array('open' => 'menu-open', 'main' => 'active', 'second' => 'active');
        $data['sentmails'] = $this->admin_model->adquery('tb_emails', NULL, NULL, 'DESC', array());
        $data['header'] = array('internal/header', 'Sent Item');
        $data['view'] = 'internal/sentmail';
        $this->load->view('internal/starter', $data);
    }

    public function contact() {
        $data['title'] = 'Admin | Contact';
        $data['msgcls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        $data['messages'] = $this->admin_model->adquery('tb_contacts', NULL, NULL, 'DESC', array());
        $data['header'] = array('internal/header', 'Message');
        $data['view'] = 'internal/contactmsg';
        $this->load->view('internal/starter', $data);
    }

    public function category(){
        $data['title'] = 'Admin | Mailing';
        $data['catcls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        $data['categories'] = $this->admin_model->adquery('tb_category', NULL, NULL, 'ASC', array());
        $data['header'] = array('internal/header', lang('Email'));
        $data['view'] = 'internal/forms/category';
        $this->load->view('internal/starter', $data);
    }

    public function logs() {
        if ($this->session->userdata('coadminauth')['role'] == 'admin') {
            $data['title'] = 'Admin | Contact';
            $data['logscls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
            $data['logs'] = $this->admin_model->logdata();
            $data['header'] = array('internal/header', 'Logs');
            $data['view'] = 'internal/logs';
            $this->load->view('internal/starter', $data);
        } else {
            redirect($this->agent->referrer());
        }
    }

    public function general(){
        $data['title'] = 'Admin | General';
        $data['gnrlcls'] = array('open' => 'menu-open', 'main' => 'active', 'first' => 'active');
        $data['generals'] = $this->admin_model->adquery('tb_general', NULL, NULL, 'ASC', array());
        $data['header'] = array('internal/header', lang('moderators'));
        $data['view'] = 'internal/general';
        $this->load->view('internal/starter', $data);
    }

    public function dltcache() {
        $this->output->delete_cache('admin/signin');
        $this->session->set_flashdata('successtoast', 'Cache clean is successful');
        redirect($this->agent->referrer());
    }

}
