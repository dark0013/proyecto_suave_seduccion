<?php
include_once 'api_body_blog.php';
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
 $apii = new api(); 
  switch ($method) { 
    case 'PUT':
        parse_str(file_get_contents("php://input"),$put_vars);
        $apii->putBlog($put_vars['id_body_blog'],$put_vars['tittle'],$put_vars['body']);
        break;
    case 'POST':
        $apii->createBlog($_POST['tittle'],$_POST['body']);
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

