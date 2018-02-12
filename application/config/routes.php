<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['accounts/judges-lawyers'] = 'accounts/judges_lawyers';
$route['accounts/add-administrator'] = 'accounts/add_administrators';
$route['accounts/add-judge-lawyer'] = 'accounts/add_judge_lawyers';
$route['historical-graphical-tools/violationsTable'] = 'graphical_tools/violationsTable';
$route['historical-graphical-tools/violations'] = 'graphical_tools/violations';
$route['historical-graphical-tools/populations'] = 'graphical_tools/populations';
$route['historical-graphical-tools/population'] = 'graphical_tools/populations';
$route['historical-graphical-tools/addReleased'] = 'graphical_tools/addReleased';
$route['historical-graphical-tools/popuBar'] = 'graphical_tools/popuBar';
$route['historical-graphical-tools/popuPie'] = 'graphical_tools/popuPie';
$route['prisonpopulations'] = 'home/prisonpopulations';

$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */