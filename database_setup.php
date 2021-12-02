<?php
  include("database_credentials.php"); // define variables

    /** SETUP **/
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);

    $db->query("drop table if exists event_host;");
    $db->query("create table event_host (
      email VARCHAR(20) not null,
      host_name VARCHAR(15) not null,
      primary key (email)
    );");

    $db->query("drop table if exists event_address;");
    $db->query("create table event_address (
      event_id int not null auto_increment,
      host_name varchar(20),
      event_address varchar(40) not null,
      primary key (event_id)
    );");

    $db->query("drop table if exists event_occurance;");
    $db->query("create table event_occurance (
      event_id int not null auto_increment references event_address(event_id),
      title varchar(40),
      event_datetime varchar(40) not null,
      primary key (event_id)
    );");
      
    $db->query("drop table if exists event_description;");
    $db->query("create table event_description (
      title varchar(40) not null,
      email varchar(20) not null,
      description text,
      type varchar(15),
      primary key(title));");

    $db->query("drop table if exists party;");
    $db->query("create table party (
      event_id int not null auto_increment references event_address(event_id),
      host_organization varchar(15),
      primary key (event_id)
    );");

    $db->query("drop table if exists study_group;");
    $db->query("create table study_group (
      event_id int not null auto_increment references event_address(event_id),
      course_name varchar(15),
      primary key (event_id)
    );");
    
    $db->query("drop table if exists club_event;");
    $db->query("create table club_event (
      event_id int not null auto_increment references event_address(event_id),
      club_name varchar(15),
      primary key (event_id)
    );");

    $db->query("drop table if exists appuser;");
    $db->query("create table appuser (
        email varchar(20),
        name varchar(30),
        contact varchar(15),
        primary key (email)
    );");

    $db->query("drop table if exists appUser_hostedEvents;");
    $db->query("create table appUser_hostedEvents (
        email varchar(20) references appUser(email),
        hostedEvents varchar(20),
        primary key (email, hostedEvents)
    );");
    
    $db->query("drop table if exists creates;");
    $db->query("create table creates (
        event_id int not null auto_increment references event_address(event_id),
        email varchar(20) not null,
        primary key (event_id)
    );");

    $db->query("drop table if exists registers;");
    $db->query("create table registers (
        event_id int not null auto_increment references event_address(event_id),
        email varchar(20) not null,
        primary key (event_id)
    );");

    $db->query("drop table if exists modify;");
    $db->query("create table modify (
        event_id int not null auto_increment references event_address(event_id),
        email varchar(20) not null,
        primary key (event_id)
    );");

    $db->query("drop table if exists moderator;");
    $db->query("create table moderator (
      email varchar(20) references appUser(email),
        moderator_id varchar(20) not null,
        primary key (email)
    );");


?>
