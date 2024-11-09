<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia::render('Home');
});

Route::controller(HotelController::class)->group(function() {
    Route::get('/hotel', 'index')->name('hotel.index');
    Route::get('/hotel/cadastro', 'create')->name('hotel.create');
    Route::post('/hotel/cadastro', 'store')->name('hotel.store');
    Route::get('/hotel/visualizar/{hotelId}', 'show')->name('hotel.show');
    Route::get('/hotel/editar/{hotelId}', 'edit')->name('hotel.edit');
    Route::put('/hotel/editar/{hotelId}', 'update')->name('hotel.update');
    Route::delete('/hotel/deletar/{hotelId}', 'destroy')->name('hotel.destroy');
});

Route::controller(RoomController::class)->group(function() {
    Route::get('/rooms', 'index')->name('room.index');
    Route::get('/room/cadastro', 'create')->name('room.create');
    Route::post('/room/cadastro', 'store')->name('room.store');
    Route::get('/room/visualizar/{roomId}', 'show')->name('room.show');
    Route::get('/room/editar/{roomId}', 'edit')->name('room.edit');
    Route::put('/room/editar/{roomId}', 'update')->name('room.update');
    Route::delete('/room/deletar/{roomId}', 'destroy')->name('room.destroy');
});

require __DIR__.'/auth.php';
