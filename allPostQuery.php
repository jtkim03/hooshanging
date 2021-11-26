<?php
include("database_credentials.php"); // define variables

/** SETUP **/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);

$stmt=$mysqli->prepare("select * from post");
if(!$stmt->execute()){
    echo "Error";
}
$res=$stmt->get_result();
$posts=$res->fetch_all(MYSQLI_ASSOC);
echo json_encode($posts);
?>