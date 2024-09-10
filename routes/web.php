<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\TeacherPerformanceController;
use App\Http\Controllers\TeacherPerformanceController2;
use App\Http\Controllers\TeacherPerformanceControllerPage2;


Route::get('/', function () {
    return view('home.welcome');
});


Route::controller(GuruController::class)->group(function () {
    Route::get('/guru', 'tampil')->name('dataGuru.guru');
    Route::post('/create_guru', 'send')->name('create.guru');
    Route::put('/dataGuru/{id}', 'update')->name('dataGuru.update');
    Route::delete('/dataGuru/{id}', 'destroy')->name('dataGuru.destroy');
    Route::get('/dataGuru/{id}/download-pdf', 'generatePDF')->name('download.pdf');
});


Route::controller(TeacherPerformanceController::class)->group(function () {
    Route::get('/teacher-performance', 'create')->name('teacher-performance.create');
    Route::post('/teacher-performance/store', 'store')->name('teacher-performance.store');
    Route::delete('/teacher-performance/{id}',  'destroy')->name('teacher-performance.destroy');
    Route::post('/teacher-performance/{id}/generate-pdf', 'generatePdf')->name('teacher-performance.generatePdf');

});


Route::controller(TeacherPerformanceControllerPage2::class)->group(function () {
    Route::get('/teacherPerformancePage2', 'create')->name('teacherPerformancePage2.create');
    Route::post('/teacherPerformancePage2/store', 'store')->name('teacherPerformancePage2.store');
    Route::delete('/teacherPerformancePage2/{id}', 'destroy')->name('teacherPerformancePage2.destroy');
    Route::get('/teacherPerformancePage2/{id}/pdf', 'generatePdf')->name('teacherPerformancePage2.generatePdf');
});

