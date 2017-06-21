<?php
 

Route::post('/donor/search', 'DonorController@search');
Route::get('donor/viewprofile/{id}', 'DonorController@viewprofile');
Route::get('/Blogs', 'BlogController@view');


Route::get('/search-donor', 'HomeController@SearchDonor');
Route::get('/our-policy', 'HomeController@OurPolicy');
Route::get('/speech-of-CEO', 'SpeechController@index');


Route::get('/admin/donor/get_district/{id}', 'DonorController@get_district');
Route::get('/admin/donor/get_upazilla/{id}', 'DonorController@get_upazilla');





Route::get('/admin/addGallery', 'PhotoController@addGallery');
Route::any('/admin/storeGallery', 'PhotoController@storeGallery');
Route::any('/admin/viewGallery', 'PhotoController@viewGallery');
Route::any('/admin/addPhoto', 'PhotoController@addPhoto');
Route::any('/admin/storePhoto', 'PhotoController@storePhoto');
Route::any('/admin/viewPhoto', 'PhotoController@viewPhoto');









//----------------User-------------
Route::get('/DonorSearchByLocation', 'SearchController@DonorSearchByLocation');
Route::get('/search', 'SearchController@index');
Route::get('/my-profile', 'ProfileController@viewMyProfile');


Route::get('/', 'PostController@WhoWeAre');
Route::get('/VisionMissionValue', 'PostController@VisionMissionValue');
Route::get('/FAQ', 'FaqController@faq');
Route::get('/aboutus', 'PostController@aboutus');
Route::get('/gallery', 'PhotoController@index');
Route::get('/contact', 'PostController@contactPage');
Route::get('/project', 'HomeController@projectPage');
Route::get('/events', 'HomeController@eventsPage'); 
Route::get('/donate', 'DonorController@donate');
Route::get('/profile', 'ProfileController@index');





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/monthly-entry', 'MonthlyEntryController@view');
Route::get('/gradingSystem', 'GradingSystemController@view');


//-------Admin -----------
Route::get('/admin', 'AdminController@index'); 
Route::get('/admin/create', 'AdminController@create');
Route::get('/admin/{id}', 'AdminController@show')->name('show');
Route::get('/admin/{id}/edit', 'AdminController@edit'); 
Route::get('/admin/store', 'AdminController@store')->name('store');
Route::post('/admin/update', 'AdminController@update');
Route::any('/admin/{id}/destroy', 'AdminController@destroy');

//--------Donor-------------------------------------
Route::get('/test', 'TestController@index');

Route::get('/donor', 'DonorController@index');
Route::get('/donor/create', 'DonorController@index');
Route::post('/donor/store', 'DonorController@store');
Route::get('/donor/{id}', 'DonorController@show');
Route::get('/donor/{id}/edit', 'DonorController@edit');
Route::post('/donor/update', 'DonorController@update');
Route::any('/donor/{id}/destroy', 'DonorController@destroy');

//------------------Doctor----------------------------------
Route::get('admin/doctor/view', 'DoctorController@view');
Route::get('admin/doctor/create', 'DoctorController@create');
Route::post('admin/doctor/store', 'DoctorController@store');
Route::get('admin/doctor/search_view', 'DoctorController@search_view');
Route::get('admin/doctor/search', 'DoctorController@search');

//-------------------------Hospital------------------------
Route::get('admin/hospital/view_hospital', 'DoctorController@hospital_view');
Route::get('admin/hospital/add_hospital', 'DoctorController@search');



//---------------------Search -------------------------------
/*
Route::get('/search', 'HomeController@search');
Route::get('/search/ajax', 'HomeController@ajax');
Route::get('api/dependent-dropdown','APIController@index');
Route::get('api/get-state-list','APIController@getStateList');
Route::get('api/get-city-list','APIController@getCityList');
*/

//---------Content--------------------
Route::get('/content', 'ContentController@index'); 
Route::get('/content/create', 'ContentController@create');
Route::get('/content/{id}', 'ContentController@show');
Route::get('/content/{id}/edit', 'ContentController@edit'); 
Route::get('/content/store', 'ContentController@store')->name('store');
Route::post('/content/update', 'ContentController@update');
Route::any('/content/{id}/destroy', 'ContentController@destroy');

//-------------------Blog-----------------------------
Route::any('/blog/category', 'BlogController@blog_category');
Route::any('/blog/createCategory', 'BlogController@create_category');
Route::any('/blog/saveCategory', 'BlogController@save_category');
Route::any('/blog/content', 'BlogController@view_blog');
Route::any('/blog/create', 'BlogController@create_blog');
Route::any('/blog/saveBlog', 'BlogController@save_blog');




//----------------SMS ------------------------------
Route::get('/sms', 'SmsController@index');


Route::get('ajax',function(){
   return view('message');
});
Route::post('/getmsg','AjaxController@index');



Route::get('/error',function(){
   abort(404);
});

Route::resource('admin','AdminController');
Route::resource('donor','DonorController');
Route::resource('content','ContentController');


Route::get('/', 'UserController@index');
Route::get('/WhoWeAre', 'PostController@WhoWeAre');


Auth::routes();