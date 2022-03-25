<?php
include_once 'api_body_blog.php';

$method = $_SERVER['REQUEST_METHOD'];
 $apii = new api(); 
  switch ($method) { 
    case 'PUT':
        parse_str(file_get_contents("php://input"),$put_vars);
        $apii->putBlog($put_vars['id_body_blog'],$put_vars['tittle'],$put_vars['body']);
        break;
    case 'POST':
        echo "entra";
        $apii->createBlog($_POST['id_principal_blog'],$_POST['tittle'],$_POST['body']);
        break; 
    case 'GET':
        if(isset($_GET["id_body_blog"])){
            $apii->getId($_GET["id_body_blog"]);
        }else{
            $apii->getAll();
        }
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"),$delete_vars);
        $apii->deleteBlog($delete_vars['id_body_blog']);
        break; 
    default: rest_error($request); break;
 }
  ?>

