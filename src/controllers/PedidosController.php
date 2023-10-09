<?php

declare(strict_types=1);

namespace APP\controllers;

use APP\Core\AbstractController;
use APP\models\Pedidos;
use APP\models\Clientes;

/**
 * Clase que se encarga de devolvernos una lista con los clientes y sus pedidos pasado por url
 */
class PedidosController extends AbstractController
{
    /**
     * En este caso queremos todos los dato por lo con el modelo vamos a usar el método que nos devuelve todos los datos
     * @return void
     */
    public function listaPedidos(): void{
        //Llamamos al modelo para poder gestionar los datos
        $clientes = new Clientes();
        $pedidos = new Pedidos();
        if(isset($_SERVER['HTTP_REFERER'])){
            $volver = $_SERVER['HTTP_REFERER'];
        }else{
            $volver = null;
        }
        //De esta forma sabemos si se ha seleccionado un cliente y cual
        isset($_GET["cliente"]) ? $id = $_GET["cliente"] : $id = null;
        if(is_null($id)){
            //Para este controller vamos a utilizar la plantilla pedidos.html.twig para poder mostrar adecuadamente los datos.
            $this->render("pedidos.html.twig",
            //Le pasamos los parámetros al renderizado que son todos los datos que obtenemos del modelo.
            ["clientes" => $clientes->findAll(),
            'volver' => $volver,
            'title' => 'Pedidos']
            );
        }else{
            //Para este controller vamos a utilizar la plantilla pedidos.html.twig para poder mostrar adecuadamente los datos.
            $this->render("pedidos.html.twig",
            //Le pasamos los parámetros al renderizado que son todos los datos que obtenemos del modelo.
            ["clientes" => $clientes->findAll(),
            "pedidos" => $pedidos->findByCliente($id),
            'cliente' => $clientes->findById($id)["NOMBRE"],
            'volver' => $volver,
            'title' => 'Pedidos de '.$clientes->findById($id)["NOMBRE"]]
            );
        }
    }
}