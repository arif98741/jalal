<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['404_override'] 		 = 'error404'; //override by controller
$route['default_controller'] = 'front';



/*
!---------------------------------------------------
! 	Controller For Admin Profile
!---------------------------------------------------
*/
$route['admin'] 		  		= 'admin/admin/index';
$route['admin/dashboard'] 	  	= 'admin/admin/dashboard';
$route['admin/settings'] 	  	= 'admin/admin/settings';
$route['admin/profile'] 	  	= 'admin/admin/profile';
$route['admin/profile_update']  = 'admin/admin/profile_update';
$route['admin/settings']  		= 'admin/admin/settings';
$route['admin/logout'] 		  	= 'admin/logout'; 


$route['student'] 		  	= 'web/student'; 
$route['student/register'] 	= 'web/student/register'; 
$route['student/profile/(:any)'] 	= 'web/student/profile/$1'; 
$route['student/logout'] 	= 'web/student/logout'; 
$route['upload'] 		   = 'web/student/upload'; 


/*
!---------------------------------------------------
! 	Public Project
!---------------------------------------------------
*/
$route['project/(:num)'] 	= 'project/index/$1'; 


$route['translate_uri_dashes'] 	= FALSE;

