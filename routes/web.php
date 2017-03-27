<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::get('about', 'AboutController@index');
Route::get('about/prizes', 'AboutController@prizes');
Route::get('about/costs', 'AboutController@costs');
Route::get('about/points', 'AboutController@points');
Route::get('about/deadlines', 'AboutController@deadlines');
Route::get('about/faq', 'AboutController@faq');

Route::get('dashboard', 'PersonalDashboardController@index');
Route::get('dashboard/home', 'PersonalDashboardController@index');
Route::get('dashboard/profile', 'PersonalDashboardController@profile');
Route::get('dashboard/myriders', 'PersonalDashboardController@my_riders');
Route::post('dashboard/myriders/preferred', 'PersonalDashboardController@my_riders_preferred'); //gotta check this one.
Route::post('dashboard/myriders/add', 'PersonalDashboardController@handleSelectRider');
Route::post('dashboard/myriders/delete', 'PersonalDashboardController@handleDeleteRider');
Route::get('dashboard/generalclassification', 'PersonalDashboardController@genclass');
Route::get('dashboard/racecalendar', 'PersonalDashboardController@raceCalendar');
Route::get('dashboard/team-create', 'PersonalDashboardController@teamCreate');
Route::post('/dashboard/home', 'PersonalDashboardController@storeTeam');

Route::get('terms', 'TermsController@index');

Route::get('contact', 'ContactController@index');

Route::get('admin', 'AdminController@index'); 
Route::get('admin/addrider', 'AdminController@addRider'); 
Route::post('admin/addrider', 'AdminController@handleAddRider');  
Route::get('admin/allusers', 'AdminController@allUsers');
Route::get('admin/allriders', 'AdminController@allRiders');
Route::get('admin/allteams', 'AdminController@allTeams');
Route::get('admin/allraces', 'AdminController@allRaces');
Route::post('admin/allraces','AdminController@updateRace');

Route::get('admin/addResults', 'AdminController@AddRaceResults');

Route::get('admin/addResultClassic', 'AdminController@addResultClassic');
Route::post('admin/addResultClassic', 'AdminController@handleResultClassic');

Route::get('admin/addResultGrandTour', 'AdminController@addResultGrandTour');
Route::post('admin/addResultGrandTour', 'AdminController@handleResultGrandTour');

Route::get('admin/addResultWCRoad', 'AdminController@addResultWCRoad');
Route::post('admin/addResultWCRoad', 'AdminController@handleResultWCRoad');

Route::get('admin/addResultWCTimeTrial', 'AdminController@addResultWCTimeTrial');
Route::post('admin/addResultWCTimeTrial', 'AdminController@handleResultWCTimeTrial');






 

 //Ajax
Route::get('links/race_detail', 'AjaxDetailController@show_race'); 
Route::get('links/rider_detail', 'AjaxDetailController@show_rider'); 
Route::get('links/team_detail', 'AjaxDetailController@show_team'); 
Route::get('links/rider_results_detail', 'AjaxDetailController@show_rider_results'); 
Route::get('links/userteam_detail', 'AjaxDetailController@show_userteam'); 
 
 
Auth::routes(); 



