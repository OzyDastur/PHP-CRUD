<?php
    $connection = mysqli_connect("localhost:3307","root","","CRUD");
    if(isset($_GET['id'])){
        $user_id =$_GET['id'];

        $delete = "DELETE FROM data WHERE id='$user_id'";
        mysqli_query($connection,$delete);

        header ("location:index.php?record_deleted");
    
    }

?>