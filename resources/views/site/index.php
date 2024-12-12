<?php

declare(strict_types=1);

/**
 * @var WebView $this
 * @var TranslatorInterface $translator
 * @var ApplicationParameters $applicationParameters
 */

use App\ApplicationParameters;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

$this->setTitle($applicationParameters->getName());
?>

<div class="text-center">
    <a href="/temporal" class="hover:blue-700 text-white font-bold py-2 px-4 rounded">
        Check out Temporal in action
    </a>
</div>
