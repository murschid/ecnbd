<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('admin', $this->session->userdata('language'));
        if (mycrypt::localhost()) {
            $ip = "" . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
            #Mycrypt::userinfo($ip);
        }
        Mycrypt::onlinecounter();
    }

    public function index() {
        #$this->output->cache(1440);
        $data['title'] = 'Welcome';
        $data['view'] = 'external/content';
        $this->load->view('welcome/index', $data);
    }

    public function subscribe() {
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|min_length[9]|max_length[30]|is_unique[tb_subscribers.email]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'email' => $this->input->post('email'),
                'token' => sha1(uniqid()),
                'ip' => $this->input->ip_address(),
                'time' => time(),
            );
            if ($this->external_model->exinsert('tb_subscribers', $data)) {
                $this->session->set_flashdata('success', 'Subscription successful');
            } else {
                $this->session->set_flashdata('errors', 'Subscription unsuccessful');
            }
        }
        redirect($this->agent->referrer());
    }

    public function success() {
        if($this->input->get('id') == 'u'){
            $data['link'] = base_url('article.html');
        }elseif ($this->input->get('id') == 'a'){
            $data['link'] = base_url('admin/signin.html');
        }
        $data['title'] = 'Success | Account';
        $data['view'] = 'internal/email/success';
        $this->load->view('internal/email/starter', $data);
    }

    public function cancel() {
        $data['title'] = 'Cancle | Account';
        $data['view'] = 'internal/email/cancel';
        $this->load->view('internal/email/starter', $data);
    }

    public function error() {
        $data['title'] = '404 ERROR';
        $this->load->view('errors/custom/error_404', $data);
    }

    public function banned() {
        $data['title'] = '403 ERROR';
        $this->load->view('errors/custom/error_403', $data);
    }

    public function forbidden() {
        $data['title'] = '403 ERROR';
        $this->load->view('errors/custom/forbidden', $data);
    }

    public function quiz() {
        $data['title'] = 'Quarantine | Quiz';
        $name = array('Nova', 'Murshid', 'Ripon');
        $data['winname'] = $name[rand(0, (count($name) - 1))];
        $this->load->view('welcome/quiz', $data);
    }

}
