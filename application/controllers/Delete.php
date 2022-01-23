<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('admin', $this->session->userdata('language'));
        $this->load->model('admin_model');
    }

    public function visitor($id) {
        $this->admin_model->addelete('tb_visitors', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function post($id) {
        $this->admin_model->addelete('tb_posts', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function advertise($id) {
        $this->admin_model->addelete('tb_advertise', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function breaking($id) {
        $this->admin_model->addelete('tb_breaking', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function category($id) {
        $this->admin_model->addelete('tb_category', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function comment($id) {
        $this->admin_model->addelete('tb_comments', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function contact($id) {
        $this->admin_model->addelete('tb_contacts', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function sentmail($id) {
        $this->admin_model->addelete('tb_emails', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function user($id) {
        $this->admin_model->addelete('tb_users', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function moderator($id) {
        if ($this->session->userdata('coadminauth')['role'] == 'admin') {
            $this->admin_model->addelete('tb_admin', array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function logs($id) {
        if ($this->session->userdata('coadminauth')['role'] == 'admin') {
            $this->admin_model->addelete('tb_logs', array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

}
