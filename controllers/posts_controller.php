<?php

class PostsController {

    public function index() {
        // Guardamos todos los posts en una variable
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    public function show() {
        // esperamos una url del tipo ?controller=posts&action=show&id=x
        // si no nos pasan el id redirecionamos hacia la pagina de error, el id
        //tenemos que buscarlo en la BBDD
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        // utilizamos el id para obtener el post correspondiente
        $post = Post::find($_GET['id']);
        require_once('views/posts/show.php');
    }

    public function insertForm() {

        require_once('views/posts/insertForm.php');
    }

    public function insert() {
        
        
        if (!Post::insert($_POST['autor'], $_POST['titol'], $_POST['missatge'])) {

            return call('pages', 'error');
        }
        header("location:?controller=posts&action=index");
    }

    public function updateForm() {
        $post = Post::find($_GET['id']);
        require_once('views/posts/updateForm.php');
    }

    public function update() {
        if (!Post::update($_POST['id'], $_POST['autor'], $_POST['titol'], $_POST['missatge'])) {
            return call('pages', 'error');
        }
        header("location:?controller=posts&action=show&id=" . $_POST['id']);
    }

    public function delete() {
        if (!Post::delete($_GET['id'])) {
            //return call('pages', 'error');
        }
        header("location:?controller=posts&action=index");
    }

}

?>