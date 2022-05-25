<?php

use App\Services\Router;

Router::get('/', \App\Controllers\IndexController::class, 'index');
Router::get('/test', \App\Controllers\ConferencesController::class, 'index', \App\Models\Conference::class);
Router::get('/test/view', \App\Controllers\ConferencesController::class, 'view', \App\Models\Conference::class);

Router::post('/test/create', \App\Controllers\ConferencesController::class, 'create', \App\Models\Conference::class,true);

Router::enable();