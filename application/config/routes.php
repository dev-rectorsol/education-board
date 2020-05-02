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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'authentication';
$route['auth'] = 'authentication';
$route['auth/logout'] = 'authentication/logout';
$route['join'] = 'authentication/register';
$route['subscribe'] = 'authentication/register/subscribe';
$route['forget'] = 'authentication/resetView';

// Website ROUTING

$route['home'] = 'web/home/index';
$route['paths'] = 'web/home/paths';
$route['blogs'] = 'web/blog/index';
$route['blog/get_list'] = 'web/blog/get_list';
$route['single/(:any)'] = 'web/home/blog_single_view/$1';
$route['about'] = 'web/home/about';
$route['contact'] = 'web/home/contact';
$route['courses'] = 'web/courses';
$route['courses/get_list'] = 'web/courses/get_list';
$route['courses/get_single/(:any)'] = 'web/courses/get_single/$1';
$route['courses/course_curriculum/(:any)'] = 'web/courses/course_curriculum/$1';
$route['course/(:any)'] = 'web/courses/intro/$1';
$route['resume/(:any)'] = 'web/courses/resume/$1';
$route['demo/(:any)'] = 'web/courses/demo/$1';
$route['trending/(:any)/(:any)'] = 'web/trending/index/$1/$2';
$route['watch/(:any)'] = 'web/lecture/index/$1';
$route['event'] = 'web/home/event';
$route['faq'] = 'web/home/faq';
$route['contact'] = 'web/home/contact';
$route['file_upload'] = 'file_upload';
$route['privacy'] = 'web/home/privacy';


//  Admin Routing vai Admin

$route['admin'] = 'admin/dashboard';


// Board Routing vie User

$route['app'] = 'web/home/index';
