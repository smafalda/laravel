<?php

use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;


#Login
Route::get('/login', function(){
    return "hey hey hey";
})->name('login');



#GROUP ROUTE - ADMINISTRATOR
/*
Route::middleware([])->group(function(){  #define e metodo de auth

    Route::prefix('admin')->group(function(){  #define o prefixo admin 'admin/dashboard'

        Route::namespace('Admin')->group(function(){

            Route::name('admin.')->group(function(){

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('produtos');
        
                Route::redirect('/', function(){
                    return redirect()->route('admin.dashboard');
                })->name('home');

            });

        });

    });

});
*/

Route::group([
        'middleware'=>[],
        'prefix'=>'admin',
        'namespace'=>'Admin',
        'name'=> 'admin.'
    ], function(){
        Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
        Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
        Route::get('/produtos', 'TesteController@teste')->name('produtos');
        
        Route::get('/', function(){
            return redirect()->route('admin.dashboard');
        })->name('home');   
});



#MOstrando view
Route::view('/view', 'welcome');
Route::any('/any', function () {
    return 'any';
});

Route::get('/nome-url', function(){
    return "hey hey hey";
})->name('url.name');

Route::get('redirect3', function(){
   # return redirect('/nome-url');
   return redirect()->route('url.name');
});



#aceita os metodos especifivcados {get, post etc}
Route::match(['get', 'post'], '/any', function () {
    return 'any';
});
#rotas padrão
Route::get('/contato', function () {
    return view('contato');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Produtos da categoria: {$flag}";
});


#redirecionamento de rotas

Route::redirect('redirect1', 'redirect2');
/*
Route::get('redirect1', function(){
    return redirect('/redirect2');
});
*/
Route::get('redirect2', function(){
    return 'Redirect 02';
});

