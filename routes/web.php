<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\TesteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/latex', TesteController::class);

Route::get('/latex-footer', function() {
    $data = [];
    $template = View::make('relatorios.tex', $data)->render();
    return $template;
});

