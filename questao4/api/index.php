<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

require_once 'modules/tarefas/routes.php';
require_once 'modules/prioridades/routes.php';

if($app->request->isOptions()) {
    return true;
}

$app->run();
