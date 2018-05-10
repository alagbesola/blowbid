<?php
    //error_reporting(0);
    session_start();
    //require_once "Mail.php";
    require "db.php";
    $detalle = "Welcome";
	//echo ("<SCRIPT LANGUAGE ='Javascript'>window.alert(".$detalle.")</SCRIPT>");

    if(isset($_POST["signinbid"])){
        $username = $_POST["usernameb"];
        $password = $_POST["passwordb"];

        $sql = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
        $data = mysqli_query($dbc,$sql) or die('Problem Occurred');
        $row = mysqli_fetch_row($data);
        if(mysqli_num_rows($data) > 0){
            if($username == $row[3] && $password == $row[4] && $row[5]==0){
                $_SESSION["userSession"]=$row[3];
                $_SESSION["userId"]=$row[0];
                $_SESSION["userType"]=$row[5];
                $detalle = $row[3]." ".$row[4]." ".$row[5];
                /*echo ("<SCRIPT LANGUAGE ='Javascript'>
                    window.alert(".$detalle.")</SCRIPT>");*/
                header("Location: bid_panel.php");
            }
            else header("Location: index.php");
        }
        else header("Location: index.php");
        mysqli_close($dbc);
    }
    if(isset($_POST["signinsell"])){
        $username = $_POST["usernames"];
        $password = $_POST["passwords"];

        $sql = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
        $data = mysqli_query($dbc,$sql) or die('Problem Occurred');
        $row = mysqli_fetch_row($data);
        if(mysqli_num_rows($data) > 0){
            if($username == $row[3] && $password == $row[4] && $row[5]==1){
                $_SESSION["userId"]=$row[0];
                $_SESSION["userSession"]=$row[3];
                $_SESSION["userType"]=$row[5];
                //$track = "Welcome ".$_SESSION["userSession"]."!";
                $detalle = $row[3]." ".$row[4]." ".$row[5];
                echo $detalle;
                /*echo ("<SCRIPT LANGUAGE ='Javascript'>
                    window.alert(".$detalle.")</SCRIPT>");*/
                header("Location: seller_panel.php");
            }
            else header("Location: index.php");
        }
        else {
            $detalle = $row[3]." ".$row[4]." ".$row[5];
            /*echo ("<SCRIPT LANGUAGE ='Javascript'>
                window.alert(".$detalle.")</SCRIPT>");*/
            header("Location: index.php");
        }
        mysqli_close($dbc);
    }
?>