
<?php
include('connect.php');

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];
    $password=$_POST['password'];
    $image=$_FILES['file'];
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $phonenumber;
    echo "<br>";
    print_r($image);
    echo "<br>";
    $imagefilename=$image['name'];
    print_r($imagefilename);
    echo "<br>";
    $imagefileerror=$image['error'];
    print_r($imagefileerror);
    echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";

    $filename_separate=explode('.',$imagefilename);
   print_r($filename_separate);
    echo "<br>";

    $file_extension=strtolower($filename_separate[1]);
    print_r($file_extension);

    $file_extension=strtolower(end($filename_separate));
   print_r($file_extension);

    $extension=array('jpeg','jpg','png');

    if (in_array($file_extension,$extension)){

        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `register`(name,email,phonenumber,password,image) values('$name','$email','$phonenumber','$password','$upload_image')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            <strong>Success</strong> Data inserted successfully
            </div>';
        }else{
            die(mysqli_error($conn));
        }
    }

}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Display data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            img{
                width:200px;
            }
        </style>
      
    </head>
    <body>

    <h1 class="text-center my-4">Registration Data</h1>

    <div class="container mt-5 d-flex justify-content-center">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Password</th>
                    <th scope="col">Image</th>
                
                </tr>           
            </thead>
            <tbody>
                
<?php 
   $sql="Select * from `register`";
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($result)){
                
            
                $id= $row['id'];
                $name= $row['name'];
                $email= $row['email'];
                $phonenumber=$row['phonenumber'];
                $password=$row['password'];
                $image=$row['image'];?>
                
<?php
                echo '<tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$phonenumber.'</td>
                <td>'.$password.'</td>
                <td><img src='.$image.'/></td>
                </tr>';

                }
                ?>
            </tbody>
        </table>
    </div>




    </body>
</html>
