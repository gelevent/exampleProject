<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ReportGuruMapelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.welcome');
});

// Route::get('/guru', function () {
//     return view('dataGuru.guru');
// });

// Route::get('/dataGuru', [GuruController::class, 'guru'])->name('dataGuru.guru');

Route::controller(GuruController::class)->group(function () {
    Route::get('/guru', 'tampil')->name('dataGuru.guru');
    Route::post('/create_guru', 'send')->name('create.guru');
    Route::put('/dataGuru/{id}', 'update')->name('dataGuru.update');
    Route::delete('/dataGuru/{id}', 'destroy')->name('dataGuru.destroy');
});

Route::controller(AssessmentController::class)->group(function () {
    Route::get('/assessment', 'index')->name('assessment.index');
    Route::post('/create_assessment', 'store')->name('assessment.store');
    Route::get('/assessment/result', 'result')->name('assessment.result');
    Route::delete('/assessment/{id}', 'destroy')->name('assessment.destroy');
    Route::get('assessment/{id}/edit', 'edit')->name('assessment.edit');
    Route::get('assessment/{id}/', 'update')->name('assessment.update');
});
