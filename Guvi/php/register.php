<?php
$servername ="localhost";
$username = "root";
$password = "";
$servername ="localhost";
$username = "root";
$password = "";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$rollnum = $_POST['rollnum'];
$dob= $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$rpwd = $_POST['rpwd'];
//DATABASE CONNECTION 
$conn = new mysqli($servername,$username,$password,"test");

if($conn->connect_error)
{
    die('Connection Failed :'.$conn->connect_error);

}
else{
    $stmt = $conn->prepare("insert into registrstion(fname,lname,dob,gender,email,pwd,rpwd) values(?,?,?,?,?,?,?)" );
    $stmt  -> bind_param("sssssss",$fname,$lname,$dob,$gender,$email,$pwd,$rpwd);
    $stmt->execute();
    echo "regitration successfully...";
    $stmt->close();
    $conn->close();
    
}


?>