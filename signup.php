<?php
    error_reporting(0);
    session_start();
    require "db.php";
    if(isset($_POST["signup"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $type = 0;
        $wallet = 0;
        $screenname = $username;

        $sql = "SELECT * FROM user WHERE username='".$username."'";
        $data = mysqli_query($dbc,$sql) or die('Problem Occurred');
        $row = mysqli_fetch_row($data);
        if(mysqli_num_rows($data) > 0){
            echo "<p><font color='red'>Username already taken!</font></p>";
            header("Location: index.php");
        }
        else {
            $sql2 = "INSERT INTO user (firstname,lastname,username,password,type,screenname,email,phone,wallet) VALUES ('$firstname','$lastname','$username','$password','$type','$screenname','$email','$phone','$wallet')";
            if ($dbc->query($sql2) === TRUE) {
                echo "New record created successfully";
                echo "<script>window.location = 'index.php';</script>";
            } else {
                echo "Error: " . $sql2 . "<br>" . $dbc->error;
                //echo $sql2;
                echo "<p><font color='red'>Could not create account!</font></p>";
            }
            
            $dbc->close();
            //$data = mysqli_query($dbc,$sql) or die('Problem Occurred');
            
        }
    }
    else if(isset($_POST["ssignup"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $type = 1;
        $wallet = 0;
        $screenname = $username;

        $sql = "SELECT * FROM user WHERE username='".$username."'";
        $data = mysqli_query($dbc,$sql) or die('Problem Occurred');
        $row = mysqli_fetch_row($data);
        if(mysqli_num_rows($data) > 0){
            echo "<p><font color='red'>Username already taken!</font></p>";
            header("Location: index.php");
        }
        else {
            $sql2 = "INSERT INTO user (firstname,lastname,username,password,type,screenname,email,phone,wallet) VALUES ('$firstname','$lastname','$username','$password','$type','$screenname','$email','$phone','$wallet')";
            if ($dbc->query($sql2) === TRUE) {
                //echo "New record created successfully";
                //create seller's table for seller
                $sellertable = str_replace(" ","",$screenname);
                $query = "CREATE TABLE $sellertable (id INT(225) UNSIGNED AUTO_INCREMENT PRIMARY KEY, itemname VARCHAR(25) UNIQUE KEY NOT NULL, details VARCHAR(250) NOT NULL, imagepath VARCHAR(50) NOT NULL, bidstatus TINYINT(1) NOT NULL, duration INT(225) NOT NULL, winner VARCHAR(25), timeadded TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP )";
                //execute query and ball
                if ($dbc->query($query) === TRUE) {
                    echo "<script>window.location = 'index.php';</script>";
                } 
            } else {
                echo "Error: " . $sql2 . "<br>" . $dbc->error;
                //echo $sql2;
                echo "<p><font color='red'>Could not create account!</font></p>";
            }
            
            $dbc->close();
            //$data = mysqli_query($dbc,$sql) or die('Problem Occurred');
            
        }
    }
?>