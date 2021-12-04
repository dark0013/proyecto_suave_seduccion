<?php

include_once '../db.php';

class princiapl_blog extends DB{
function obtenerPrincipalBlogs(){
    $query = $this->connect()->query('SELECT * FROM principal_blog');
    return $query;
}
function obtenerPrincipalBlog($id_principal_blog){
    $query = $this->connect()->query('SELECT * FROM principal_blog WHERE id_principal_blog='.$id_principal_blog);
    return $query;
}
function obtenerPrincipalBodyBlog($id_principal_blog){
    $query = $this->connect()->query('SELECT * FROM body_blog WHERE id_principal_blog='.$id_principal_blog);
    return $query;
}
function crearPrincipalBlog($tittle,$body){
    $query = $this->connect()->query('INSERT INTO principal_blog (title, body) values("'.$tittle.'","'.$body.'");');
    return $query;
}
function eliminarPrincipalBlog($id_principal_blog){
    $query = $this->connect()->query('DELETE FROM principal_blog WHERE id_principal_blog ='.$id_principal_blog);
    return $query;
}
function editarPrincipalBlog($id_principal_blog,$tittle,$body){
    $query ='';
    if(empty($tittle) && $body){
        $query = $this->connect()->query('UPDATE principal_blog SET body ="'.$body .'" WHERE id_principal_blog='.$id_principal_blog);
    }elseif(empty($body) && $tittle){
        $query = $this->connect()->query('UPDATE principal_blog SET title ="'.$tittle .'" WHERE id_principal_blog='.$id_principal_blog);
    }elseif($tittle && $body){
        $query = $this->connect()->query('UPDATE principal_blog SET title ="'.$tittle .'",body ="'.$body.'" WHERE id_principal_blog='.$id_principal_blog);
    }
    return $query;
} 
function editarPrincipalBlogImage($id_image_bloc,$id_principal_blog){
    $query = $this->connect()->query('UPDATE principal_blog SET id_image ="'.$id_image_bloc .'" WHERE id_principal_blog='.$id_principal_blog);
    return $query;
}
}
?>