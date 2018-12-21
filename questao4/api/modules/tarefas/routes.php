<?php
require_once __DIR__ . '/Controller.php';

use Modules\Tarefas\Controller;

$controller = new Controller();

$app->get('/tarefas', function () use ($app, $controller) {

    try {
        $tarefas = $controller->listTarefas();

        $app->response->body(json_encode($tarefas));

    } catch (Exception $error) {

        $return = array(
            'message' => $error->getMessage()
        );

        $app->response->setBody(json_encode($return));
        $app->response->setStatus(500);
    }

    $app->response->headers->set('Content-Type', 'application/json');

});

$app->get('/tarefa/:id', function ($id) use ($app, $controller) {

    try {
        $tarefa = $controller->loadTarefa($id);

        $app->response->body(json_encode($tarefa));

    } catch (Exception $error) {

        $return = array(
            'message' => $error->getMessage()
        );

        $app->response->setBody(json_encode($return));
        $app->response->setStatus(500);
    }

    $app->response->headers->set('Content-Type', 'application/json');
});

$app->put('/tarefa/:id', function ($id) use ($app, $controller) {

    try {

        $tarefa = json_decode($app->request->getBody(), true);

        $controller->editTarefa($id, $tarefa);
    } catch (Exception $error) {

        $return = array(
            'message' => $error->getMessage()
        );

        $app->response->setBody(json_encode($return));
        $app->response->setStatus(500);
    }
});

$app->delete('/tarefa/:id', function ($id) use ($app, $controller) {

    try {

        $controller->deleteTarefa($id);
    } catch (Exception $error) {

        $return = array(
            'message' => $error->getMessage()
        );

        $app->response->setBody(json_encode($return));
        $app->response->setStatus(500);
    }
});

$app->post('/tarefa', function () use ($app, $controller) {

    try {

        $tarefa = json_decode($app->request->getBody(), true);

        $id = $controller->createTarefa($tarefa);

        $return = array(
            'id' => $id
        );

        $app->response->setBody(json_encode($return));
    } catch (Exception $error) {

        $return = array(
            'message' => $error->getMessage()
        );

        $app->response->setBody(json_encode($return));
        $app->response->setStatus(500);
    }
});
