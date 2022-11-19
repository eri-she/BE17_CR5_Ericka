<?php 
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../components/db_connect.php';
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

$status = 'adm';
$res = mysqli_query($connect, "SELECT * FROM users WHERE status ='$status'");
$user = mysqli_fetch_array($res, MYSQLI_ASSOC);
} 
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
<img class="rounded-circle"src="../pictures/<?=$user["picture"]?>" width="25px"alt=""> Welcome <?=$user["first_name"]?>! 
 
</div>
    <fieldset>
        <legend class='h2'>Update Record</legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" value="<?=$name?>" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" value="<?= $breed?>"  step="any" /></td>
                </tr>
                 <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="text" name="age" value="<?=$age?>"  step="any" /></td>
                </tr>
                 <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" value="<?=$description?>"   step="any" ></input></td>
                </tr>

               
               
                <input type="hidden" name="id" value="<?= $id ?>" />
                
    
                <tr>
                    <td><button class='btn btn-success' type="submit">update</button></td>
                    <td><a href="dogs.php"><button class='btn btn-warning' type="button">Dogs</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
