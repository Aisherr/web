<?php

$conn= new mysqli('localhost','root','','web');
if(!$conn){
    die(mysqli_error ($conn));
}


