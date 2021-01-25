<?php 
    include ('create.php');//To be able to access the variable $edit_state 
    
    
    $connection = mysqli_connect("localhost:3307","root","","CRUD");
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $edit_state = true;

        $edit_fields = "SELECT * FROM data WHERE id=$id";
        $result = mysqli_query($connection, $edit_fields );
        
        if($row=mysqli_fetch_assoc($result)){
            $name = $row['name'];
            $location = $row['location'];
            $id = $row['id'];
           
        }

          
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
   
</head>
<body>


<div class="container">

<div style="background-color:rgb(255, 0, 85); color:white; font-size:20px;">
    <?php
        if(isset($_GET['record_deleted'])){
            echo "Record has been successfully deleted";
        }
       
    ?>
</div>
<div style="background-color:rgb(93, 201, 165); color:white; font-size:20px;">
    <?php
        if(isset($_GET['record_created'])){
            echo "Record has been successfully saved";
        }
    ?>
</div>
<div style="background-color:rgb(93, 201, 165); color:white; font-size:20px;">
    <?php
        if(isset($_GET['record_updated'])){
            echo "Record has been successfully updated";
        }
    ?>
</div>
<table class="table">

    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
    <tr>
    <?php 
    //Connect to database
    $connection = mysqli_connect("localhost:3307","root","","CRUD");
     //Retrieve data from database using session variables to display
    $sql = "SELECT *FROM data";
    $result = mysqli_query($connection,$sql);
    while($row=mysqli_fetch_assoc($result)):?>
        <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['location'];?></td>
        <td>
            <a href="index.php?id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
            <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
        
        </td>
    </tr>
    <?php endwhile;?>  
    
        
   
</table>

    <div class="row justify-content-center">
        <form action="create.php" method="POST" class="form">
        <div class="form-group">
            <div>
                <h3>CRUD Form </h3>
               
            </div>
            <input  type="hidden" name="id" value="<?php echo $id;?>">
            <label for="name" class="name">Name</label><br>
            <input class="form-control" type="text" name="name" value="<?php echo $name;?>"><br>
        </div> 
        <div class="form-group">
            <label for="location" class="location">Location</label><br>
        
          
            <input class="form-control" type="text" name="location" value="<?php echo $location;?>"><br>
        </div>  
        <div class="form-group"> 
           
            <?php if($edit_state==false):?>
                <input type="submit" name="save" value="Save" class="btn btn-success">  </button>
                
            <?php else: ?>
                <input type="submit" name="update" value="Update" class="btn btn-primary"></button>
            <?php endif; ?>
        </div>
        </form>
        </div>
    </div>
</body>
</html>