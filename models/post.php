<?php

class Post {

    // definimos tres atributos
    // los declaramos como p�blicos para acceder directamente $post->author
    public $id;
    public $categoria;
    public $autor;
    public $titol;
    public $missatge;
    public $data_creacio;
    public $data_modificacio;
    public $imatge;

    public function __construct($id,$categoria,  $autor, $titol, $missatge, $data_creacio, $data_modificacio, $imatge) {
        $this->id = $id;
        $this->categoria = $categoria;
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
            $list[] = new Post($post['id'], $post['categoria'], $post['autor'], $post['titol'], $post['missatge'], $post['data_creacio'], $post['data_modificacio'], $post['imatge']);
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
        return new Post($post['id'], $post['categoria'], $post['autor'], $post['titol'], $post['missatge'], $post['data_creacio'], $post['data_modificacio'], $post['imatge']);
    }

    public static function insert($autor, $categoria, $titol, $missatge) {
        $db = Db::getInstance();
       
        try{
            $foto=file_get_contents($_FILES['imatge']["tmp_name"]);
        }catch(Exception $e){}
        
        $req = $db->prepare('INSERT INTO posts VALUES (null, :autor, :titol, :missatge, :data_creacio, :data_modificacio, :imatge, :categoria)');
        $req->execute(array('autor' => $autor,
                            'categoria' => Categoria::getIdByName($categoria),
                            'titol' => $titol,
                            'missatge' => $missatge,
                            'data_creacio' => date('Y-m-d H:i:s'),
                            'data_modificacio' => date('Y-m-d H:i:s'),
                            'imatge' => $foto,
                        ));

        return true;
    }
    public static function update($id, $categoria, $autor, $titol, $missatge){
        $db = Db::getInstance();
        
        $foto=file_get_contents($_FILES['imatge']["tmp_name"]);
        
        $req = $db->prepare('UPDATE posts SET autor=:autor, categoria=categoria, titol=:titol, missatge=:missatge, data_modificacio=:data_modificacio, imatge=:imatge WHERE id=:id;');
        $req->execute(array('autor' => $autor,
                            'categoria' =>$categoria,
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