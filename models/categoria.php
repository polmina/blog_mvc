<?php

class Categoria {

    // definimos tres atributos
    // los declaramos como p�blicos para acceder directamente $post->author
    public $id;
    public $nom;
    public $descripcio;
    public $data;
    

    public function __construct($id, $nom, $descripcio, $data) {
        $this->id = $id;
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->data = $data;
        
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM categories');

        // creamos una lista de objectos post y recorremos la respuesta de la
//consulta
        foreach ($req->fetchAll() as $post) {
            $list[] = new Categoria($post['id'], $post['nom'], $post['descripcio'], $post['data']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM categories WHERE id = :id');
        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Categoria($post['id'], $post['nom'], $post['descripcio'], $post['data']);
    }

    public static function insert($nom, $descripcio) {
        $db = Db::getInstance();
       

        $req = $db->prepare('INSERT INTO descripcio VALUES (null, :nom, :descripcio, :data)');
        $req->execute(array('nom' => nom,
                            'descripcio' => descripcio,
                            'data' => date('Y-m-d H:i:s'),
                        ));

        return true;
    }
    public static function update($id, $autor, $titol, $missatge){
        $db = Db::getInstance();
        
        $foto=file_get_contents($_FILES['imatge']["tmp_name"]);
        
        $req = $db->prepare('UPDATE posts SET autor=:autor, titol=:titol, missatge=:missatge, data_modificacio=:data_modificacio, imatge=:imatge WHERE id=:id;');
        $req->execute(array('autor' => $autor,
                            'titol' => $titol,
                            'missatge' => $missatge,
                            'data_modificacio' => date('Y-m-d H:i:s'),
                            'id' =>$id,
                            'imatge' => $foto,
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