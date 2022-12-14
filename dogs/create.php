<?php
session_start();
require_once '../components/db_connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['adm']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Add Dog</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
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
          <a class="nav-link active" aria-current="page" href="../dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php?logout">Logout</a>
        </li>
       
        
      </ul>
    </div>
    </nav>
    <div class="bg-info text-center">
<img class="rounded-circle"src="../pictures/<?=$row["picture"]?>" width="25px"alt=""> Welcome <?=$row["first_name"]?>! 
 
</div>
    <fieldset>
        <legend class='h2'>Add a New furry Friend</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Dog´s Name" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" placeholder="Breed" step="any" /></td>
                </tr>
                 <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="text" name="age" placeholder="Age" step="any" /></td>
                </tr>
                 <tr>
                    <th>Description</th>
                    <td><textarea class='form-control' type="text" name="description" placeholder="Description" step="any" ></textarea></td>
                </tr>

                <!-- <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr> -->
               
                <tr>
                    <td><button class='btn btn-success' type="submit">Add</button></td>
                    <td><a href="dogs.php"><button class='btn btn-warning' type="button">Dogs</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
