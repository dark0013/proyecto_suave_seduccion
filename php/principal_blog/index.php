<?php

include_once 'api_principal_blog.php';

 $method = $_SERVER['REQUEST_METHOD'];
 $apii = new api(); 
  switch ($method) { 
    case 'PUT':
        parse_str(file_get_contents("php://input"),$put_vars);
        if(isset($put_vars['id_image_blog'])){
            $apii->putPrincipalBlogImage($put_vars['id_image_blog'],$put_vars['id_principal_blog']);
        }else{
            $apii->putPrincipalBlog($put_vars['id_principal_blog'],$put_vars['tittle'],$put_vars['body']);
        }
        break;
    case 'POST':
        $apii->createPrincipalBlog($_POST['tittle'],$_POST['body']);
        break; 
    case 'GET':
        if(isset($_GET["id_principal_blog"])){
            $apii->getId($_GET["id_principal_blog"]);
        }else{
            $apii->getAll();
        }
        break;
    case 'DELETE': 
        parse_str(file_get_contents("php://input"),$delete_vars);
        $apii->deletePrincipalBlog($delete_vars['id_principal_blog']);
        break; 
    default: rest_error($request); break;
 } 
 ?>

 