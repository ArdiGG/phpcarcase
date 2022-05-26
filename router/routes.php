<?php

use App\Services\Router;

Router::get('/', \App\Controllers\IndexController::class, 'index');
Router::get('/conferences', \App\Controllers\ConferencesController::class, 'index', \App\Models\Conference::class);
Router::get('/conferences/id', \App\Controllers\ConferencesController::class, 'show',\App\Models\Conference::class );

Router::post('/conferences/create', \App\Controllers\ConferencesController::class, 'create', \App\Models\Conference::class,true);

Router::enable();