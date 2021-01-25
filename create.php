<?php
//Connect to the database
$connection = mysqli_connect("localhost:3307","root","","CRUD");

if(isset($_POST['save'])){

    //Receive form input and store them in variables
    $name =mysqli_real_escape_string($connection, $_POST['name']);
    $location = mysqli_real_escape_string($connection,$_POST['location']);

    //Prepare statement and and insert data into database
    $insert = "INSERT INTO data (name,location) VALUES (?, ? )";
    $prepare = mysqli_prepare($connection,$insert);
    mysqli_stmt_bind_param($prepare,"ss", $name, $location);
    mysqli_stmt_execute($prepare);
    mysqli_close($connection);
    header ("location:index.php?record_created");
}
    $name ="";
    $location ="";
    $edit_state = false;

if(isset($_POST['update'])){
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $location = mysqli_real_escape_string($connection,$_POST['location']);
    $id = mysqli_real_escape_string($connection,$_POST['id']);
    
    $update = "UPDATE data SET name='$name', location='$location' WHERE id=$id";
    $result = mysqli_query($connection,$update);
    header ("location:index.php?record_updated");
    
}


?>