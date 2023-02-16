<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'authController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authenticated
$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

// Dashboard
$route['dashboard'] = 'DashboardController/index';

// Data User
$route['users'] = 'UserController/index';
$route['users/create'] = 'UserController/create';
$route['users/store'] = 'UserController/store';
$route['users/edit/(:num)'] = 'UserController/edit/$1';
$route['users/update/(:num)'] = 'UserController/update/$1';
$route['users/destroy/(:num)'] = 'UserController/destroy/$1';

// Data Kategori
$route['kategori'] = 'KategoriController/index';
$route['kategori/create'] = 'KategoriController/create';
$route['kategori/store'] = 'KategoriController/store';
$route['kategori/edit/(:num)'] = 'KategoriController/edit/$1';
$route['kategori/update/(:num)'] = 'KategoriController/update/$1';
$route['kategori/destroy/(:num)'] = 'KategoriController/destroy/$1';

// Data Buku
$route['buku'] = 'BukuController/index';
$route['buku/create'] = 'BukuController/create';
$route['buku/store'] = 'BukuController/store';
$route['buku/edit/(:num)'] = 'BukuController/edit/$1';
$route['buku/update/(:num)'] = 'BukuController/update/$1';
$route['buku/destroy/(:num)'] = 'BukuController/destroy/$1';

// Data Device
$route['device'] = 'DeviceController/index';
$route['device/create'] = 'DeviceController/create';
$route['device/store'] = 'DeviceController/store';
$route['device/(:num)'] = 'DeviceController/change/$1';
$route['device/edit/(:num)'] = 'DeviceController/edit/$1';
$route['device/update/(:num)'] = 'DeviceController/update/$1';
$route['device/destroy/(:num)'] = 'DeviceController/destroy/$1';

// Log
$route['log'] = 'LogController/index';

// Data Pinjaman
$route['pinjaman'] = 'PinjamanController/index';
$route['kembali'] = 'PinjamanController/getKembali';
$route['pinjaman/create'] = 'PinjamanController/create';
$route['pinjaman/store'] = 'PinjamanController/store';
$route['pinjaman/edit/(:num)'] = 'PinjamanController/edit/$1';
$route['pinjaman/kembali/(:num)'] = 'PinjamanController/kembali/$1';
$route['pinjaman/update/(:num)'] = 'PinjamanController/update/$1';
$route['pinjaman/destroy/(:num)'] = 'PinjamanController/destroy/$1';

$route['config'] = 'DashboardController/config';

$route['api/tap'] = 'ApiController/tap';
$route['api/absensijson'] = 'ApiController/tapin';
$route['api/gettime'] = 'ApiController/getTime';
