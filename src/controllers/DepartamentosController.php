<?php

declare(strict_types=1);

namespace APP\controllers;

use APP\Core\AbstractController;
use APP\models\Departamentos;

/**
 * Clase que se encarga de devolvernos una lista con todas los productos
 */
class DepartamentosController extends AbstractController
{
    /**
     * En este caso queremos todos los dato por lo con el modelo vamos a usar el método que nos devuelve todos los datos
     * @return void
     */
    public function listadoDepartamentos(): void{
        //Llamamos al modelo para poder gestionar los datos
        $departamentos = new Departamentos();
        if(isset($_SERVER['HTTP_REFERER'])){
            $volver = $_SERVER['HTTP_REFERER'];
        }else{
            $volver = null;
        }
        //Para este controller vamos a utilizar la plantilla listaDepartamentos.html.twig para poder mostrar adecuadamente los datos.
        $this->render("listaDepartamentos.html.twig",
        //Le pasamos los parámetros al renderizado que son todos los datos que obtenemos del modelo.
        ["resultados" => $departamentos->findAll(),
        'volver' => $volver,
        'title' => 'Lista de departamentos']
        );
    }
}