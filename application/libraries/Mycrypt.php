<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Codeigniter v3.1
 * Description of Mycrypt
 * @author Murshid
 */

class Mycrypt {

    public $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }

    public static function age2date($age) {
        $dis = date('Y') - $age;
        return date('d-m') . '-' . $dis;
    }

    public static function date2age($data) {
        $date = new DateTime($data);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    public static function settings() {
        $ci = & get_instance();
        $ci->load->dbforge();
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'user' => array('type' => 'VARCHAR', 'constraint' => 100),
            'refresh' => array('type' => 'INT', 'constraint' => 4, 'default' => 0),
            'maps' => array('type' => 'INT', 'constraint' => 1, 'default' => 1),
            'chatting' => array('type' => 'INT', 'constraint' => 1, 'default' => 1),
            'time' => array('type' => 'VARCHAR', 'constraint' => 16, 'default' => time()),
        );
        $ci->dbforge->add_field($fields);
        $ci->dbforge->add_key('id', TRUE);
        $ci->dbforge->create_table('tb_settings', TRUE);
        $query = $ci->db->get_where('tb_settings', array('user' => $ci->session->userdata('coadminauth')['email']));
        return $query->row();
    }

    public static function multi_images($folder, $name) {
        $ci = & get_instance();
        $filesCount = count($_FILES[$name]['name']);
        for ($imgi = 0; $imgi < $filesCount; $imgi++) {
            $_FILES['file']['name'] = $_FILES[$name]['name'][$imgi];
            $_FILES['file']['type'] = $_FILES[$name]['type'][$imgi];
            $_FILES['file']['tmp_name'] = $_FILES[$name]['tmp_name'][$imgi];
            $_FILES['file']['error'] = $_FILES[$name]['error'][$imgi];
            $_FILES['file']['size'] = $_FILES[$name]['size'][$imgi];
            $config['upload_path'] = $folder;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1024';
            $config['max_width'] = '2400';
            $config['max_height'] = '1800';
            $ci->upload->initialize($config);
            $ci->upload->do_upload('file');
            $imgdata = $ci->upload->data();
            $name_array[] = $imgdata['file_name'];
        }
        return implode(',', $name_array);
    }

    public static function single_image($folder, $name) {
        $ci = & get_instance();
        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1024';
        $config['max_width'] = '2400';
        $config['max_height'] = '1800';
        $ci->upload->initialize($config);
        if($ci->upload->do_upload($name)) {
            $data = $ci->upload->data();
            $con['image_library'] = 'gd2';
            $con['source_image'] = $data['full_path'];
            $con['create_thumb'] = FALSE;
            $con['maintain_ratio'] = TRUE;
            $con['quality'] = '90%';
            $con['width'] = 880;
            $ci->image_lib->clear();
            $ci->image_lib->initialize($con);
            $ci->image_lib->resize();
            return $data['file_name'];
        }
    }

    public static function thumbnail($folder, $name) {
        $ci = & get_instance();
        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1024';
        $config['max_width'] = '2400';
        $config['max_height'] = '1800';
        $ci->upload->initialize($config);
        if($ci->upload->do_upload($name)){
            $data = $ci->upload->data();
            $con['image_library'] = 'gd2';
            $con['source_image'] = $data['full_path'];
            $con['create_thumb'] = FALSE;
            $con['maintain_ratio'] = TRUE;
            $con['quality'] = '80%';
            $con['width'] = 380;
            $ci->image_lib->clear();
            $ci->image_lib->initialize($con);
            $ci->image_lib->resize();
            return $data['file_name'];
        }
    }

    public static function randompass() {
        $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ0123456789@#$%&';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public static function onlinecounter() {
        $ci = & get_instance();
        $ci->load->dbforge();
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'session' => array('type' => 'VARCHAR', 'constraint' => 64),
            'time' => array('type' => 'VARCHAR', 'constraint' => 20)
        );
        $ci->dbforge->add_field($fields);
        $ci->dbforge->add_key('id', TRUE);
        $ci->dbforge->create_table('tb_online', TRUE);
        $data = array(
            'session' => $ci->session->session_id,
            'time' => time()
        );
        $query = $ci->db->get_where('tb_online', array('session' => $data['session']));
        if ($query->num_rows() == 0) {
            $ci->db->insert('tb_online', $data);
        } else {
            $ci->db->update('tb_online', $data, array('session' => $data['session']));
        }
        $ci->db->delete('tb_online', array('time <=' => time() - 300));
    }

    public static function userinfo($ip) {
        $ci = & get_instance();
        $token = '0a15b4b3b9f29a';
        $ch = curl_init('https://ipinfo.io/' . $ip . '?token=' . $token . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $api_result = json_decode($json, true);
        $query = $ci->db->get_where('tb_visitors', array('ip' => $ip));
        $data = array(
            'ip' => $ip,
            'country' => $api_result['country'],
            'region' => $api_result['region'],
            'city' => $api_result['city'],
            'web' => 1,
            'agent' => $ci->agent->browser() . ' ' . $ci->agent->version(),
            'time' => time()
        );
        if ($query->num_rows() == 0) {
            if($api_result['country'] != NULL) {
                $ci->db->insert('tb_visitors', $data);
            }
        } else {
            $ci->db->update('tb_visitors', array('count' => ($query->row()->count + 1), 'time' => time()), array('ip' => $ip));
        }
    }

    public static function userinfoshow($ip) {
        $key = '286489efb38854f5235462e4e4249ed8';
        $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $key . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        return json_decode($json, true);
    }

    public static function totalcount($table, $where) {
        $ci = & get_instance();
        $query = $ci->db->get_where($table, $where);
        return $query->num_rows();
    }

    public static function countbygrp($table, $group, $where) {
        $ci = & get_instance();
        $ci->db->group_by($group);
        $query = $ci->db->get_where($table, $where);
        return $query->num_rows();
    }

    public static function localhost() {
        $host = $_SERVER['HTTP_HOST'];
        $array = array('127.0.0.1', 'localhost');
        return in_array($host, $array);
    }

    public static function ipcheck($ips) {
        $ci = & get_instance();
        $array = explode(',', $ips);
        return in_array($ci->input->ip_address(), $array);
    }

    public static function myiponly($ip) {
        $ci = & get_instance();
        return ($ci->input->ip_address() == $ip) ? TRUE : FALSE;
    }

    public static function lastrecord($table, $where) {
        $ci = & get_instance();
        $ci->db->order_by('id', 'DESC');
        $query = $ci->db->get_where($table, $where, 1);
        return $query->row()->id;
    }

}
