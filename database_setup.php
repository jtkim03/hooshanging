<?php
  include("database_credentials.php"); // define variables

    /** SETUP **/
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);
    
    $db->query("drop table if exists students;");
    $db->query("create table students (
      email varchar(25) not null,
      name text not null,
      loc text not null,
      car_desc text not null,
      password text not null,
      contact text not null,
      primary key (email));");
    
    $db->query("drop table if exists post;");
    $db->query("create table post (
        id int not null auto_increment,
        email varchar(25),
        poster varchar(25) not null,
        destination text not null,
        datetime text not null,
        description text not null,
        type text not null,
        primary key (id));");

?>