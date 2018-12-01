<?php

class Categoria {

    // definimos tres atributos
    // los declaramos como p�blicos para acceder directamente $post->author
    public $id;
    public $nom;
    public $descripcio;
    public $data;
    public $public;
    

    public function __construct($id, $nom, $descripcio, $data, $public) {
        $this->id = $id;
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->data = $data;
        $this->public = $public;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM categories');

        // creamos una lista de objectos post y recorremos la respuesta de la
//consulta
        foreach ($req->fetchAll() as $post) {
            $list[] = new Categoria($post['id'], $post['nom'], $post['descripcio'], $post['data'], $post['public']);
        }
        return $list;
    }
    public static function getNameById($id){
        $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT nom FROM categories WHERE id = :id');
        $req->execute(array('id' => $id));
        $categoria = $req->fetch();
        return $categoria[0];
    }
    public static function getIdByName($nom){
        $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $req = $db->prepare('SELECT id FROM categories WHERE nom = :nom');
        $req->execute(array('nom' => $nom));
        $categoria = $req->fetch();
        return $categoria[0];
    }
    public static function find($id) {
        $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM categories WHERE id = :id');
        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Categoria($post['id'], $post['nom'], $post['descripcio'], $post['data'], $post['public']);
    }

    public static function insert($nom, $descripcio, $public) {
        $db = Db::getInstance();
       

        $req = $db->prepare('INSERT INTO categories VALUES (null, :nom, :descripcio, :data, :public)');
        $req->execute(array('nom' => $nom,
                            'descripcio' => $descripcio,
                            'data' => date('Y-m-d H:i:s'),
                            'public' => $public,
                        ));

        return true;
    }
    public static function update($nom, $descripcio, $public){
        $db = Db::getInstance();
        
        
        $req = $db->prepare('UPDATE categories SET nom=:nom, descripcio=:descripcio, public=:public, data=:data;');
        $req->execute(array('nom' => $nom,
                            'descripcio' => $descripcio,
                            'public' => $public,
                            'data' => date('Y-m-d H:i:s'),
                            
                        ));
        return true;
    }
    public static function delete($id){
         $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('DELETE FROM categories WHERE id = :id');
        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        return true;
    }
   

}

?>