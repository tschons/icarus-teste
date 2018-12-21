<?php

namespace Modules\Prioridades;

require_once __DIR__ . '/Model.php';

final class Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function listPrioridades()
    {
        $prioridades = $this->model->listPrioridades();

        return $prioridades;
    }
}
