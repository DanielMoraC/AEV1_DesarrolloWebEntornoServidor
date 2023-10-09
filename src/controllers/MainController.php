<?php

declare(strict_types=1);

namespace APP\controllers;

use APP\Core\AbstractController;

class MainController extends AbstractController
{
    /**
     * Esta ruta es la que sale por defecto en la aplicación cuando se inicia.
     * @return void
     */
    public function main(): void{
        //Ahora usamos el método extendido del AbstractController render para lanzar la plantilla de twig
        // con los parámetros necesarios.
        if(isset($_SERVER['HTTP_REFERER'])){
            $volver = $_SERVER['HTTP_REFERER'];
        }else{
            $volver = null;
        }
        $this->render("index.html.twig",
            ['title'=>'Home de AEV1',
            'volver' => $volver]
        );
    }

}