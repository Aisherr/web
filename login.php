<?php
require_once('./operations.php')
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <h1 class="text-center my-3">Login Form</h1>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" class="w-50">
               
           
            <?php inputFields("Email","email","","text");?>
            
            <?php inputFields("password","password","","password");?>
           
          
            <button class="btn btn-dark" name="submit" type="submit">Submit</button> 
            <br>
            <br> 
            <a href="register.php">Don't have an account? Click here to register.</a>  
     
<?php
include ('./connect.php');
if(isset($_POST['submit'])){
   
    $email=$_POST['email'];
   
    $password=$_POST['password'];
   
   

        $sql="insert into `login`(email,password) values('$email',$password)";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            <strong>Success</strong> Logged in successfully
            </div>';
        }else{
            die(mysqli_error($conn));
        }
    }


?>

 </form>
</div>
        
    </body>
</html>

