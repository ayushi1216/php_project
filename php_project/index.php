<?php

$insert = false;

if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }

    // else{
    //     echo "Successful connection";
    // }

   

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    

     $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
          
    // echo $sql;


    if($con->query($sql) == true){
        // echo "successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR:  $sql <br> $con->error";
    }

    $con->close();

}   

?>



<!-- HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Travel Form</title>
</head>
<body>

<img class="bg" src="bg1.png" alt="IIT">

<div class="container">
    <h1>Welcome to IIT kharagpur US Trip form</h1>
    <p>Enter your details and submit this form to confirm your participation in the trip</p>

    <?php
    if($insert == true) {
    echo "<p class='submitMsg'>Thanks, for submitting this form, we are happy to see you joining us.</p>";
    }
    ?>
    

    <form action="index.php" method="post">

        <input type="text" name="name" id="name" placeholder="Enter your name" style="background-color: rgb(222, 215, 215);">
        <input type="text" name="age" id="age" placeholder="Enter your age" style="background-color: rgb(222, 215, 215);">
        <input type="text" name="gender" id="gender" placeholder="Enter Gender" style="background-color: rgb(222, 215, 215);">
        <input type="text" name="email" id="email" placeholder="Enter your Email" style="background-color: rgb(222, 215, 215);">
        <input type="text" name="phone" id="phone" placeholder="Enter Phone No." style="background-color: rgb(222, 215, 215);">

        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Info" style="background-color: rgb(222, 215, 215);"></textarea>

        <button class="btn">Submit</button>

    </form>




</div>



<script src="script.js"></script>

</body>
</html>

