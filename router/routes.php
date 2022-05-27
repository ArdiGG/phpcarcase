<?php

use App\Services\Router;
Router::get('/', \App\Controllers\IndexController::class, 'index');
Router::get('/conferences', \App\Controllers\ConferencesController::class, 'index', \App\Models\Conference::class);
Router::get('/conferences/create', \App\Controllers\ConferencesController::class, 'create');
Router::get('/conferences/id', \App\Controllers\ConferencesController::class, 'show',\App\Models\Conference::class, true );
Router::get('/conferences/id/edit', \App\Controllers\ConferencesController::class, 'edit', \App\Models\Conference::class, true);

Router::post('/conferences/store', \App\Controllers\ConferencesController::class, 'store', \App\Models\Conference::class,true);

Router::patch('/conferences/id/update', \App\Controllers\ConferencesController::class, 'update', \App\Models\Conference::class, true, true );

Router::enable();