<?php

declare(strict_types=1);

namespace APP\controllers;

use APP\Core\AbstractController;
use APP\models\Clientes;

/**
 * Clase que se encarga de devolvernos una lista con todos los clientes
 */
class ListClientesController extends AbstractController
{
    /**
     * En este caso queremos todos los dato por lo con el modelo vamos a usar el método que nos devuelve todos los datos
     * @return void
     */
    public function listadoClientes(): void{
        //Llamamos al modelo para poder gestionar los datos
        $clientes = new Clientes();
        if(isset($_SERVER['HTTP_REFERER'])){
            $volver = $_SERVER['HTTP_REFERER'];
        }else{
            $volver = null;
        }
        //Para este controller vamos a utilizar la plantilla listaClientes.html.twig para poder mostrar adecuadamente los datos.
        $this->render("listaClientes.html.twig",
        //Le pasamos los parámetros al renderizado que son todos los datos que obtenemos del modelo.
        ["resultados" => $clientes->findAll(),
        'volver' => $volver,
        'title' => 'Lista clientes']
        );
    }
}