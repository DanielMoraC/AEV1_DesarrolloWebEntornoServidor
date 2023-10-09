<?php

declare(strict_types=1);

namespace APP\models;


use APP\core\DataBase;

class Pedidos
{

    //Remarcar que cuando creamos el Model el constructor no hace nada.
    public function __construct()
    {
    }

    /**
     * Ejecutaremos la sentencia SQL correspondiente en el método para que nos devuelva todos los pedidos de un empleado sin el código del cliente
     * @return array
     */
    public function findByCliente($id): array{

        $sql = "SELECT `PEDIDO_NUM` FROM `pedido` WHERE CLIENTE_COD = $id";
        //En este caso llamamos al método getInstance de la Clase DataBase y obtendremos una instancia de la misma,
        //Nosotros no debemos preocuparnos de si ya existía o no.
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

    /**
     * Ejecutaremos la sentencia SQL correspondiente en el método para que nos devuelva todos los pedidos de un empleado sin el código del cliente
     * @return array
     */
    public function findById($id): array{

        $sql = "SELECT * FROM `pedido` WHERE PEDIDO_NUM = $id";
        //En este caso llamamos al método getInstance de la Clase DataBase y obtendremos una instancia de la misma,
        //Nosotros no debemos preocuparnos de si ya existía o no.
        $db = DataBase::getInstance();
        return $db->executeSQL($sql)[0];
    }
}