<?php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\categoryController;
use App\Http\Controllers\countryController;
use App\Http\Controllers\episodeController;
use App\Http\Controllers\genreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoginGoogleControler;
use App\Http\Controllers\movieController;

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

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [IndexController::class, 'watch']);
Route::get('/tap-phim', [IndexController::class, 'episode'])->name('tap-phim');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::get('/tim-kiem', [IndexController::class, 'timkiem'])->name('tim-kiem');
Route::get('/locphim', [IndexController::class, 'locphim'])->name('locphim');
Route::post('/add-rating', [IndexController::class, 'add_rating'])->name('add-rating');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// route admin
Route::resource('category', categoryController::class);
Route::post('resorting', [categoryController::class, 'resorting'])->name('resorting');
Route::get('select-movie', [episodeController::class, 'select_movie'])->name('select-movie');
Route::get('add-episode/{id}', [episodeController::class, 'add_episode'])->name('add-episode');

Route::resource('genre', genreController::class);
Route::resource('country', countryController::class);
Route::resource('episode', episodeController::class);
Route::resource('movie', movieController::class);
Route::post('/update-year-phim', [MovieController::class, 'update_year']);
Route::get('/update-topview-phim', [MovieController::class, 'update_topview']);
Route::post('/update-topview', [MovieController::class, 'topview']);
Route::get('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::post('/update-season-phim', [MovieController::class, 'update_season']);

// Thông tin website
Route::resource('info', InfoController::class);


Route::get('/phimhot-choose', [MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
Route::get('/vietsub-choose', [MovieController::class, 'vietsub_choose'])->name('vietsub-choose');
Route::get('/category-choose', [MovieController::class, 'category_choose'])->name('category-choose');
Route::get('/country-choose', [MovieController::class, 'country_choose'])->name('country-choose');
Route::get('/trangthai-choose', [MovieController::class, 'trangthai_choose'])->name('trangthai-choose');
Route::get('/thuocphim-choose', [MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');
Route::get('/resolution-choose', [MovieController::class, 'resolution_choose'])->name('resolution-choose');
Route::post('/update-image-movie-ajax', [MovieController::class, 'update_image_movie_ajax'])->name('update-image-movie-ajax');

//authentication
Route::get('auth/google', [LoginGoogleControler::class, 'redirectToGoogle'])->name('login-by-gg');
Route::get('auth/google/callback', [LoginGoogleControler::class, 'handleGoogleCallback']);
