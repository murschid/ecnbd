<?php

defined('BASEPATH') OR exit('No direct script access allowed');

#Article
$route['about'] = 'article/about';
$route['contact'] = 'article/contact';
$route['policy'] = 'article/policy';
$route['terms'] = 'article/terms';

#Admin
$route['admin/signin'] = 'auth/adminlogin';
$route['ecnadmin'] = 'auth/adminlogin';
$route['admin/signout'] = 'auth/adminsignout';

#Common
$route['default_controller'] = 'article';
$route['404_override'] = 'welcome/error';
$route['translate_uri_dashes'] = FALSE;
