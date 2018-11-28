<?php

class Post {

    // definimos tres atributos
    // los declaramos como p�blicos para acceder directamente $post->author
    public $id;
    public $autor;
    public $titol;
    public $missatge;
    public $data_creacio;
    public $data_modificacio;
    public $imatge;

    public function __construct($id, $autor, $titol, $missatge, $data_creacio, $data_modificacio, $imatge) {
        $this->id = $id;
        $this->autor = $autor;
        $this->titol = $titol;
        $this->missatge = $missatge;
        $this->data_creacio = $data_creacio;
        $this->data_modificacio = $data_modificacio;
        $this->imatge = $imatge;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');

        // creamos una lista de objectos post y recorremos la respuesta de la
//consulta
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['autor'], $post['titol'], $post['missatge'], $post['data_creacio'], $post['data_modificacio'], $post['imatge']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Post($post['id'], $post['autor'], $post['titol'], $post['missatge'], $post['data_creacio'], $post['data_modificacio'], $post['imatge']);
    }

    public static function insert($autor, $titol, $missatge) {
        $db = Db::getInstance();

        $req = $db->prepare('INSERT INTO posts VALUES (null, :autor, :titol, :missatge, :data_creacio, :data_modificacio, :imatge)');
        $req->execute(array('autor' => $autor,
                            'titol' => $titol,
                            'missatge' => $missatge,
                            'data_creacio' => date('Y-m-d H:i:s'),
                            'data_modificacio' => date('Y-m-d H:i:s'),
                            'imatge' => 'imatge',
                        ));

        //$post = $req->fetch();
        return true;
    }
    public static function update($id, $autor, $titol, $missatge){
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE posts SET autor=:autor, titol=:titol, missatge=:missatge, data_modificacio=:data_modificacio WHERE id=:id;');
        $req->execute(array('autor' => $autor,
                            'titol' => $titol,
                            'missatge' => $missatge,
                            'data_modificacio' => date('Y-m-d H:i:s'),
                            'id' =>$id,
                        ));
        return true;
    }
    public static function delete($id){
         $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');
        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        return true;
    }

}

?>