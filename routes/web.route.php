<?php
// routes for portfilio
Route::get('/',function(){
    return Route::controller("home","index");
});
// al majazer project
Route::get('/almajazer',function(){
    return Route::controller("home","almajazer");
});
// vpv project
Route::get('/vpv',function(){
    return Route::controller("home","vpv");
});
// shop-almajazer project
Route::get('/shop-almajazer',function(){
    return Route::controller("home","shop");
});
//====================================================== end of portfolio pages =======================================================================================
//====================================================== start of login =======================================================================================
// login page
Route::get('/login',function(){
    return Route::controller("user","loginpage");
});
Route::get('/login',function(){
    return Route::controller("user","login");
});
Route::post('/signup',function(){
    return Route::controller("user","addUser");
});