<?php
  include("database_credentials.php"); // define variables

    /** SETUP **/
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);

    $db->query("drop table if exists event_host;");
    $db->query("create table event_host (
      computing_id VARCHAR(10) not null,
      host_name VARCHAR(15) not null,
      primary key (computing_id)
    );");

    $db->query("drop table if exists event_address;");
    $db->query("create table event_address (
      event_id int not null,
      host_name varchar(20),
      event_address varchar(40) not null,
      creation_date datetime default current_timestamp,
      primary key (event_id)
    );");

    $db->query("drop table if exists event_occurance;");
    $db->query("create table event_occurance (
      event_id int references event_address(event_id),
      host_name varchar(20),
      event_address varchar(40) not null,
      creation_date datetime default current_timestamp,
      primary key (event_id)
    );");
      
    $db->query("drop table if exists event_description;");
    $db->query("create table event_description (
      title varchar(40) not null,
      description text,
      primary key(title));");

    $db->query("drop table if exists party;");
    $db->query("create table party (
      event_id int references event_address(event_id),
      host_organization varchar(15),
      primary key (event_id)
    );");

    $db->query("drop table if exists study_group;");
    $db->query("create table study_group (
      event_id int references event_address(event_id),
      course_name varchar(15),
      primary key (event_id)
    );");
    
    $db->query("drop table if exists club_event;");
    $db->query("create table club_event (
      event_id int references event_address(event_id),
      club_name varchar(15),
      primary key (event_id)
    );");

    $db->query("drop table if exists appUser;");
    $db->query("create table appUser (
        computing_id varchar(10),
        first_name varchar(15),
        last_name varchar(15),
        password varchar(15),
        primary key (computing_id)
    );");

    $db->query("drop table if exists appUser_hostedEvents;");
    $db->query("create table appUser_hostedEvents (
        computing_id varchar(10) references appUser(computing_id),
        hostedEvents varchar(20),
        primary key (computing_id, hostedEvents)
    );");
    
    $db->query("drop table if exists creates;");
    $db->query("create table creates (
        event_id int references event_address(event_id),
        computing_id varchar(10) not null,
        creation_date datetime default current_timestamp,
        primary key (event_id)
    );");

    $db->query("drop table if exists registers;");
    $db->query("create table registers (
        event_id int references event_address(event_id),
        computing_id varchar(10) not null,
        registration_date datetime default current_timestamp,
        primary key (event_id)
    );");

    $db->query("drop table if exists modify;");
    $db->query("create table modify (
        event_id int references event_address(event_id),
        computing_id varchar(10) not null,
        modification_date datetime default current_timestamp,
        primary key (event_id)
    );");

    $db->query("drop table if exists moderator;");
    $db->query("create table moderator (
        computing_id varchar(10) references appUser(computing_id),
        moderator_id varchar(10) not null,
        primary key (computing_id)
    );");


    $db->query("drop table if exists event;");
    $db->query("create table event (
        id int not null auto_increment,
        email varchar(25),
        poster varchar(25) not null,
        destination text not null,
        datetime text not null,
        description text not null,
        type text not null,
        primary key (id));");

?>