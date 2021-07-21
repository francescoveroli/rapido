<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

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



//home
//Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('home');

//nuevo anuncio
Route::get('/announcement/new', [HomeController::class,'newAnnouncement'])->name('announcement.new');

//Recuperar las imágenes después del error de validación
Route::get('/announcement/images', [HomeController::class,'getImages'])->name('announcement.images');

Route::post('/announcement/create', [HomeController::class,'createAnnouncement'])->name('announcement.create');



//visualizacion anuncio de ususario no registrado
Route::get('/', [PublicController::class,'index'])->name('home');

//anuncio relacionado con categoria
Route::get('/category/{name}/{id}/announcements', [PublicController::class,'announcementsByCategory'])->name('category.announcements');

//web detalle
Route::get('/announcement/{id}', [HomeController::class,'details'])->name('announcement.details');

//upload imagenes
Route::post('/announcement/images/upload', [HomeController::class,'uploadImages'])->name('announcement.images.upload');

//delete imagenes
Route::delete('/announcement/images/remove', [HomeController::class,'removeImages'])->name('announcement.images.remove');


//revisor
Route::get('/revisor',[RevisorController::class,'index'] )->name('revisor.home');

//revisor acepta-rechaza
Route::post('/revisor/announcement/{id}/accept',[RevisorController::class,'accept'])->name('revisor.announcement.accept');
Route::post('/revisor/announcement/{id}/reject',[RevisorController::class,'reject'])->name('revisor.announcement.reject');

//banderas
Route::post('/locale/{locale}', [PublicController::class,'locale'])->name('locale');

//search
Route::get('/search', [PublicController::class,'search'])->name('search');

