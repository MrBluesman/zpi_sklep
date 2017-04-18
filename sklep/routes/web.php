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

//ARTYŚCI

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


//ALBUMY

Route::get('/albums', [
  'uses' => 'AlbumsController@index',
  'as' => 'albums.index'
]);


//KOD RABATOWY
Route::get('/discountCodes',[
    'uses' => 'DiscountCodesController@index',
    'as' => 'discountCodes.index'
]);

Route::get('/discountCodes/add',[
    'uses' => 'DiscountCodesController@addCode',
    'as' => 'discountCodes.addCode'
]);


Route::post('/discountCodes/save',[
    'uses' => 'DiscountCodesController@saveCode',
    'as' => 'discountCodes.saveCode'
]);

Route::get('/discountCodes/delete/{code}',[
    'uses' => 'DiscountCodesController@deleteCode',
    'as' => 'discountCodes.deleteCode'
]);

//ZARZĄDZANIE UŻYTKOWNIKAMI
Route::get('/userManagementPanel',[
    'uses' => 'UserManagementPanelController@index',
    'as' => 'userManagementPanel.index'
]);

Route::get('/userManagementPanel/block/{userID}',[
    'uses' => 'UserManagementPanelController@blockUser',
    'as' => 'userManagementPanel.blockUser'
]);

Route::get('/userManagementPanel/unblock/{userID}',[
    'uses' => 'UserManagementPanelController@unblockUser',
    'as' => 'userManagementPanel.unblockUser'
]);


Auth::routes();

Route::get('/home', 'HomeController@index');
