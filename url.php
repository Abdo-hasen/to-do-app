<?php



 // require_once "core/dbFunction.php";


// session_start();
 
// if to intialize basic url = parent folder of project - عشان يخليك واقف برا - like baseurl

// if (strpos($_SERVER['REQUEST_URI'], '.php') !== false) {
//     $url = str_replace(basename($_SERVER['REQUEST_URI']), '', $_SERVER['REQUEST_URI']);
// } else {
//     $url = $_SERVER['REQUEST_URI'];
// }
// define('URL', 'http://'.$_SERVER['HTTP_HOST'].$url); //  "http://127.0.0.1/mysql/todo-app/"


// define('ROOT', $_SERVER['DOCUMENT_ROOT'].$url); //  "C:/xampp/htdocs//mysql/todo-app/"

// define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/'.$url); //  "C:/xampp/htdocs//mysql/todo-app/"

// require_once ROOT . "core/dbFunction.php";

// $_SESSION["root"] = ROOT;
// var_dump($_SESSION);
// var_dump(URL);
// echo "<br>";
// var_dump(ROOT);

// if : 

// var_dump($_SERVER['REQUEST_URI']); //  "/mysql/todo-app/init.php" - url after hostname - servername

// var_dump(basename($_SERVER['REQUEST_URI'])); // "init.php" -  file name

// str_replace()// search - replace - subject

// if statement end result : remove filename if found from $_SERVER['REQUEST_URI'] ex : /mysql/todo-app/

//URL : 

// var_dump($_SERVER['HTTP_HOST']); // "127.0.0.1" - hostname

// URL : http://127.0.0.1/mysql/todo-app/ // folder of project in url "or index"
// http://127.0.0.1/mysql/todo-app/


//ROOT :

//  var_dump($_SERVER['DOCUMENT_ROOT']); // "C:/xampp/htdocs" -  htdocs
// ROOT : C:/xampp/htdocs//mysql/todo-app/


##############################################################


// var_dump($_SESSION["url"]);
// $root = $_SESSION["root"];
// echo ROOT;
// require_once $root . "core/dbFunction.php";
// var_dump($root);

// define('ROOT', "C:/xampp/htdocs//mysql/todo-app/"); 

// if (strpos($_SERVER['REQUEST_URI'], '.php') !== false) {
//     $url = str_replace(basename($_SERVER['REQUEST_URI']), '', $_SERVER['REQUEST_URI']);
// } else {
//     $url = $_SERVER['REQUEST_URI'];
// }
// define('URL', 'http://'.$_SERVER['HTTP_HOST'].$url); //  "http://127.0.0.1/mysql/todo-app/"
// define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/'.$url); //  "C:/xampp/htdocs//mysql/todo-app/"

// var_dump(ROOT); // string(41) "C:/xampp/htdocs//mysql/todo-app/database/"
// echo "<br>";
// var_dump(URL); //string(41) "http://127.0.0.1/mysql/todo-app/database/"

// require_once ROOT . "../core/database.php";
// var_dump(URL);
// die;
// var_dump(ROOT); // "C:/xampp/htdocs//mysql/todo-app/database/"
// DIE;
// var_dump(require_once ROOT . "core/database.php"); // C:/xampp/htdocs//mysql/todo-app/database/core/database.php
// //C:/xampp/htdocs/mysql/todo-app/database/core/database.php
// die;
// // require_once "../init.php";
// // require_once ROOT . "core/database.php";