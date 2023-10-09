<?php

namespace APP\core\Interfaces;

/**
 * Interfaz que nos garantiza que siempre que la implementemos deberemos sí o sí implémentar el método asociado,
 * garántizando el correcto funcionamiento de la aplicación para una ejecución de una función en SQL.
 */
interface IDataBase
{

    /**
     * Obligamos a la implementación del método executeSQL que ejecutará la sentencia SQL recibida en tipo String
     * @param string $sql
     * @return array
     */
    public function executeSQL(string $sql): array;
}