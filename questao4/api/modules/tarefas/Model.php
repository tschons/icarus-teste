<?php

namespace Modules\Tarefas;

require_once 'core/AbstractModel.php';

use Core\AbstractModel;

final class Model extends AbstractModel
{

    public function listTarefas()
    {
        $query = '
            SELECT
                tarefas.id,
                titulo,
                descricao,
                prioridade,
                prioridades.nome as pri_nome
            FROM
                tarefas
            JOIN
                prioridades ON prioridades.id = tarefas.prioridade
            ORDER BY
                prioridade asc
        ';

        $queryResult = $this->connDb->query($query);

        $rows = array();
        while($row = $queryResult->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function loadTarefa($id)
    {
        $query = '
            SELECT
                id,
                titulo,
                descricao,
                prioridade
            FROM
                tarefas
            WHERE
                id = ?
        ';

        $stmtPrep = $this->connDb->prepare($query);
        $stmtPrep->bind_param('i', $id);
        $stmtPrep->execute();
        $stmtResult = $stmtPrep->get_result();

        return $stmtResult->fetch_assoc();
    }

    public function editTarefa($id, $tarefa)
    {

        $query = '
            UPDATE
                tarefas
            SET
                titulo = ?,
                descricao = ?,
                prioridade = ?
            WHERE
                id = ?
        ';

        $stmtPrep = $this->connDb->prepare($query);
        $stmtPrep->bind_param(
            'ssii',
            $tarefa['titulo'],
            $tarefa['descricao'],
            $tarefa['prioridade'],
            $id
        );
        $stmtPrep->execute();
    }

    public function deleteTarefa($id)
    {

        $query = '
            DELETE FROM
                tarefas
            WHERE
                id = ?
        ';

        $stmtPrep = $this->connDb->prepare($query);
        $stmtPrep->bind_param('i', $id);
        $stmtPrep->execute();
    }

    public function createTarefa($tarefa)
    {

        $query = '
            INSERT INTO
                tarefas(
                    titulo,
                    descricao,
                    prioridade
                )
            VALUES(
                ?,
                ?,
                ?
            )
        ';

        $stmtPrep = $this->connDb->prepare($query);
        $stmtPrep->bind_param(
            'ssi',
            $tarefa['titulo'],
            $tarefa['descricao'],
            $tarefa['prioridade']
        );
        $stmtPrep->execute();

        return $stmtPrep->insert_id;
    }
}