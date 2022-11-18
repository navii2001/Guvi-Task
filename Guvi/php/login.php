<?php
$email =$_POST['email'];
$password =$_POST['password'];

$conn = new mysqli('localhost','root','',"test");
 if($conn->connect_error)
{
    die('Connection Failed :'.$conn->connect_error);
}

    $stmt = $conn->prepare("select * from registrstion where email=(?)");
    $stmt  -> bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result -> num_rows > 0)
    {
        $data = $stmt_result -> fetch_assoc();
        if( $data['pwd']==$password)
        {
            header("Location: profile.php");
        }
        else{
            echo"<h2>invalid Email or password </h2>";
        }
    }
    else{
        echo"<h2>invalid Email or password </h2>";
    }
?>