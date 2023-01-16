<?php

use App\Models\Gpu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GpuController;
use App\Http\Controllers\MinerController;

Route::get('/', function () {
    return view('main');
});

Route::get('/gpu/list', function () {
    return Gpu::all()->toJson();
});

Route::get('/gpu', function (Gpu $gpu) {
    return view('gpu');
});

Route::get('/token', function () {
    return csrf_token();
});

Route::post('/miner/build', [MinerController::class, 'build']);

Route::post('/gpu/add', [GpuController::class, 'store']);

