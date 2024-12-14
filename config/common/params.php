<?php

declare(strict_types=1);

use App\ViewInjection\CommonViewInjection;
use App\ViewInjection\LayoutViewInjection;
use App\ViewInjection\TranslatorViewInjection;
use Temporal\Activity\ActivityInterface;
use Temporal\Workflow\WorkflowInterface;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Classifier\Classifier;
use Yiisoft\Definitions\Reference;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\Renderer\CsrfViewInjection;

$classifier = new Classifier(dirname(__DIR__, 2) . '/src');

return [
    'app' => [
        'charset' => 'UTF-8',
        'locale' => 'en',
        'name' => 'My Project',
    ],

    'yiisoft/aliases' => [
        'aliases' => require __DIR__ . '/aliases.php',
    ],

    'yiisoft/translator' => [
        'locale' => 'en',
        'fallbackLocale' => 'en',
        'defaultCategory' => 'app',
    ],

    'yiisoft/view' => [
        'basePath' => '@views',
        'parameters' => [
            'assetManager' => Reference::to(AssetManager::class),
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
            'currentRoute' => Reference::to(CurrentRoute::class),
            'translator' => Reference::to(TranslatorInterface::class),
        ],
    ],

    'yiisoft/yii-view-renderer' => [
        'viewPath' => '@views',
        'layout' => '@layout/main.php',
        'injections' => [
            Reference::to(CommonViewInjection::class),
            Reference::to(CsrfViewInjection::class),
            Reference::to(LayoutViewInjection::class),
            Reference::to(TranslatorViewInjection::class),
        ],
    ],

    'yiisoft/yii-runner-roadrunner' => [
        'temporal' => [
            'enabled' => true,
            'workflows' => iterator_to_array($classifier->withAttribute(WorkflowInterface::class)->find()),
            'activities' => iterator_to_array($classifier->withAttribute(ActivityInterface::class)->find()),
        ],
    ],
];
