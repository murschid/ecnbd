<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Codeigniter v3.1
 * Description of Converter
 * @author Murshid
 */

class Converter {

    public $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }

    public static function days($txt) {
        $bn = array('শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
        $en = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        return str_replace($en, $bn, $txt);
    }

    public static function months($txt) {
        $bn = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
        $en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        return str_replace($en, $bn, $txt);
    }

    public static function times($txt) {
        $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'পিএম', 'এএম');
        $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'pm', 'am');
        return str_replace($en, $bn, $txt);
    }

}
