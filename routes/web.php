<?php

use Illuminate\Support\Facades\Route;

Route::post('/upload-image', [App\Http\Controllers\EditorController::class, 'upload']);

Route::prefix("/")->name("web.public.")->group(function () {

    Route::get('/', App\Livewire\Public\Home::class)->name('home');
    Route::get('/sobre', App\Livewire\Public\About::class)->name('about');
    Route::get('/contacto', App\Livewire\Public\Contact::class)->name('contact');
    Route::get('/termos-de-uso', App\Livewire\Public\Terms::class)->name('terms');
    Route::get('/politicas', App\Livewire\Public\Privacy::class)->name('privacy');
    Route::get('/faq', App\Livewire\Public\Faq::class)->name('faq');

    Route::get('/inscricao', App\Livewire\Public\Form::class)->name('form');

    Route::prefix("/artigos")->name("blog.")->group(function () {
        Route::get('/', App\Livewire\Public\Blog\Index::class)->name('index');
        Route::get('/{slug}', App\Livewire\Public\Blog\Detail::class)->name('detail');
    });

    Route::get('/servicos', App\Livewire\Public\Service\Index::class)->name('service');
    Route::get('/rooms', App\Livewire\Public\Rooms\Index::class)->name('rooms');

    Route::get('/fotos', App\Livewire\Public\Gallery\Index::class)->name('gallery');



});

Route::prefix("/painel")->name("web.admin.")->group(function () {

    #.guest
    Route::middleware([App\Http\Middleware\GuestMiddleware::class])->group(function () {
        Route::get('/login', App\Livewire\Admin\Auth\Login::class)->name('auth.login');
        Route::get('/forgot-password', App\Livewire\Admin\Auth\Forgot::class)->name('auth.forgot');
    });
    #.guest


    #auth
    Route::middleware([App\Http\Middleware\AuthMiddleware::class])->group(function () {
        Route::get('/', App\Livewire\Admin\Index::class)->name('index');

        Route::prefix("/documents")->name("documents.")->group(function () {
            Route::get('/', App\Livewire\Admin\Documents\Index::class)->name('index');
        });

        Route::prefix("/users")->name("users.")->group(function () {
            Route::get('/', App\Livewire\Admin\Users\Index::class)->name('index');
            Route::get('/add', App\Livewire\Admin\Users\Add::class)->name('add');
            #Route::get('/{slang}', App\Livewire\Admin\Users\Detail::class)->name('detail');
        });


        Route::prefix("/gallery")->name("gallery.")->group(function () {
            Route::get('/', App\Livewire\Admin\Gallery\Index::class)->name('index');
            Route::get('/add', App\Livewire\Admin\Gallery\Add::class)->name('add');
        });

        Route::prefix("/settings")->name("settings.")->group(function () {
            Route::get('/', App\Livewire\Admin\Settings\Index::class)->name('index');
        });


        //logout
        Route::any('auth/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
    });
    #.auth

});