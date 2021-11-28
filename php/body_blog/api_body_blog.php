<?php

include_once 'body_blog.php';
class api {
    function getAll(){
        $blog = new body_blog();
        $blogs = array();
        $blogs["items"] = array(); 
        $res = $blog ->objtenerBlogs();
         if($res -> rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_body' => $row['id_body_blog'],
                    'subtitle' => $row['subtittle'],
                    'subbody' => $row['subbody']
                );
                array_push($blogs['items'],$item);
            }
            echo json_encode($blogs);
         }else{
             echo json_encode(array('mensnaje' => 'No hay elemntos registrados'));
         }
    }
    function getId($id_blog){
        $blog = new body_blog();
        $blogs = array();
        $blogs["items"] = array(); 
        $res = $blog ->objtenerBlog($id_blog);
        if($res ->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_body' => $row['id_body_blog'],
                    'subtitle' => $row['subtittle'],
                    'subbody' => $row['subbody']
                );
                array_push($blogs['items'],$item);
            }
            echo json_encode($blogs);

        }else{
            echo json_encode(array('mensnaje' => 'No hay elemntos registrados'));

        }
    }

    function putBlog($id_blog,$tittle,$body){
        $blog = new body_blog();
        $resultado = $blog->editarBlog($id_blog,$tittle,$body);
        if( $resultado->rowCount() > 0){
            echo "Se actualizaron tus datos";
        }else{
            echo "No se pudo modificar tu registro";
        }
    }
    function createBlog($tittle,$body){
        $blog = new body_blog();
        $resultado = $blog->crearBlog($tittle,$body);
        if( $resultado->rowCount() > 0){
            echo "Agregada con exito";
        }else{
            echo "No se pudo modificar tu registro";
        }
    }
    function deleteBlog($id_blog){
        $blog = new body_blog();
        $resultado = $blog->eliminarBlog($id_blog);
        if( $resultado->rowCount() > 0){
            echo "Eliminada con exito";
        }else{
            echo "No se pudo eliminar";
        }
    }

}

?>