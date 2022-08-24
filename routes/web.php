<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KonsultasiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [GuestController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'role:super_admin']], function () {
    Route::get('/home', [AdminController::class, 'home'])->name('home');

    Route::get('/konsultasi', [AdminController::class, 'conference'])->name('conference');
    Route::get('/jadwal_konsultasi', [KonsultasiController::class, 'jadwal_konsultasi'])->name('jadwal_konsultasi');

    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/add_user', [AdminController::class, 'add_user'])->name('add_user');
    Route::post('/edit_user', [AdminController::class, 'edit_user'])->name('edit_user');
    Route::post('/delete_user', [AdminController::class, 'delete_user'])->name('delete_user');
    Route::post('/edit_role_user', [AdminController::class, 'edit_role_user'])->name('edit_role_user');

    Route::get('/roles', [AdminController::class, 'roles'])->name('roles');
    Route::post('/add_role', [AdminController::class, 'add_role'])->name('add_role');
    Route::post('/edit_role', [AdminController::class, 'edit_role'])->name('edit_role');
    Route::post('/delete_role', [AdminController::class, 'delete_role'])->name('delete_role');

    Route::get('/zoom', [KonsultasiController::class, 'zoom'])->name('zoom');
    Route::post('/add_zoom', [KonsultasiController::class, 'add_zoom'])->name('add_zoom');
    Route::post('/edit_zoom', [KonsultasiController::class, 'edit_zoom'])->name('edit_zoom');
    Route::post('/delete_zoom', [KonsultasiController::class, 'delete_zoom'])->name('delete_zoom');
    
    Route::get('/sync_publication_data', [ChatbotController::class, 'sync_publication_data'])->name('sync_publication_data');
    Route::get('/sync_statictable_data', [ChatbotController::class, 'sync_statictable_data'])->name('sync_statictable_data');
    
    
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::post('/chatbot_msg', [ChatbotController::class, 'chatbot_msg'])->name('chatbot_msg');
    Route::get('/konsultasi_guest', [GuestController::class, 'conference'])->name('conference_guest');
    Route::get('/chatbot_guest', [GuestController::class, 'chatbot'])->name('chatbot_guest');
});

Route::get('/register', [GuestController::class, 'register'])->name('register');
Route::post('/add_opd', [GuestController::class, 'add_opd'])->name('add_opd');
