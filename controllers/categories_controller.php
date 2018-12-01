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

    public function insertForm() {

        require_once('views/categories/insertForm.php');
    }

    public function insert() {

        if (!Categoria::insert($_POST['nom'], $_POST['descripcio'], $_POST['public'])) {

            return call('pages', 'error');
        }
        header("location:?controller=categories&action=index");
    }

    public function updateForm() {
        $categoria = Categoria::find($_GET['id']);
        require_once('views/categories/updateForm.php');
    }

    public function update() {
        if (!Categoria::update($_POST['nom'], $_POST['descripcio'], $_POST['public'])) {
            return call('pages', 'error');
        }
        header("location:?controller=categories&action=show&id=" . $_POST['id']);
    }
    public function delete() {
        if (!Categoria::delete($_GET['id'])) {
            //return call('pages', 'error');
        }
        header("location:?controller=categories&action=index");
    }

}

?>