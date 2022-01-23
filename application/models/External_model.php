<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class External_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function exquery($table, $offset, $limit, $order, $where) {
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', $order);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function wherein($table, $offset, $limit, $order, $where, $wherein) {
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', $order);
        $this->db->where($where);
        $this->db->where_in('category', $wherein);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function exqueryor($table, $offset, $limit, $ordid, $order, $where) {
        $this->db->limit($limit, $offset);
        $this->db->order_by($ordid, $order);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function exsquery($table, $where) {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    public function exupdate($table, $data, $where) {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function exinsert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function exdelete($table, $where) {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

    public function fieldupdate($table, $field, $where) {
        $this->db->select($field);
        $query = $this->db->get_where($table, $where);
        $qty = $query->row()->$field;
        $this->db->update($table, array($field => ($qty + 1)), $where);
    }

    public function login_query($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function search($table, $where){
        $this->db->select('id, title, thumbnail, writer, time');
        $this->db->or_like($where);
        $this->db->limit(10);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function logdelete(){
        $sql = "DELETE FROM tb_logs WHERE (UNIX_TIMESTAMP() - login) >= 604800*4";
        $this->db->query($sql);
    }

    public function countall($table, $where){
        $query = $this->db->get_where($table, $where);
        return $query->num_rows();
    }

}
