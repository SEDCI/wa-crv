<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'home';
$route['default_controller'] = 'auth/showLogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| ADMIN ROUTES
| -------------------------------------------------------------------------
*/
$route['admin'] = 'admin/admin/showLogin';
$route['admin/login'] = 'admin/admin/showLogin';
$route['admin/auth'] = 'admin/admin/login';
$route['admin/logout'] = 'admin/admin/logout';

$route['admin/dashboard'] = 'admin/dashboard/showIndex';

$route['admin/users'] = 'admin/users/showUsers';
$route['admin/users/add'] = 'admin/users/addUser';
$route['admin/users/edit/(:num)'] = 'admin/users/editUser/$1';
$route['admin/users/delete/(:num)'] = 'admin/users/deleteUser/$1';

$route['admin/devices'] = 'admin/devices/showDevices';
$route['admin/devices/add'] = 'admin/devices/addDevice';
$route['admin/devices/edit/(:num)'] = 'admin/devices/editDevice/$1';
$route['admin/devices/delete/(:num)'] = 'admin/devices/deleteDevice/$1';
$route['admin/devices/view/(:any)'] = 'admin/devices/viewDevice/$1';

/*
| -------------------------------------------------------------------------
| USER ROUTES
| -------------------------------------------------------------------------
*/
$route['login'] = 'auth/showLogin';
$route['auth'] = 'auth/login';
$route['logout'] = 'auth/logout';
/*$route['login'] = 'user/auth/showLogin';
$route['auth'] = 'user/auth/login';
$route['logout'] = 'user/auth/logout';*/

$route['dashboard'] = 'user/dashboard/showIndex';

$route['devices'] = 'user/devices/showDevices';
$route['devices/add'] = 'user/devices/addDevice';
$route['devices/edit/(:num)'] = 'user/devices/editDevice/$1';
$route['devices/delete/(:num)'] = 'user/devices/deleteDevice/$1';
$route['devices/updateip'] = 'user/devices/updateIP';
$route['devices/(:any)'] = 'user/devices/viewDevice/$1';

$route['profile'] = 'user/profile/view';
$route['profile/edit'] = 'user/profile/edit';
$route['profile/changepassword'] = 'user/profile/editPassword';

/*
| -------------------------------------------------------------------------
| API ROUTES
| -------------------------------------------------------------------------
*/
$route['key/(:any)/devices'] = 'api/devices/getdevices/$1';
$route['key/(:any)/devices/itemsperpage/(:num)/page/(:num)'] = 'api/devices/getdevices/$1/$2/$3';
$route['key/(:any)/devices/(:any)'] = 'api/devices/getdevice/$1/$2';
//$route['key/(:any)/devices/(:any)/updateip'] = 'api/devices/updateip/$1/$2';
$route['key/(:any)/devices/updateip/(:any)'] = 'api/devices/updateip/$1/$2';
$route['key/(:any)/servertime'] = 'api/devices/getservertime/$1';

$route['clientapp/auth'] = 'api/users/getuser';
