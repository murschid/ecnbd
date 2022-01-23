<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('admin', $this->session->userdata('language'));
        $this->load->model('admin_model');
    }

    public function msg() {
        $data['title'] = 'Testing Mail';
        $data['message'] = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $this->load->view('internal/email/message', $data);
    }

    public function confirm() {
        $data['title'] = 'Confirm | Account';
        $data['name'] = 'Murshid Raj';
        $data['email'] = 'bildschi@startmail.xyz';
        $data['password'] = mycrypt::randompass();
        #$data['token'] = sha1(uniqid());
        $data['token'] = '7a39797d597c93e3f164920eeccb6eca01e52462';
        $this->load->view('internal/email/confirmEmail', $data);
    }

    public function send_message() {
        if ($this->input->post('message') != NULL && $this->input->post('subject') != NULL) {
            $data['body'] = $this->input->post('body');
            $data = array(
                'subject' => $this->input->post('subject'),
                'group' => $this->input->post('table'),
                'message' => $this->input->post('message'),
                'template' => $this->input->post('template'),
                'mod' => $this->session->userdata('coadminauth')['name'],
                'time' => time()
            );
            $recipients = $this->admin_model->adquery($this->input->post('table'), NULL, NULL, 'ASC', array('active' => 1));
            $config['smtp_host'] = 'ecnbd.com';
            $config['smtp_user'] = $this->input->post('mailaddress');
            $config['smtp_pass'] = 'pB4&R]bbRd7w';
            $config['smtp_port'] = '465';
            $this->email->initialize($config);
            if ($this->input->post('template') == 1) {
                $message = $this->load->view('internal/email/message', $data, TRUE);
            } else {
                $message = $this->input->post('message');
            }
            foreach ($recipients as $recipient) {
                $this->email->clear();
                $this->email->to($recipient->email);
                $this->email->from($this->input->post('mailaddress'), 'ECN Bangladesh - Info');
                $this->email->subject($this->input->post('subject'));
                $this->email->message($message);
                $this->email->send();
            }
            $this->admin_model->adinsert('tb_emails', $data);
            $this->session->set_flashdata('successtoast', 'Email Sent');
        } else {
            $this->session->set_flashdata('errorstoast', 'Something Wrong!');
        }
        redirect($this->agent->referrer());
    }

    public function check() {
        $message = 'Message';
        $config['smtp_host'] = 'ecnbd.com';
        $config['smtp_user'] = 'info@ecnbd.com';
        $config['smtp_pass'] = 'pB4&R]bbRd7w';
        $config['smtp_port'] = '465';
        $this->email->initialize($config);
        $this->email->from('info@ecnbd.com', 'ECN Bangladesh');
        $this->email->to('rajcsediu@gmail.com');
        $this->email->subject('Testing Purpose');
        $this->email->message($message);
        if($this->email->send()){
            echo 'Success';
        }else{
            echo 'Failed';
        }
    }

}
