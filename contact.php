<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

 //connect to database
$con=mysqli_connect("localhost","root","","storiesforkidswebsite")
 or die(mysqli_connect_error());

 //Select table
mysqli_select_db($con,"storiesforkidswebsite")
or die(mysqli_connect_error());

$errorMessage="";

if(isset($_POST['send'])){

//user input verifications

//name vildate
$namePattren="/^[a-zA-z]*$/";
if(!preg_match($namePattren,$_POST['Uname'])){
    $errorMessage="error";
    echo "<script>alert('Only alphabets are allowed.')</script>";
}else{
$name=$_POST['Uname'];    
}

//email vildate
$emailPattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if(!preg_match($emailPattern,$_POST['UEmail'])){
    $errorMessage="error";
    echo "<script>alert('Email is not valid.')</script>";
}else{
$email=$_POST['UEmail'];    
}

//phone number vildate
$phonePattern='/^[0-9]{10}+$/';
if(!preg_match($phonePattern,$_POST['UPhone'])){
    $errorMessage="error";
    echo "<script>alert('Invalid phone number format')</script>";
}
else{
$phoneNum=$_POST['UPhone'];    
}

// message vildate
if(strlen($_POST['UMessage'])>256){
    $errorMessage="error";
    echo '<script>alert("Email is not valid.")</script>';
}else{
$message=$_POST['UMessage'];
}

}

//if their is invlid user input
if(!empty($errorMessage)){
    include('contact.html');    
}

//if all input is valid then it will insert to database and echo a message
else{
    $sql="INSERT INTO contact (name,email,phoneNum,message) VALUES ('".$name."','".$email."','".$phoneNum."','".$message."')";

    if(mysqli_query($con,$sql)){
        echo "<!DOCTYPE html>
        <html>
        <head>
        <link rel=\"stylesheet\" href=\"csspages/style1.css\">
        </head>
        <body class='send_page'>
        <h1>Thank you,<em> $name</em> Your message has been sent. <br>We'll get back to you soon!</h1><br>
        Get back to <a href=\"contact.html\"><em>Contact page</em></a>    
        </body>
        </html>";
    }else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}
}

//close connection
$con->close();

?>
