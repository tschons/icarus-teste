<?php

namespace Modules\Tarefas;

require_once __DIR__ . '/Model.php';

final class Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function listTarefas()
    {
        $tarefas = $this->model->listTarefas();

        return $tarefas;
    }

    public function loadTarefa($id)
    {
        $tarefa = $this->model->loadTarefa($id);

        return $tarefa;
    }

    public function editTarefa($id, $tarefa)
    {
        $this->model->editTarefa($id, $tarefa);
    }

    public function deleteTarefa($id)
    {
        $this->model->deleteTarefa($id);
    }

    public function createTarefa($tarefa)
    {
        $id = $this->model->createTarefa($tarefa);

        return $id;
    }
}
