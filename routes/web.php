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

  //
  Route::get('inovator/list',                'InovatorController@index')->name('inovator.list');
});

Route::group(['middleware'=>['auth:admin'], 'prefix' => 'admin'], function () {
  Route::get('/', 'Admin\HomeController@index')->name('admin.home');
  Route::get('/inovator/list',                'Admin\InovatorController@index')->name('admin.inovator.list');
  Route::post('/inovator/list',                'Admin\InovatorController@store');
  Route::get('/unit/list',                'Admin\UnitController@index')->name('admin.unit.list');
  Route::post('/unit/list',                'Admin\UnitController@store');
});
