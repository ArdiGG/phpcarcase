<?php

use App\Services\Router;

Router::get('/', \App\Controllers\IndexController::class, 'index');
Router::get('/conferences', \App\Controllers\ConferencesController::class, 'index', \App\Models\Conference::class);
Router::get('/conferences/create', \App\Controllers\ConferencesController::class, 'create');
Router::get('/conferences/id', \App\Controllers\ConferencesController::class, 'show',\App\Models\Conference::class, true );

Router::post('/conferences/store', \App\Controllers\ConferencesController::class, 'store', \App\Models\Conference::class,true);

Router::enable();