<?php

declare(strict_types=1);

use Yiisoft\Html\Html;

$items = [
    ['label' => 'Fast', 'url' => '/temporal/fast/Hello_world', 'color' => 'blue'],
    ['label' => 'Complicated', 'url' => '/temporal/complicated/Hello_world', 'color' => 'green'],
    ['label' => 'Complicated & Async', 'url' => '/temporal/async/Hello_world', 'color' => 'yellow'],
];

foreach ($items as $item) {
    echo Html::a(
        $item['label'],
        $item['url'],
        [
            'class' => sprintf(
                'py-2 px-4 rounded bg-%s-500 !text-white hover:bg-%s-600 focus:outline-none',
                $item['color'],
                $item['color']
            ),
        ]
    );
}
