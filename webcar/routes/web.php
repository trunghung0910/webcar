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

Route::group(['prefix'=>'admin','as'=>'quantri.','middleware'=>'CheckAdminLogin'],function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::get('profile','AdminController@profile')->name('profile');
    Route::put('update','AdminController@updateProfile')->name('update.profile');
    Route::get('change-password','AdminController@changePasswordProfile')->name('change.password.profile');
    Route::put('update-password','AdminController@updatePasswordProfile')->name('update.password.profile');

    //Route Banner
    Route::resource('banner','BannerController');
    Route::get('banner/{id}/delete','BannerController@destroy')->name('banner.delete');

    //Route Post
    Route::get('/post/tim-kiem','PostController@search')->name('post.search');
    Route::resource('post','PostController');
    Route::get('post/{id}/delete','PostController@destroy')->name('post.delete');

    //Route Service
    Route::get('/service/tim-kiem','ServiceController@search')->name('service.search');
    Route::resource('service','ServiceController');
    Route::get('service/{id}/delete','ServiceController@destroy')->name('service.delete');

    //Route Model
    Route::get('/model/tim-kiem','ModelController@search')->name('model.search');
    Route::resource('model','ModelController');
    Route::get('model/{id}/delete','ModelController@destroy')->name('model.delete');

    //Route User
    Route::get('/user/tim-kiem','UserController@search')->name('user.search')->middleware('CheckAdminPermission');
    Route::resource('user','UserController')->middleware('CheckAdminPermission');
    Route::get('user/{id}/delete','UserController@destroy')->name('user.delete');
    Route::get('user/change-password/{id}','UserController@changePassWord')->name('user.change.password')->middleware('CheckAdminPermission');
    Route::put('user/update-password/{id}','UserController@updatePassWord')->name('user.update.password');

    //Route Contact
    Route::get('/contact/tim-kiem','ContactController@search')->name('contact.search');
    Route::resource('contact','ContactController');
    Route::get('contact/{id}/delete','ContactController@destroy')->name('contact.delete');


    //Route Car
    Route::get('/car/tim-kiem','CarController@search')->name('car.search');
    Route::resource('car','CarController');
    Route::get('car/{id}/delete','CarController@destroy')->name('car.delete');
    Route::get('incar/{id}','CarController@incarindex')->name('incar.index');
    Route::get('incar/create/{id}','CarController@incarcreate')->name('incar.create');
    Route::post('incar/store/{id}','CarController@incarstore')->name('incar.store');
    Route::get('incar/edit/{id}','CarController@incaredit')->name('incar.edit');
    Route::put('incar/update/{id}','CarController@incarupdate')->name('incar.update');
    Route::get('incar/{id}/delete','CarController@incardestroy')->name('incar.delete');
    Route::get('outcar/{id}','CarController@outcarindex')->name('outcar.index');
    Route::get('outcar/create/{id}','CarController@outcarcreate')->name('outcar.create');
    Route::post('outcar/store/{id}','CarController@outcarstore')->name('outcar.store');
    Route::get('outcar/edit/{id}','CarController@outcaredit')->name('outcar.edit');
    Route::put('outcar/update/{id}','CarController@outcarupdate')->name('outcar.update');
    Route::get('outcar/{id}/delete','CarController@outcardestroy')->name('outcar.delete');


    //Route BookingService
    Route::get('/bookservice/tim-kiem','BookingServiceController@search')->name('bookservice.search');
    Route::resource('bookservice','BookingServiceController');
    Route::get('bookservice/{id}/delete','BookingServiceController@destroy')->name('bookservice.delete');
    Route::get('active/{id}','BookingServiceController@activeService')->name('bookservice.active');

    //Route BookingCar
    Route::get('/bookcar/tim-kiem','BookingCarController@search')->name('bookcar.search');
    Route::resource('bookcar','BookingCarController');
    Route::get('bookcar/{id}/delete','BookingCarController@destroy')->name('bookcar.delete');
    Route::get('contract/{id}','BookingCarController@contract')->name('bookcar.contract');
    Route::post('contract/post/{id}','BookingCarController@postContract')->name('bookcar.contract.post');
    Route::get('contract/edit/{id}','BookingCarController@editContract')->name('bookcar.contract.edit');
    Route::put('contract/edit/{id}','BookingCarController@updateContract')->name('bookcar.contract.update');


});
Route::get('adminlogin','AdminController@getAdminlogin')->name('adminlogin')->middleware('CheckLoguot');
Route::post('adminlogin','AdminController@postAdminlogin')->name('adminlogin.post');
Route::get('adminlogout','AdminController@getAdminLogout')->name('adminlogout');

//Route Frontend
Route::get('/','FrontendController@index')->name('frontend');
Route::get('/about','FrontendController@about')->name('frontend.about');
Route::get('/contact','FrontendController@contact')->name('frontend.contact');
Route::post('/contact','FrontendController@postContact')->name('frontend.post.contact');
Route::get('/car','FrontendController@car')->name('frontend.car');
Route::get('/car/{id}','FrontendController@carDetail')->name('frontend.car.detail');
Route::get('/model/{slug}','FrontendController@model')->name('frontend.model');
Route::get('/service','FrontendController@service')->name('frontend.service');
Route::get('/service/{id}','FrontendController@serviceDetail')->name('frontend.service.detail');
Route::get('/post','FrontendController@post')->name('frontend.post');
Route::get('/post/{id}','FrontendController@postDetail')->name('frontend.post.detail');
Route::get('/search','FrontendController@search')->name('frontend.search');
Route::get('/register','FrontendController@getRegister')->name('frontend.get.register');
Route::post('/register-ky','FrontendController@postRegister')->name('frontend.post.register');
Route::get('/login','FrontendController@getLogin')->name('frontend.get.login')->middleware('CheckLoguot');
Route::post('/login','FrontendController@postLogin')->name('frontend.post.login');
Route::get('/logout','FrontendController@getLogout')->name('frontend.get.logout');
Route::get('/change-password','FrontendController@getchangePassword')->name('frontend.get.change.password');
Route::post('/change-password','FrontendController@postchangePassword')->name('frontend.post.change.password');
Route::get('/change-profile','FrontendController@getchangeProfile')->name('frontend.get.change.profile');
Route::post('/change-profile','FrontendController@postchangeProfile')->name('frontend.post.change.profile');

//Route Booking Service
Route::get('/add-service/{id}','BookingServiceController@addService')->name('frontend.add.service');
Route::get('/list-service','BookingServiceController@getListService')->name('frontend.list.service');
Route::get('/delete-service/{id}','BookingServiceController@deleteService')->name('frontend.delete.service');
Route::get('/book-service','BookingServiceController@bookService')->name('frontend.book.service')->middleware('CheckLogin');
Route::post('/book-service','BookingServiceController@saveInfoBookService');

//Route Booking Car
Route::get('/book-car/{id}','BookingCarController@bookCar')->name('frontend.book.car')->middleware('CheckLogin');
Route::post('/book-car/{id}','BookingCarController@saveInfoBookCar')->name('frontend.post.book.car');


