<?php
require_once 'components/db_connect.php';

session_start();


if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM users WHERE status != '$status'";
$result = mysqli_query($connect, $sql);
$res = mysqli_query($connect, "SELECT * FROM users WHERE status ='$status'");
$user = mysqli_fetch_array($res, MYSQLI_ASSOC);



$tbody = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail rounded-circle img-fluid' width= 70px src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
            <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
           
            <td>" . $row['email'] . "</td>
            <td>
            <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
         </tr>";
       
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daschboard</title>
      <?php require_once 'components/boot.php' ?>
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
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dogs/dogs.php">Dogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php?logout">Logout</a>
        </li>
        
      </ul>
    </div>
    </nav>
      <div class="bg-info text-center">
<img class="rounded-circle"src="pictures/<?=$user["picture"]?>" width="25px"alt=""> Welcome <?=$user["first_name"]?>! 
 
</div>
    <div class="container mt-4">
    <h1>Users</h1>

                <table class='table table-striped'>
                    <thead class='table-info'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
</div>
<a href="dogs/dogs.php" class="m-4">Dog´s Dashboard >></a>
</body>
</html>