<?php
require_once('./operations.php')
?>


<!DOCTYPE html>
<html>
    <head>
        <title>registration Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <h1 class="text-center my-3">Registration Form</h1>
        <div class="container d-flex justify-content-center">
            <form action="display.php" method="post" class="w-50" enctype="multipart/form-data">
               
            <?php inputFields("Name","name","","text");?>
            <?php inputFields("Email","email","","text");?>
            <?php inputFields("Phonenumber","phonenumber","","num");?>
            <?php inputFields("Password","password","","password");?>
            <?php inputFields("","file","","file");?>
           
          
           <button class="btn btn-dark" type="submit" name="submit">Submit</button>
            <br>
            <br> 
            <a href="register.php">Don't have an account? Click here to register.</a>  


