<?php
require_once __DIR__ . '/Controller.php';

use Modules\Prioridades\Controller;

$controller = new Controller();

$app->get('/prioridades', function () use ($app, $controller) {

    try {
        $prioridades = $controller->listPrioridades();

        $app->response->body(json_encode($prioridades));

    } catch (Exception $error) {

        $return = array(
            'message' => $error->getMessage()
        );

        $app->response->setBody(json_encode($return));
        $app->response->setStatus(500);
    }

    $app->response->headers->set('Content-Type', 'application/json');

});

