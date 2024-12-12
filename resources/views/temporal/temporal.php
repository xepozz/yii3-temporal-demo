<?php

declare(strict_types=1);

use App\ApplicationParameters;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var WebView $this
 * @var TranslatorInterface $translator
 * @var ApplicationParameters $applicationParameters
 * @var float $microtime
 * @var string $response
 * @var object $wf
 */

$this->setTitle($applicationParameters->getName());
?>

<div class="grid grid-cols-[20%_80%] gap-4">
    <div class="flex flex-col col-3 space-y-2">
        <?= $this->render('menu') ?>
    </div>

    <div>
        <h2 class="text-lg font-semibold"><?= $wf ?> run took <?= $microtime ?> ms.</h2>
        <pre class="bg-gray-800 text-white p-4 rounded-md overflow-x-auto text-sm"><?= print_r(
                $response,
                true
            ) ?>></pre>
    </div>
</div>
