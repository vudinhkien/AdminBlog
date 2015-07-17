<?php
Route::get('/admin', 'UserController@getFormLogin');
Route::post('admin/actionCheckLogin','UserController@login');
Route::group(array('prefix' => 'admin','before' =>'checkLoginNew'), function()
 {
 	// url: /bat den action cua form đăng ký vào hàm take-data-view
	Route::get('/index', 'UserController@getIndex');
	Route::get('/dashboard', 'NewsController@getDashboard');//thống kê News
	Route::get('/logout', 'UserController@logOut');//thống kê News
	Route::get('/profile', 'UserController@getFormProfile');//thống kê News
 
 
	Route::get('/themuser', 'UserController@getFormThemUser');
	Route::post('/dangkyuser', 'UserController@DangkyUser');
	Route::get('/showuser', 'UserController@getAllUser');
	Route::get('/gui-id-sua/{id}/', ['as' => 'sendId', 'uses' => 'UserController@getEdit']);// đặt tên cho Route là student_detail sử dụng hàm getEdit trong sinhvienController
	Route::post('/delete-user', 'UserController@DeleteUser');

	Route::get('/gioithieu', 'UserController@getFormGioithieu');
	Route::get('/baiviet', 'NewsController@getFormThemBaiviet');
	Route::post('/thembaiviet', 'NewsController@ThemBaiviet');
	Route::get('/listnews', 'NewsController@getAllDataNews');
	Route::get('gui-id-news/{id}',['as' => 'sendIdNews','uses' => 'NewsController@getEditNews']);
 	Route::post('/delete-news', 'NewsController@DeleteNews');

	Route::get('/danhmuc', 'CategoryController@getFormThemCategory');
	Route::get('/listcat', 'CategoryController@getAllCat');
	Route::get('gui-id-cat/{id}',['as' => 'sendIdCat','uses' => 'CategoryController@getEditCat']);
 	Route::post('/actioncategory', 'CategoryController@ThemCategory');
 	Route::post('/delete-cat', 'CategoryController@DeleteCat');
 });
Route::group(array('prefix' => '/'), function()  //truy cap vao front-end http://192.168.33.10:8072/
 {
 	Route::get('/', 'IndexController@getFormIndex'); 
 	Route::get('/gui-id-dep/{id}/', ['as' => 'frontendIdDep', 'uses' => 'IndexController@getIdDep']);
 	///gui-id-dep/{id}  thì sang getIdDep($id) ko cần lấy $id = input::get('dep_id') về ở IndexController
 	Route::get('/gui-id-news/{id}/', ['as' => 'frontendIdNews', 'uses' => 'IndexController@getIdNews']);

 });
