<?php

class CategoriaController {

    public function index() {
        // Guardamos todos los posts en una variable
        $categories = Categoria::all();
        require_once('views/categories/index.php');
    }

    public function show() {
        // esperamos una url del tipo ?controller=posts&action=show&id=x
        // si no nos pasan el id redirecionamos hacia la pagina de error, el id
        //tenemos que buscarlo en la BBDD
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        // utilizamos el id para obtener el post correspondiente
        $categoria = Categoria::find($_GET['id']);
        require_once('views/categories/show.php');
    }

    }


?>