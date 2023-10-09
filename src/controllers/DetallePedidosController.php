<?php

declare(strict_types=1);

namespace APP\controllers;

use APP\Core\AbstractController;
use APP\models\Pedidos;

/**
 * Clase que se encarga de devolvernos una lista con los clientes y sus pedidos pasado por url
 */
class DetallePedidosController extends AbstractController
{
    /**
     * En este caso queremos todos los dato por lo con el modelo vamos a usar el método que nos devuelve todos los datos
     * @return void
     */
    public function detallePedido($id): void{
        //Llamamos al modelo para poder gestionar los datos
        $pedidos = new Pedidos();
        if(isset($_SERVER['HTTP_REFERER'])){
            $volver = $_SERVER['HTTP_REFERER'];
        }else{
            $volver = null;
        }
        //Para este controller vamos a utilizar la plantilla detallePedido.html.twig para poder mostrar adecuadamente los datos.
        $this->render("detallePedido.html.twig",
        //Le pasamos los parámetros al renderizado que son todos los datos que obtenemos del modelo.
        ["resultados" => $pedidos->findById($id),
        'volver' => $volver,
        'title' => 'Pedido '. $id]
        );
    }
}