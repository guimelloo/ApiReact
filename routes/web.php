<?php

use App\Modules\Api\EmailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmailsController::class, 'index']);
Route::get('/email', [EmailsController::class, 'create']);
