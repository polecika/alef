<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Задание от Alef Development</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Задание 1</h1>
    <div class="row">
      <?php include_once("prime_num_sum.php"); ?>
    </div>
    <h1>Задание 2</h1>
    <div class="row">
      <?php include_once("guess_num_game.php"); ?>
    </div>
    <h1>Задание 3</h1>
    <div class="row">
      <?php include_once("mega_sum.php"); ?>
    </div>
  </div>
</body>
</html>
