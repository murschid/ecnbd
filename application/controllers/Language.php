<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function change($lang) {
        $language = !empty($lang) ? $lang : 'english';
        $this->session->set_userdata('language', $language);
        redirect($this->agent->referrer());
    }

}
