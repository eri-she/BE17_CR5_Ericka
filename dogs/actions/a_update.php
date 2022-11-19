<?php
require_once '../../components/db_connect.php';


if($_POST){
    $id=$_POST['id'];
    $name=$_POST['name'];
  $breed=$_POST['breed'];
    $age=$_POST['age'];
 $description=$_POST['description'];
      
  
   
   
$sql ="UPDATE animals SET  name='$name', breed ='$breed', age=$age, description ='$description' WHERE id={$id}";
if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The record was successfully updated";
       
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
     
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/boot.php'?> 
    </head>
    <body>
        <div class="container mt-5">
            
            <div class="alert alert-<?= $class?>" role="alert">
              
               <h3><?=$message?></h3>
               
                <a href='../dogs.php'><button class="btn btn-outline-primary" type='button'>Dogs</button></a>
            </div>
        </div>
    </body>
</html>
