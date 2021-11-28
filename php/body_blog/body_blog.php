<?php

include_once '../db.php';

class body_blog extends DB{
    function objtenerBlogs(){
        $query = $this->connect()->query('SELECT * FROM body_blog');
        return $query;
    }
    function objtenerBlog($id_blog){
        $query = $this->connect()->query('SELECT * FROM body_blog WHERE id_body_blog='.$id_blog);
        return $query;
    }

    function crearBlog($tittle,$body){
        $query = $this->connect()->query('INSERT INTO body_blog (subtittle, subbody) values("'.$tittle.'","'.$body.'");');
        return $query;
    }

    function eliminarBlog($id_blog){
        $query = $this->connect()->query('DELETE FROM body_blog WHERE id_body_blog ='.$id_blog);
        return $query;
    }
    function editarBlog($id_blog,$tittle,$body){
        $query ='';
        if(empty($tittle) && $body){
            $query = $this->connect()->query('UPDATE body_blog SET subbody ="'.$body .'" WHERE id_body_blog='.$id_blog);
        }elseif(empty($body) && $tittle){
            $query = $this->connect()->query('UPDATE body_blog SET subtittle ="'.$tittle .'" WHERE id_body_blog='.$id_blog);
        }elseif($tittle && $body){
            $query = $this->connect()->query('UPDATE body_blog SET subtittle ="'.$tittle .'",subbody ="'.$body.'" WHERE id_body_blog='.$id_blog);
        }
        return $query;
    }
} 

?>