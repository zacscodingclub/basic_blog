<?php 
  include 'config/config.php';
  include 'libraries/Database.php';
  include 'helpers/format_helper.php';

  $db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template | GIS & PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All Posts</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <div class="logo"><img src="img/logo.jpg" /></div>
        <h1 class="blog-title">GIS Dev Blog</h1>
        <p class="lead blog-description">GIS News, Tutorials, and more!</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">