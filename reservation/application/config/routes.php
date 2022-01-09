<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/room_data/(:any)'] = 'admin/room_data/$1';
$route['admin'] = 'admin/index';
$route['user/room/(:any)'] = 'user/room/$1';
$route['user/reservation_table'] = 'user/reservation_table';
$route['user/reservation']= 'user/reservation';
$route['user'] = 'user/index';
$route['room/(:any)'] = 'main/room/$1';
$route['reservation_action'] = 'main/reservation_action';
$route['reservation_table'] = 'main/reservation_table';
$route['reservation'] = 'main/reservation';
$route['default_controller'] = 'main/view';
$route['(:any)']= 'main/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
