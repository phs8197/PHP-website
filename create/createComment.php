<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE hyunComment (";
    $sql .= "commentID int(10) unsigned auto_increment,";
    $sql .= "blogID int(10) unsigned NOT NULL,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "commentTitle varchar(255) NOT NULL,";
    $sql .= "commentContents longtext NOT NULL,";
    $sql .= "commentRegTime int(10) NOT NULL,";
    $sql .= "PRIMARY KEY (commentID)";
    $sql .= ") charset=utf8"; 
    $connect -> query($sql);
?>
