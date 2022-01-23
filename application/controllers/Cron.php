<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function archive() {
        $value = $this->external_model->exsquery('tb_archive', array('link' => date('mY')));
        if ($value == NULL) {
            $data = array(
                'month' => date('F'),
                'year' => date('Y'),
                'link' => date('mY'),
                'time' => time()
            );
            $this->external_model->exinsert('tb_archive', $data);
        }
        redirect($this->agent->referrer());
    }

    public function corona() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.covid19api.com/summary',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, TRUE);
        echo '<pre>';
        print_r($data['Countries']['13']);
    }

}
