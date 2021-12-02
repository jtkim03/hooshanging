<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($classname){
    include "classes/$classname.php";
});
$path = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
$path = str_replace("/hooshanging/","",$path);
$parts = explode("/",$path);

session_start(); 
if (isset($_GET["command"])) {
    $parts[0] = $_GET["command"];
}
if(!isset($_SESSION["email"])){
    //need to login 
    $parts=["signin"];   
}

$HH = new HHController();
$HH->run($parts[0]);?>