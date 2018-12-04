<?php

require '../database/connection.php';
    $table = $_GET['table'];
    $projectID  = $_GET['id'];
    $sql = "SELECT * FROM `$table` WHERE id = $projectID";
    $result = mysqli_query($dbc, $sql);
    if($result && mysqli_affected_rows($dbc) > 0){
      $project = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else{
        $project = null;
    }
    header("Content-type: application/json");
    echo json_encode($project);
