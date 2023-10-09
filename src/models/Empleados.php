<?php

declare(strict_types=1);

namespace APP\models;


use APP\core\DataBase;

class Empleados
{

    //Remarcar que cuando creamos el Model el constructor no hace nada.
    public function __construct()
    {
    }

    /**
     * Ejecutaremos la sentencia SQL correspondiente en el método para que nos devuelva todos los datos de la tabla empleados
     * @return array
     */
    public function findAll(): array{

        $sql = "SELECT * FROM emp";
        //En este caso llamamos al método getInstance de la Clase DataBase y obtendremos una instancia de la misma,
        //Nosotros no debemos preocuparnos de si ya existía o no.
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

    /**
     * Ejecutaremos la sentencia SQL correspondiente en el método para que nos devuelva todos los datos de la tabla empleados si forman parte del departamento
     * @return array
     */
    public function findByDept($id): array{

        $sql = "SELECT * FROM `emp` WHERE DEPT_NO = $id";
        //En este caso llamamos al método getInstance de la Clase DataBase y obtendremos una instancia de la misma,
        //Nosotros no debemos preocuparnos de si ya existía o no.
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }
}