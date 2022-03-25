<?php
include_once 'api_image_blog.php';

 $method = $_SERVER['REQUEST_METHOD'];
 $apii = new api(); 
  switch ($method) { 
    case 'PUT':
        parse_str(file_get_contents("php://input"),$put_vars);
        $apii->putImage($put_vars['id_image_blog'],$put_vars['url'],$put_vars['width'],$put_vars['height']);
        break;
    case 'POST':
        $apii->createImage($_POST['url'],$_POST['width'],$_POST['height']);
        break; 
    case 'GET':
        if(isset($_GET["id_image_blog"])){
            $apii->getId($_GET["id_image_blog"]);
        }else{
            $apii->getAll();
        }
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"),$delete_vars);
        $apii->deleteImage($delete_vars['id_image_blog']);
        break; 
    default: rest_error($request); break;
 }
  ?>

