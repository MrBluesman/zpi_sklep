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

Route::get('/', function ()
{
    return view('home.home');
});

//Route::get('/', function () {
//
//    if(Auth::attempt(['email'=>'stud@student.edu.pl','password'=>'stud'])){
//        echo "Alright!";
//
//        Auth::login(Auth::user(), true);
//
//        // print user information
//        print_r(Auth::user());
//    }
//    else
//    {
//        echo "Why it doesn't work?";
//    }
//
//
//});


Route::get('/artists',[
    'uses' => 'ArtistsController@index',
    'as' => 'artists.index'
]);

Route::get('/artists/add',[
    'uses' => 'ArtistsController@addArtist',
    'as' => 'artists.addArtist'
]);


Route::post('/artists/save',[
    'uses' => 'ArtistsController@saveArtist',
    'as' => 'artists.saveArtist'
]);

Route::get('/artists/{artist}',[
    'uses' => 'ArtistsController@details',
    'as' => 'artists.details'
]);


Auth::routes();

Route::get('/home', 'HomeController@index');
