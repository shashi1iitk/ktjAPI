<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Authentication 
| -------------------------------------------------------------------
*/
$route['register']['get']       = 'RegisterController/index';
$route['register']['post']      = 'RegisterController/create';
$route['login']['get']          = 'LoginController/index';
$route['login']['post']         = 'LoginController/login';
$route['logout']                = 'LoginController/logout';

/*
| -------------------------------------------------------------------
|  Password Reset
| -------------------------------------------------------------------
*/
$route['passwordreset']   		= 'PasswordResetController/index';
$route['sendtoken']				= 'PasswordResetController/sendtoken';
$route['validatetoken'] 		= 'PasswordResetController/checktoken';

/*
| -------------------------------------------------------------------
|  Events
| -------------------------------------------------------------------
*/
$route['events/(:any)']['get']   = 'EventController/index/$1';
$route['events']['get']          = 'EventController/index';
$route['events']['post']         = 'EventController/add';
$route['events/register']['post']= 'EventController/register';
$route['events/gamefestregister']['post']= 'EventController/gamefestregister';
$route['events/gamefestcheck']['post']= 'EventController/gamefestcheck';

/*
| -------------------------------------------------------------------
|  Workshops
| -------------------------------------------------------------------
 */
$route['workshops']['get']              = 'WorkshopController/index';
$route['workshops/register']['post']    = 'WorkshopController/register';

/*
| -------------------------------------------------------------------
|  Teams
| -------------------------------------------------------------------
*/
$route['team']['get']       = 'TeamController/index';
$route['team']['post']      = 'TeamController/register';

/*
| -------------------------------------------------------------------
|  MyKtj
| -------------------------------------------------------------------
*/
$route['myktj']                = 'MyKtjController/index';
$route['myktj/deregister']     = 'MyKtjController/deregister';
$route['myktj/leaveteam']      = 'MyKtjController/leaveteam';
$route['myktj/leaveworkshop']  = 'MyKtjController/leaveworkshop';

/*
| -------------------------------------------------------------------
|  Pages
| -------------------------------------------------------------------
*/
$route['sponsors/(:any)']       = 'SponsorController/index/$1';
$route['schedule']              = 'PagesController/schedule';
$route['accomodation']          = 'PagesController/accomodation';
$route['accommodation']          = 'PagesController/accomodation';
$route['notices']               = 'PagesController/notices';
$route['privacy']               = 'PagesController/privacy';
$route['contact']               = 'PagesController/contact';

/*
| -------------------------------------------------------------------
|  Our Team
| -------------------------------------------------------------------
*/
$route['ourteam/(:any)']         = 'OurteamController/index/$1';

/*
| -------------------------------------------------------------------
|  Toppr
| -------------------------------------------------------------------
*/
$route['brainiac']                  = 'OtherController/toppr';
$route['toppr']                  = 'OtherController/toppr';
$route['toppr/register']         = 'OtherController/topprsignup';

/*
| -------------------------------------------------------------------
|  Admin
| -------------------------------------------------------------------
*/
$route['admin']['get']              = 'admin/AdminLoginController/index';
$route['admin']['post']             = 'admin/AdminLoginController/login';
$route['admin/logout']              = 'admin/AdminLoginController/logout';
$route['admin/user']                = 'admin/AdminUserManageController/index';

$route['admin/college/add']['get']  = 'admin/AdminCollegeManageController/index';
$route['admin/college/add']['post'] = 'admin/AdminCollegeManageController/add';

$route['admin/notices']             = 'admin/AdminNoticeController/index';
$route['admin/notices/add']         = 'admin/AdminNoticeController/add';
$route['admin/notices/addnotice']   = 'admin/AdminNoticeController/addnotice';
$route['admin/notices/(:any)']      = 'admin/AdminNoticeController/update/$1';
$route['admin/notices/updatenotice/(:any)']= 'admin/AdminNoticeController/updatenotice/$1';

$route['admin/events']              = 'admin/AdminEventController/index';
$route['admin/events/(:any)']       = 'admin/AdminEventController/event/$1';

$route['admin/eventdetail']         = 'admin/AdminEventDetailController/index';
$route['admin/eventdetail/(:any)']  = 'admin/AdminEventDetailController/update/$1';
$route['admin/eventdetail/updateevent/(:any)'] = 'admin/AdminEventDetailController/updateevent/$1';

$route['admin/team']                = 'admin/AdminTeamController/index';
$route['admin/team/(:any)']         = 'admin/AdminTeamController/team/$1';
$route['admin/team/delete/(:any)']  = 'admin/AdminTeamController/delete/$1';

$route['admin/workshops']           = 'admin/AdminWorkshopController/index';
$route['admin/workshops/(:any)']    = 'admin/AdminWorkshopController/get/$1';
$route['admin/workshops/edit/(:any)'] = 'admin/AdminWorkshopController/edit/$1';
$route['admin/workshops/update/(:any)'] = 'admin/AdminWorkshopController/update/$1';

$route['admin/gamefest']              = 'admin/AdminGFController/index';
$route['admin/gamefest/(:any)']       = 'admin/AdminGFController/show/$1';

$route['admin/relicadd'] 			= 'admin/AdminExtraController/relicadd';
$route['admin/toppr']				= 'admin/AdminExtraController/toppr';
/*
| -------------------------------------------------------------------
|  Default
| -------------------------------------------------------------------
*/
$route['default_controller']     = 'PagesController/index';
$route['404_override']           = '';
$route['translate_uri_dashes'] = FALSE;
