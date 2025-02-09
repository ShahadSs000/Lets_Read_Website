<?php 
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $server="localhost";
            $user="root";
            $pass="";
            $database="storiesforkidswebsite";
            $con= mysqli_connect($server,$user,$pass,$database)
            or die(mysqli_connect_error());

            $query = "INSERT INTO useres_info(userName,userEmail,userPass) VALUES (' " .$_POST["username"]. " ', ' " .$_POST["email"]. " ', ' " .$_POST["password"]. " ')";
            mysqli_query($con,$query)
            or die(mysqli_connect_error());

        $res =mysqli_query($con,"SELECT * FROM useres_info")
        or die(mysqli_connect_error());
        /*echo '<table border="1" style="border: #4a77b2;">
        <tr>
        <th>username</th>
        <th>email</th>
        <th>password</th>
        </tr>';
        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
            echo '<tr>
            <td>'.$row["userName"].'</td>
            <td>'.$row["userEmail"].'</td>
            <td>'.$row["userPass"].'</td>
            </tr>';
        }
        echo "</table>";*/

    }
       ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="csspages/homestyle.css">
        <link rel="stylesheet" href="csspages/navbar.css">
        <link rel="stylesheet" href="csspages/container.css">
        <script src="cou.js"></script>
        <title>Home Page</title>
    </head>
    <body>
        <header>
            <img src="logo.png" alt="logo" id="logo">
        
        <nav class="navbar" id="nav"> <!--navbar items-->
            <ul>
                 <li> <a  class="active" href="homepage.html">Home</a></li>
                 <li> <a href="stories.html">Stories</a></li>
                 <li> <a href="contact.html">Contact</a></li>
                 <li> <a href="about.html">About</a></li>
            </ul>
        </nav>
          </header>
    </body>
        <img src="signup.jpg" alt="signup" class="sideimg">
        <div class="sign">
            <fieldset><legend>READY FOR A NEW ADVENTURE? </legend>
            <h4>HORRAY! YOU SUCCRSSTULY SIGNED UP!</h4><br><br><br><br>
            <div class="inputcontainer" style="display: flex; justify-content: center;">
                <h2 style="color:#4a77b2">Welcome
                    <?php
                     $server="localhost";
                     $user="root";
                     $pass="";
                     $database="storiesforkidswebsite";
                     $con= mysqli_connect($server,$user,$pass,$database)
                     or die(mysqli_connect_error());
                     $username =mysqli_query($con,"SELECT userName FROM useres_info WHERE id =(SELECT MAX(id) FROM useres_info)")
                     or die(mysqli_connect_error());
                     $row=mysqli_fetch_array($username,MYSQLI_ASSOC);
                     echo $row["userName"];
                     ?>!<br>Get ready for a world of fun<br>learning,and exciting adventure!<br>If you have any questions or problems, don't hesitate to contact us!
                    </h2>
        </fieldset>
</div>

</html>
