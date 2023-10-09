<?php

declare(strict_types=1);

namespace APP\controllers;

use APP\Core\AbstractController;
use APP\models\Empleados;

/**
 * Clase que se encarga de devolvernos una lista con el detalle de los empleados pasado por url
 */
class ListaEmpleadosController extends AbstractController
{
    /**
     * En este caso queremos todos los dato por lo con el modelo vamos a usar el método que nos devuelve todos los datos
     * @return void
     */
    public function listadoEmpleados($id = null): void{
        //Llamamos al modelo para poder gestionar los datos
        $empleados = new Empleados();
        if(isset($_SERVER['HTTP_REFERER'])){
            $volver = $_SERVER['HTTP_REFERER'];
        }else{
            $volver = null;
        }
        //De esta forma sabremos si está seleccionado un departamento o no para poder enviar la información correspondiente
        if(is_null($id)){
            //Para este controller vamos a utilizar la plantilla listaEmpleados.html.twig para poder mostrar adecuadamente los datos.
            $this->render("listaEmpleados.html.twig",
            //Le pasamos los parámetros al renderizado que son todos los datos que obtenemos del modelo.
            ["resultados" => $empleados->findAll(),
            'volver' => $volver,
            'title' => 'Empleados']
            );
        }else{
            //Para este controller vamos a utilizar la plantilla listaEmpleados.html.twig para poder mostrar adecuadamente los datos.
            $this->render("listaEmpleados.html.twig",
            //Le pasamos los parámetros al renderizado que son todos los datos que obtenemos del modelo.
            ["resultados" => $empleados->findByDept($id),
            'volver' => $volver,
            'title' => 'Empleados del departamento' . $id]
            );
        }
    }
}