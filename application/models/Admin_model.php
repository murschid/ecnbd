<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('coadminauth')) {
            redirect('admin/signin');
        }
    }

    public function adquery($table, $offset, $limit, $order, $where) {
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', $order);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function adsquery($table, $where) {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    public function adupdate($table, $data, $where) {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function adinsert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function addelete($table, $where) {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

    public function getchatmsg($table, $order, $where) {
        $this->db->select($table . '.*, tb_users.name, tb_users.photo, tb_admin.name as adname, tb_admin.photo as adphoto');
        $this->db->join('tb_users', 'tb_users.id = ' . $table . '.user');
        $this->db->join('tb_admin', 'tb_admin.id = ' . $table . '.mod');
        $this->db->order_by('time', $order);
        $query = $this->db->get_where($table, $where, 20);
        return array_reverse($query->result());
    }

    public function getchathead($table, $order, $qroup, $where) {
        $this->db->select($table . '.*, tb_users.name, tb_users.photo');
        $this->db->join('tb_users', 'tb_users.id = ' . $table . '.user');
        $this->db->order_by('time', $order);
        $this->db->group_by($qroup);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
    
    public function ajaxsearch($table, $where){
        $this->db->like($where);
        $query = $this->db->get($table);
        return $query->result();
    }
    
    public function logdata(){
        $this->db->select('tb_logs.*, tb_admin.name, tb_admin.photo');
        $this->db->join('tb_admin', 'tb_admin.id = tb_logs.user');
        $this->db->order_by('tb_logs.login', 'DESC');
        $query = $this->db->get('tb_logs');
        return $query->result();
    }

    public function country($table, $field){
        $sql = "SELECT ".$field.", COUNT(".$field.") AS total FROM ".$table." GROUP BY ".$field." ORDER BY total DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
