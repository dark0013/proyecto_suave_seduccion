<?php

include_once '../db.php';

class image_blog extends DB{
    function obtenerImages(){
        $query = $this->connect()->query('SELECT * FROM image_blog');
        return $query;
    }
    
    function obtenerImage($id_image_blog){
        $query = $this->connect()->query('SELECT * FROM image_blog WHERE id_image='.$id_image_blog);
        return $query;
    }

    function crearImage($url,$width,$height){
        $query = $this->connect()->query('INSERT INTO image_blog (url, width,height) values("'.$url.'","'.$width.'","'.$height.'");');
        return $query;
    }

    function eliminarImage($id_image_blog){
        $query = $this->connect()->query('DELETE FROM image_blog WHERE id_image ='.$id_image_blog);
        return $query;
    }

    function editarImage($id_image_blog,$url,$width,$height){
        $query = $this->connect()->query('UPDATE image_blog SET url ="'.$url .'",width ="'.$width.'",height ="'.$height.'" WHERE id_image='.$id_image_blog);
        return $query;
    }
    function ultimoPost(){
        $query = $this->connect()->query('SELECT * FROM image_blog ORDER BY id_image DESC LIMIT 1');
        return $query;
    }
} 

?>