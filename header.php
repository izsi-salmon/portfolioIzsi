<?php

  // if(is_dir('vendor')){
  //   require 'vendor/autoload.php';
  // } else{
  //   require '../vendor/autoload.php';
  // }

  // Getting the project URL from the environment file – dynamic alternative to hard coding the URL
  // $dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
  // $dotenv->load();
  // $baseURL = getenv('PROJECT_URL');

  require('database/connection.php');

  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>izsi salmon</title>
  </head>
