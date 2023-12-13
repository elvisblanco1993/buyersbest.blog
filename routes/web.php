<?php

use App\Livewire\Article\Index as Articles;
use App\Livewire\Article\Create as NewArticle;
use App\Livewire\Article\Edit as EditArticle;
use App\Livewire\Tag\Index as Tags;
use App\Livewire\Website\Index as WebsiteHome;
use App\Livewire\Website\ShowArticle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', WebsiteHome::class)->name('home');
Route::get('/{slug}', ShowArticle::class)->name('article.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')
->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/articles', Articles::class)->name('article.index');
    Route::get('/articles/new', NewArticle::class)->name('article.create');
    Route::get('/articles/{article}/edit', EditArticle::class)->name('article.edit');

    Route::get('/tags', Tags::class)->name('tag.index');
});
