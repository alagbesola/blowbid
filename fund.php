<?php
    error_reporting(0);
    session_start();
    if((isset($_SESSION["userSession"])) && (isset($_SESSION["userId"])) && ($_SESSION["userType"]==1)){
        //put some welcome message...
        //echo "Welcome ".$_SESSION["userSession"]."!";
        header("Location: seller_panel.php");
    }
    else if(!((isset($_SESSION["userSession"])) && (isset($_SESSION["userId"])) && (($_SESSION["userType"]==1) || ($_SESSION["userType"]==0)))){
        header("Location: index.php");
    }
    /*else if((isset($_SESSION["userSession"])) && (isset($_SESSION["userId"])) && ($_SESSION["userType"]==1)){
        header("Location: bid_panel.php"); 
    }*/

	include("db.php");
	if(isset($_POST["fund"])){
        $amount = $_POST["amount"];
        $user =  $_SESSION["userSession"];
		
		$query = "UPDATE user SET wallet= wallet+'$amount' WHERE screenname='$user'";	
        //$result = mysqli_query($dbc,$query) or die('Did not work!');
        if ($dbc->query($query) === TRUE) {
            //echo "New record created successfully";
            echo "<script>window.location = 'bid_panel.php';</script>";
        } else {
            //echo "Error: " . $sql2 . "<br>" . $dbc->error;
            //echo $sql2;
            echo "<script>window.alert('Error')</script>";
        }
	}
?>