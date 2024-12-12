<?php

declare(strict_types=1);

namespace App\Controller;

use App\Temporal\Workflow\FastWorkflow;
use App\Temporal\Workflow\LongWorkflow;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Temporal\Client\WorkflowClientInterface;
use Temporal\Internal\Client\WorkflowProxy;
use Yiisoft\Http\Status;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Yii\View\Renderer\ViewRenderer;

final class TemporalController
{
    public function __construct(
        private readonly WorkflowClientInterface $workflowClient,
        private readonly ResponseFactoryInterface $responseFactory,
        private ViewRenderer $viewRenderer,
    ) {
        $this->viewRenderer = $viewRenderer->withController($this);
    }

    public function indexAction(): ResponseInterface
    {
        return $this->viewRenderer->render('index');
    }

    public function fastAction(CurrentRoute $route): ResponseInterface
    {
        $name = (string) $route->getArgument('name');
        $start = microtime(true);

        /**
         * @var WorkflowProxy|FastWorkflow $wf
         */
        $wf = $this->workflowClient->newWorkflowStub(FastWorkflow::class);
        $result = $wf->run($name, 5);

        $end = microtime(true);

        $response = [
            'microtime' => $end - $start,
            'result' => $result,
        ];

        return $this->viewRenderer->render('temporal', [
            'wf' => $wf->getHandlerReflection()->class,
            'response' => $response,
            'microtime' => $end - $start,
        ]);
    }

    public function complicatedAction(CurrentRoute $route): ResponseInterface
    {
        $name = (string) $route->getArgument('name');
        $start = microtime(true);

        /**
         * @var WorkflowProxy|LongWorkflow $wf
         */
        $wf = $this->workflowClient->newWorkflowStub(LongWorkflow::class);
        $result = $wf->run($name, 5);

        $end = microtime(true);

        $response = [
            'microtime' => $end - $start,
            'result' => $result,
        ];

        return $this->viewRenderer->render('temporal', [
            'wf' => $wf->getHandlerReflection()->class,
            'response' => $response,
            'microtime' => $end - $start,
        ]);
    }

    public function asyncAction(UrlGeneratorInterface $urlGenerator, CurrentRoute $route): ResponseInterface
    {
        $name = (string) $route->getArgument('name');

        /**
         * @var WorkflowProxy|LongWorkflow $wf
         */
        $wf = $this->workflowClient->newWorkflowStub(LongWorkflow::class);
        $process = $this->workflowClient->start($wf, $name, 10);
        $id = $process->getExecution()->getID();

        $url = $urlGenerator->generate('temporal/async-status', ['id' => $id]);

        return $this->responseFactory->createResponse(Status::TEMPORARY_REDIRECT)
            ->withHeader('Location', $url);
    }

    public function asyncStatusAction(CurrentRoute $route): ResponseInterface
    {
        $id = (string) $route->getArgument('id');
        $start = microtime(true);

        /**
         * @var WorkflowProxy|LongWorkflow $wf
         */
        $wf = $this->workflowClient->newRunningWorkflowStub(LongWorkflow::class, $id);
        $result = $wf->getStatus();

        $end = microtime(true);

        $response = [
            'Note' => 'Please update the page to see results',
            'microtime' => $end - $start,
            'result' => $result,
        ];

        return $this->viewRenderer->render('temporal', [
            'wf' => $wf->getHandlerReflection()->class,
            'response' => $response,
            'microtime' => $end - $start,
        ]);
    }
}
