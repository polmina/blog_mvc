<?php

function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');
    switch ($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'posts':
            // necesitamos el modelo para despu�s consultar a la BBDD
// desde el controlador
            require_once('models/post.php');
            require_once('models/categoria.php');
            $controller = new PostsController();
            break;
        case 'categories':
            require_once('models/categoria.php');
            $controller = new CategoriaController();
            break;
    }
    // llama al m�todo guardado en $action
    $controller->{ $action }();
}

// lista de controladores que tenemos y sus acciones
// consideramos estos valores "permitidos"
// agregando una entrada para el nuevo controlador y sus acciones.
$controllers = array('pages' => ['home', 'error'],
                     'posts' => ['index','error',  'show', 'insertForm', 'insert', 'updateForm', 'update', 'delete'],
                     'categories' => ['index', 'error', 'show', 'insertForm','insert', 'updateForm', 'update', 'delete']);
// verifica que tanto el controlador como la acci�n solicitados est�n permitidos
// Si alguien intenta acceder a otro controlador y/o acci�n, ser� redirigido al
//m�todo de error del controlador de pages.
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
            call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
?>