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

//Route::get('/', 'HomeController@index');

Route::get('/',[
    'uses' => 'HomeController@index',
    'as' => 'home.index'
]);

//Route::get('/', function ()
//{
//    return view('home');
//});

//TREŚC TYLKO DLA UŻYTKOWNIKÓW - Routingi
Route::group([
    'middleware' => 'roles',
    'roles' => ['user']
], function()
{
    //tutaj routingi
    Route::get('/homeUser', function ()
    {
        return view('home.home');
    });

//    Route::get('/home', function ()
//    {
//        return view('home.home');
//    });

    //wyszukiwanie
    Route::get('/find', [
        'uses' => 'SearchController@find',
        'as' => 'search'
    ]);

    //ARTYŚCI - wersja dla użytkownika! Nie może dodawać i usuwać, tylko przeglądać
    Route::get('/userArtists',[
        'uses' => 'UserArtistsController@index',
        'as' => 'userArtists.index'
    ]);

    Route::get('/userArtists/{artist}',[
        'uses' => 'userArtistsController@details',
        'as' => 'userArtists.details'
    ]);

    //ALBUMY - wersja dla uzytkownika! Nie może dodawać i usuwać, tylko przeglądać
    Route::get('/userAlbums', [
        'uses' => 'UserAlbumsController@index',
        'as' => 'userAlbums.index'
    ]);

    Route::get('/userAlbums/{album}',[
        'uses' => 'userAlbumsController@details',
        'as' => 'userAlbums.details'
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

    //ZAMÓWIENIE

    Route::get('/zamow', [
        'uses' => 'CartController@zamow',
        'as' => 'cart.zamow'
    ]);

    Route::post('/zamowienie/store', [
        'uses' => 'ZamowienieController@store',
        'as' => 'zamowienie.store'
    ]);

    Route::get('/UserZamowienia', [
        'uses' => 'ZamowienieController@user',
        'as' => 'userZamowienie.index'
    ]);

    Route::get('/UserZamowienia/{zamowienie}', [
        'uses' => 'ZamowienieController@userDetails',
        'as' => 'userZamowienie.userDetails'
    ]);

});



//TREŚC TYLKO DLA PRACOWNIKÓW - Routingi
Route::group([
    'middleware' => 'roles',
    'roles' => ['prac']
], function()
{
    //tutaj routingi TYLKO DLA PRACOWNIKA, jeśli admin to też ma to do wspólnych na dole
    //tutaj routingi
    Route::get('/homePrac', function ()
    {
        return view('home.homePrac');
    });

    //Zamówienie

    Route::get('/PracZamowienia', [
        'uses' => 'ZamowienieController@prac',
        'as' => 'pracZamowienie.index'
    ]);

    Route::get('/PracZamowienia/{zamowienie}', [
        'uses' => 'ZamowienieController@pracDetails',
        'as' => 'pracZamowienie.pracDetails'
    ]);

    Route::post('/PracZamowienia/zmienStatus/{zamowienie}', [
        'uses' => 'ZamowienieController@pracZmienStatus',
        'as' => 'pracZamowienie.pracZmienStatus'
    ]);

});

//TREŚC TYLKO DLA ADMINISTRATORA - Routingi
Route::group([
    'middleware' => 'roles',
    'roles' => ['admin']
], function()
{

    //tutaj routingi TYLKO DLA ADMINISTRATORA, jeśli jest to coś co ma pracownik to do wspólnych na dole
    Route::get('/homeAdmin', function ()
    {
        return view('home.homeAdmin');
    });


    //ZARZĄDZANIE UŻYTKOWNIKAMI - administrator
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

    //ZARZĄDZANIE PRACOWNIKAMI - administrator
    Route::get('/pracManagementPanel',[
        'uses' => 'PracManagementPanelController@index',
        'as' => 'pracManagementPanel.index'
    ]);

    Route::get('/pracManagementPanel/add',[
        'uses' => 'PracManagementPanelController@add',
        'as' => 'pracManagementPanel.add'
    ]);

    Route::post('/pracManagementPanel/save',[
        'uses' => 'PracManagementPanelController@save',
        'as' => 'pracManagementPanel.save'
    ]);

    Route::get('/pracManagementPanel/edit/{userID}',[
        'uses' => 'pracManagementPanelController@edit',
        'as' => 'pracManagementPanel.edit'
    ]);

    Route::post('/pracManagementPanel/{user}',[
        'uses' => 'pracManagementPanelController@update',
        'as' => 'pracManagementPanel.update'
    ]);

    Route::delete('/pracManagementPanel/{userID}',[
        'uses' => 'pracManagementPanelController@destroy',
        'as' => 'pracManagementPanel.destroy'
    ]);
});

//TREŚC WSPÓLNA DLA ADMINISTRATORA I PRACOWNIKA - Routingi (Administrator ma też uprawnienia pracownika)
Route::group([
    'middleware' => 'roles',
    'roles' => ['prac', 'admin']
], function()
{
    //tutaj routingi

    Route::get('/homePrac', function ()
    {
        return view('home.homePrac');
    });

//    Route::get('/home', function ()
//    {
//        return view('home.homePrac');
//    });

    //ARTYŚCI - wersja dla pracowników
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

    Route::get('/artists/edit/{artist}',[
        'uses' => 'ArtistsController@editArtist',
        'as' => 'artists.editArtist'
    ]);

    Route::post('/artists/{artist}',[
        'uses' => 'ArtistsController@updateArtist',
        'as' => 'artists.updateArtist'
    ]);

    Route::delete('artists/{artist}', [
        'uses' => 'ArtistsController@destroyArtist',
        'as' => 'artists.delete'
    ]);

    Route::get('/artists/{artist}',[
        'uses' => 'ArtistsController@details',
        'as' => 'artists.details'
    ]);

    //ALBUMY - wersja dla pracownika - pełna funkcjonalność, dodawanie, usuwanie
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

    //KOD RABATOWY - wersja dla pracownika
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
});

