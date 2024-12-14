<?php

declare(strict_types=1);

use App\Controller\SiteController;
use App\Controller\TemporalController;
use Yiisoft\Router\Group;
use Yiisoft\Router\Route;

return [
    Group::create()
        ->routes(
            Group::create()
                ->routes(
                    Route::get('/')
                        ->action([SiteController::class, 'index'])
                        ->name('home'),
                )
        ),

    Group::create('/temporal')
        ->namePrefix("temporal/")
        ->routes(
            Route::get('[/]')
                ->action([TemporalController::class, 'indexAction'])
                ->name('index'),

            Route::get('/fast/{name:\w+}')
                ->action([TemporalController::class, 'fastAction'])
                ->name('fast'),

            Route::get('/complicated/{name:\w+}')
                ->action([TemporalController::class, 'complicatedAction'])
                ->name('complicated'),

            Route::get('/async/{name:\w+}')
                ->action([TemporalController::class, 'asyncAction'])
                ->name('async'),

            Route::get('/async-status/{id:[\w-]+}')
                ->action([TemporalController::class, 'asyncStatusAction'])
                ->name('async-status'),
        ),
];
