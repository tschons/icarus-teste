<?php

namespace Modules\Prioridades;

require_once 'core/AbstractModel.php';

use Core\AbstractModel;

final class Model extends AbstractModel
{

    public function listPrioridades()
    {
        $query = '
            SELECT
                id,
                nome
            FROM
                prioridades
            ORDER BY
                id asc
        ';

        $queryResult = $this->connDb->query($query);

        $rows = array();
        while ($row = $queryResult->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }
}
