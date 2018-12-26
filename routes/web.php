<?php



Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/contact', 'PageController@submitContact');

Route::resource('question', 'QuestionController');
Route::resource('answers', 'AnswersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'PageController@profile')->name('profile');