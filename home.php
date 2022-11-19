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

// user logged in
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$user = mysqli_fetch_array($res, MYSQLI_ASSOC);
// we look for all the users that are not adm.

$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);

$tbody = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<div class='col'><div class='card' style='width: 18rem';>
  <img src='pictures/" . $row['picture'] . "' class='card-img-top img-fluid'  >
  <div class='card-body'>
    <h5 class='card-title'>" . $row['name'] . "</h5>
    <p class='card-text'>Breed: " . $row['breed'] . "</p>
     <p class='card-text'>Breed: " . $row['age'] . " years.</p>
    <a href='#' class='btn btn-primary'>More Details</a>
  </div>
</div>
        </div>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
      <?php require_once "components/boot.php"?>
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
<div class="container mt-5">
    <div class="row">
<?= $tbody?>
    </div>

</div>
</body>
</html>