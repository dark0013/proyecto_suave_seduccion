<?php
include_once 'image_blog.php';
class api {
    function getAll(){
        $image = new image_blog();
        $images = array();
        $images["items"] = array(); 
        $res = $image ->obtenerImages();
         if($res -> rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_image' => $row['id_image'],
                    'url' => $row['url'],
                    'width' => $row['width'],
                    'height' => $row['height']
                );
                array_push($images['items'],$item);
            }
            echo json_encode($images);
         }else{
             echo json_encode(array('mensnaje' => 'No hay elemntos registrados'));
         }
    }
    function getId($id_image_blog){
        $image = new image_blog();
        $images = array();
        $images["items"] = array(); 
        $res = $image ->obtenerImage($id_image_blog);
         if($res -> rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_image' => $row['id_image'],
                    'url' => $row['url'],
                    'width' => $row['width'],
                    'height' => $row['height']
                );
                array_push($images['items'],$item);
            }
            echo json_encode($images);
         }else{
             echo json_encode(array('mensnaje' => 'No hay elemntos registrados'));
         }
    }

    function putBlog($id_image_blog,$url,$width,$height){
        $image = new image_blog();
        $resultado = $image->editarImage($id_image_blog,$url,$width,$height);
        if( $resultado->rowCount() > 0){
            echo "Se actualizaron tus datos";
        }else{
            echo "No se pudo modificar tu registro";
        }
    }
    function createBlog($url,$width,$height){
        $image = new image_blog();
        $resultado = $image->crearImage($url,$width,$height);
        if( $resultado->rowCount() > 0){
            echo "Agregada con exito";
        }else{
            echo "No se pudo modificar tu registro";
        }
    }
    function deleteBlog($id_image_blog){
        $image = new image_blog();
        $resultado = $image->eliminarBlog($id_image_blog);
        if( $resultado->rowCount() > 0){
            echo "Eliminada con exito";
        }else{
            echo "No se pudo eliminar";
        }
    }

}

?>