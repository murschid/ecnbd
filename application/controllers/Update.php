<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('admin', $this->session->userdata('language'));
        $this->load->model('admin_model');
    }

    public function alseen() {
        if ($this->admin_model->adupdate('tb_visitors', array('seen' => 1), NULL)) {
            $this->session->set_flashdata('successtoast', 'Successful');
        } else {
            $this->session->set_flashdata('errorstoast', 'Nothing to make seen');
        }
        redirect($this->agent->referrer());
    }

    public function moderator($id) {
        if ($this->session->userdata('coadminauth')['role'] == 'admin') {
            if ($this->input->get('key') == 'ac') {
                $this->admin_model->adupdate('tb_admin', array('active' => 1), array('id' => $id));
            } elseif ($this->input->get('key') == 'de') {
                $this->admin_model->adupdate('tb_admin', array('active' => 0), array('id' => $id));
            }
        }
        redirect($this->agent->referrer());
    }

    public function user($id) {
        if ($this->input->get('key') == 'ac') {
            $this->admin_model->adupdate('tb_users', array('active' => 1), array('id' => $id));
        } elseif ($this->input->get('key') == 'de') {
            $this->admin_model->adupdate('tb_users', array('active' => 0), array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function post($id) {
        if ($this->input->get('key') == 'ac') {
            $this->admin_model->adupdate('tb_posts', array('active' => 1), array('id' => $id));
        } elseif ($this->input->get('key') == 'de') {
            $this->admin_model->adupdate('tb_posts', array('active' => 0), array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function advertise($id) {
        if ($this->input->get('key') == 'ac') {
            $this->admin_model->adupdate('tb_advertise', array('active' => 1), array('id' => $id));
        } elseif ($this->input->get('key') == 'de') {
            $this->admin_model->adupdate('tb_advertise', array('active' => 0), array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function breaking($id) {
        if ($this->input->get('key') == 'ac') {
            $this->admin_model->adupdate('tb_breaking', array('active' => 1), array('id' => $id));
        } elseif ($this->input->get('key') == 'de') {
            $this->admin_model->adupdate('tb_breaking', array('active' => 0), array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function comment($id) {
        if ($this->input->get('key') == 'ac') {
            $this->admin_model->adupdate('tb_comments', array('active' => 1), array('id' => $id));
        } elseif ($this->input->get('key') == 'de') {
            $this->admin_model->adupdate('tb_comments', array('active' => 0), array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function visitor($id) {
        if ($this->session->userdata('coadminauth')['role'] == 'admin') {
            if ($this->input->get('key') == 'ac') {
                $this->admin_model->adupdate('tb_visitors', array('banned' => 0), array('id' => $id));
            } elseif ($this->input->get('key') == 'de') {
                $this->admin_model->adupdate('tb_visitors', array('banned' => 1), array('id' => $id));
            }
        }
        redirect($this->agent->referrer());
    }

    public function activatemodaccbyemail($token) {
        if ($token != NULL && $this->input->get('email') != NULL) {
            $data = array('active' => 1, 'seen' => 1, 'IPs' => $this->input->ip_address());
            $where = array('token' => $token, 'email' => $this->input->get('email'), 'seen' => 0);
            if ($this->external_model->exupdate('tb_admin', $data, $where)) {
                redirect('welcome/success?id=a');
            } else {
                redirect('welcome/error?id=a');
            }
        }
    }

    public function refresh() {
        $data = array('refresh' => 1, 'duration' => $this->input->post('duration'));
        $where = array('user' => $this->session->userdata('coadminauth')['email']);
        if ($this->admin_model->adupdate('tb_settings', $data, $where) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

    public function maponoff() {
        $data = array('maps' => $this->input->post('maps'));
        $where = array('user' => $this->session->userdata('coadminauth')['email']);
        if ($this->admin_model->adupdate('tb_settings', $data, $where) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

    public function chatonoff() {
        $data = array('chatting' => $this->input->post('chatting'));
        $where = array('user' => $this->session->userdata('coadminauth')['email']);
        if ($this->admin_model->adupdate('tb_settings', $data, $where) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

}
