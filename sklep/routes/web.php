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




Auth::routes();

Route::get('/home', 'HomeController@index');

//TREŚC TYLKO DLA UŻYTKOWNIKÓW - Routingi
Route::group([
    'middleware' => 'roles',
    'roles' => ['user']
], function()
{
    //turaj routingi
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

    Route::get('/albums/add', [
        'uses' => 'AlbumsController@add',
        'as' => 'albums.add'
    ]);

    Route::post('/albums/save', [
        'uses' => 'AlbumsController@save',
        'as' => 'albums.save'
    ]);

    Route::get('/albums/{album}', [
        'uses' => 'AlbumsController@edit',
        'as' => 'albums.edit'
    ]);

    Route::post('/albums/edit/{album}', [
        'uses' => 'AlbumsController@change',
        'as' => 'albums.change'
    ]);

    Route::get('/albums/delete/{album}', [
        'uses' => 'AlbumsController@delete',
        'as' => 'albums.delete'
    ]);

// KOSZYK

    Route::get('/addToCart/{album}', [
        'uses' => 'CartController@addToCart',
        'as' => 'cart.addToCart'
    ]);

    Route::get('/getCart', [
        'uses' => 'CartController@getCart',
        'as' => 'cart.getCart'
    ]);


    Route::get('/getCart/increment/{album}', [
        'uses' => 'CartController@incrementQuantity',
        'as' => 'cart.incrementQuantity'
    ]);

    Route::get('/getCart/decrement/{album}', [
        'uses' => 'CartController@decrementQuantity',
        'as' => 'cart.decrementQuantity'
    ]);

    Route::get('/getCart/remove/{album}', [
        'uses' => 'CartController@removeItem',
        'as' => 'cart.removeItem'
    ]);

    Route::post('/getCart/addDiscountCode', [
        'uses' => 'CartController@addDiscountCode',
        'as' => 'cart.addDiscountCode'
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
});

//TREŚC TYLKO DLA PRACOWNIKÓW - Routingi
Route::group([
    'middleware' => 'roles',
    'roles' => ['prac']
], function()
{
    //tutaj routingi
});

//TREŚC TYLKO DLA ADMINISTRATORA - Routingi
Route::group([
    'middleware' => 'roles',
    'roles' => ['admin']
], function()
{
    //tutaj routingi
});


