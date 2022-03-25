<?php

include_once 'principal_blog.php';
class api {
    function putPrincipalBlogImage($id_image_bloc,$id_principal_blog){
        $blog_principal = new princiapl_blog();
        $resultado = $blog_principal->editarPrincipalBlogImage($id_image_bloc,$id_principal_blog);
        if( $resultado->rowCount() > 0){
            echo "Se actualizco tus datos";
        }else{
            echo "No se pudo modificar tu registro";
        }
    }
    function getAll(){
        $blog_principal = new princiapl_blog();
        $blog_principales = array();
        $blog_principales["items"] = array(); 
        $res = $blog_principal ->obtenerPrincipalBlogs();
         if($res -> rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_principal_blog' => $row['id_principal_blog'],
                    'title' => $row['title'],
                    'body' => $row['body'],
                    'create' => $row['created_blog'],
                    'id_image'=> $row['id_image'],
                );
                array_push($blog_principales['items'],$item);
            }
            echo json_encode($blog_principales);
         }else{
             echo json_encode(array('mensnaje' => 'No hay elemntos registrados'));
         }
    }
    function getId($id_blog){
        $blog_principal = new princiapl_blog();
        $blog_principales = array();
        $blog_principales["principal"] = array(); 
        $res = $blog_principal ->obtenerPrincipalBlog($id_blog);
        if($res ->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_principal_blog' => $row['id_principal_blog'],
                    'title' => $row['title'],
                    'body' => $row['body'],
                    'create' => $row['created_blog'],
                    'id_image' => $row['id_image']
                );
                array_push($blog_principales['principal'],$item);
            }            
            $blog_principales["subcontenido"] = array(); 

                $res = $blog_principal ->obtenerPrincipalBodyBlog($id_blog);
                if($res ->rowCount()){
                    while($row = $res->fetch(PDO::FETCH_ASSOC)){
                            $item = array(
                                'id_body' => $row['id_body_blog'],
                                'subtitle' => $row['subtittle'],
                                'subbody' => $row['subbody'],
                        );
                        array_push($blog_principales['subcontenido'],$item);       
                    }
                }
            echo json_encode($blog_principales);
         }else{
             echo json_encode(array('mensnaje' => 'No hay elemntos registrados'));
         }


    }
    function createPrincipalBlog($tittle,$body){
        $blog_principal = new princiapl_blog();
        $resultado = $blog_principal->crearPrincipalBlog($tittle,$body);
        if( $resultado->rowCount() > 0){
            echo "Agregada con exito";
        }else{
            echo "No se pudo agregar tu registro";
        }
    }

    function putPrincipalBlog($id_principal_blog,$tittle,$body){
        $blog_principal = new princiapl_blog();
        $resultado = $blog_principal->editarPrincipalBlog($id_principal_blog,$tittle,$body);
        if( $resultado->rowCount() > 0){
            echo "Se actualizaron tus datos";
        }else{
            echo "No se pudo modificar tu registro";
        }
    }
    function deletePrincipalBlog($id_blog){
        $blog_principal = new princiapl_blog();
        $resultado = $blog_principal->eliminarPrincipalBlog($id_blog);
        if( $resultado->rowCount() > 0){
            echo "Eliminada con exito";
        }else{
            echo "No se pudo eliminar";
        }
    }
}
?>