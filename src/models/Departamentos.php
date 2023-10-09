<?php

declare(strict_types=1);

namespace APP\models;


use APP\core\DataBase;

class Departamentos
{

    //Remarcar que cuando creamos el Model el constructor no hace nada.
    public function __construct()
    {
    }

    /**
     * Ejecutaremos la sentencia SQL correspondiente en el método para que nos devuelva todos los datos de la tabla departamentos
     * @return array
     */
    public function findAll(): array{

        $sql = "SELECT * FROM dept";
        //En este caso llamamos al método getInstance de la Clase DataBase y obtendremos una instancia de la misma,
        //Nosotros no debemos preocuparnos de si ya existía o no.
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }
}