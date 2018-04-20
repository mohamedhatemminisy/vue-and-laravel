<?php


Route::get('/', function () {
    return view('welcome');
});


// to solve refresh problem because when i do refresh the page will disapear
// 

Route::get('/phonebook/{name}',function(){
	return redirect('/');
})->where('name','[A-Za-z]+');

Route::resource('phonebook','PhonebookController');

Route::post('getData','PhonebookController@getData');

Route::resource('blog','BlogController');

Route::post('getblog','BlogController@getData');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
