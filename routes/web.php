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

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login');

Auth::routes(['register' => false]);

Route::group(['middleware'=>['auth']], function () {
  Route::get('/', 'HomeController@index')->name('home');
  Route::post('/delete-dasar/{id}','ProjectController@deletedasar');
  Route::post('/delete-impact/{id}','ProjectController@deleteimpact');
  Route::post('/update-status/{id}','ProjectController@updatestatus');
  Route::post('/update-problem/{id}','ProjectController@updateproblem');
  /* Problem */
  Route::get('problem', function ()             { return redirect('problem/newproblem'); });
  Route::get('problem/newproblem',                        'ProblemController@newproblem')->name('problem.newproblem');
  Route::get('problem/myproblemlist',                     'ProblemController@myproblemlist')->name('problem.myproblemlist');

  Route::get('problem/problemdetail/{problem_id}',        'ProblemController@problemdetail')->name('problem.problemdetail');
  Route::get('problem/problempool',                       'ProblemController@problempool')->name('problem.problempool');
  Route::post('problem/problempool/interest/{id}',        'ProblemController@problempoolInterest')->name('problem.problempool.interest');
  Route::post('problem/submitproblem',                    'ProblemController@submitproblem')->name('problem.submitproblem');
  Route::get('problem/deleteproblem/{problem_id}',        'ProblemController@deleteproblem')->name('problem.deleteproblem');
  Route::get('problem/editproblem/{problem_id}',          'ProblemController@editproblem')->name('editproblem');
  Route::post('problem/editproblemaction',                'ProblemController@editproblemaction')->middleware('auth');
//Project

Route::get('project/my-project',                        'ProjectController@myproject')->name('project.myproject');
Route::post('project/my-project/deleteproject/{id}',                        'ProjectController@deleteproject')->name('project.deleteproject');
Route::post('project/my-project',                        'ProjectController@myprojectstore')->name('project.myproject.store');
Route::post('project/problem/submit/{id}',                        'ProjectController@problemsubmit')->name('project.problem.submit');
Route::post('project/my-project/paingain/{id}',                        'ProjectController@paingain')->name('project.myproject.paingain');
Route::post('project/my-project/userjourney/{id}',                        'ProjectController@userjourney')->name('project.myproject.userjourney');
Route::post('project/my-project/goldencircle/{id}',                        'ProjectController@goldencircle')->name('project.myproject.goldencircle');
Route::post('project/my-project/summary/{id}',                        'ProjectController@summary')->name('project.myproject.summary');
Route::post('project/my-project/productdevelopment/{id}',                        'ProjectController@productdevelopment')->name('project.myproject.productdevelopment');
Route::post('project/my-project/pilotproject/{id}',                        'ProjectController@pilotproject')->name('project.myproject.pilotproject');
Route::post('project/my-project/dasarimplementasi/{id}',                        'ProjectController@dasarimplementasi')->name('project.myproject.dasarimplementasi');
Route::post('project/my-project/sosialisasi/{id}',                        'ProjectController@sosialisasi')->name('project.myproject.sosialisasi');
Route::post('project/my-project/impact/{id}',                        'ProjectController@impact')->name('project.myproject.impact');
Route::get('project/my-project/detail/{id}',                        'ProjectController@myprojectdetail')->name('project.myprojectdetail');
Route::post('add-project-member/{id}','ProjectController@addMemberProject');
Route::post('update-project-member/{id}','ProjectController@updateMemberProject');
Route::post('project/updateinfo/{id}',   'ProjectController@projectmanagementeditone')->middleware('auth')->name('project.updateinfo');
Route::post('project/problemupdate/{id}','ProjectController@problemupdate');

Route::get('knowledge',                        'KnowledgeController@knowledge')->name('knowledge');
Route::get('knowledge/problem/{id}',                        'KnowledgeController@problem')->name('knowledge.problem');
Route::get('knowledge/detail/{id}',                        'KnowledgeController@knowledgedetail')->name('knowledge.detail');
Route::get('knowledge/brainstorming/{id}',                        'KnowledgeController@brainstorming')->name('knowledge.brainstorming');
Route::get('knowledge/gathering/{id}',                        'KnowledgeController@gathering')->name('knowledge.gathering');
Route::get('knowledge/development/{id}',                        'KnowledgeController@development')->name('knowledge.development');
Route::get('knowledge/pilot/{id}',                        'KnowledgeController@pilot')->name('knowledge.pilot');
  //
  Route::get('inovator/list',                'InovatorController@index')->name('inovator.list');

Route::post('comment/{id}','SosialisasiController@comment')->name('comment.store');
Route::post('like/{id}','SosialisasiController@like')->name('like.store');
});

Route::group(['middleware'=>['auth:admin'], 'prefix' => 'admin'], function () {
  Route::get('/', 'Admin\HomeController@index')->name('admin.home');
  Route::resource('/inovator/list',                'Admin\InovatorController', ['as' => 'admin.innovator']);
  Route::resource('/unit/list',                'Admin\UnitController', ['as' => 'admin.unit']);
});
