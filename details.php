<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if($_GET["id"]){
    $id = $_GET["id"];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)==1) {
        $data = mysqli_fetch_assoc($result);
        // $data[this is the name of your column in your database]
        $name = $data['name'];
        $breed = $data['breed'];
        $age = $data['age'];
        $description=$data["description"];
       
    } else {
        header("location: actions/error.php");
    }
}

$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$user = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
      <?php require_once "components/boot.php"?>
      <style>
        .tarj{
            display: block;
            margin:0 auto;
        }
      </style>
</head>
<body>
     <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">🐶</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php?logout">Logout</a>
        </li>
       
        
      </ul>
    </div>
   
</nav>
<div class="bg-warning text-center">
<img class="rounded-circle"src="pictures/<?=$user["picture"]?>" width="25px"alt=""> Welcome <?=$user["first_name"]?>! 
 
</div>
<h1 class="text-center text-primary mt-4">Find out more about <?= $breed?></h1>
    <div class="container mt-5">
<div class="card tarj" style="width: 20rem;">
  <img src="pictures/dog.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text text-primary"><?=$name?></p>
    <p class="card-text"><?=$description?></p>

  </div>

</div>


</body>
</html>