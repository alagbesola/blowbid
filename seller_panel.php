<?php
    session_start();
    if((isset($_SESSION["userSession"])) && (isset($_SESSION["userId"])) && ($_SESSION["userType"]==1)){
        //put some welcome message...
        //echo "Welcome ".$_SESSION["userSession"]."!";
    }
    else header("Location: index.php"); 
?>
<html>
    <head>
        <title>Dolphie Bid</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Dolphie Bid" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- <meta HTTP-EQUIV="REFRESH" content="5; url=index.php"> -->
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script>
            function overlay() {
                el = document.getElementById("overlay");
                el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
		    }
            function overlayx() {
                el = document.getElementById("overlayx");
                el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
		    }
            function fund() {
                el = document.getElementById("funder");
                el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
		    }
            
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="first-row">
                <div class="global-logo"><p><font color="#000"><b>Dolphie</b></font><span>Bid</span><font color="#E4B007"><b> | Sellers' Panel</b></font></p></div>
                <div class="sign-up">
                    <p>Welcome
                        <?php 
                            $user = $_SESSION["userSession"];
                            echo $user."!";
                        ?>
                    </p>
                </div>
                <div class="sign-in">
                    <p>
                    <form action="logout.php" method="post">
                        <input id="logout" type="submit" value="Log Out" name="signup" />
                    </form>
                    </p>
                </div>
            </div>
            <div class="second-row-seller">
                <div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input name="itemImage" type="file" required accept="image/jpg"/><br><br>
                        <input type="text" placeholder="Item Name" required /><br><br>
                        <input type="number" placeholder="Duration in Hours" required /><br><br>
                        <input type="text" placeholder="Item Details" required /><br><br>
                        <input type="submit" name="addBidItem" value="Add Bid Item" />
                    </form>
                </div>
                <div>
                    <img src="" />
                </div>
                <hr />
            </div>
            <div class="third-row">
                <?php
                    require "db.php";
                    $query = "SELECT * FROM ".$_SESSION["userSession"];
                    $data = mysqli_query($dbc,$query) or die('Problem Occurred');
                    $row = mysqli_fetch_row($data);
                    if(mysqli_num_rows($data) > 0){
                        while($row=mysqli_fetch_row($data)){
                            if($row[2]==0){
                                echo '<div class="item-wrapper">
                                    <div><img src="'.$row[3].'" /></div>
                                    <div>Open</div>
                                    <div>JS Count Down to Bid End</div>
                                    <div>
                                        <form action="" method="POST">
                                            <input type="hidden" name="itemIndex" value ="'.$row[0].'"/>
                                            <input type="submit" name="BidCloser" value="BidCloser" />
                                        </form>
                                    </div>
                                </div>';
                            }
                            else if($row[2]==1){
                                echo '<div class="item-wrapper">
                                    <div><img src="'.$row[3].'" /></div>
                                    <div>Open</div>
                                    <div>JS Count Down to Bid End</div>
                                    <div>
                                        <form action="" method="POST">
                                            <input type="hidden" name="itemIndex" value ="'.$row[0].'"/>
                                        </form>
                                    </div>
                                </div>';
                            }
                        } 
                    }                    
                ?>
            </div>
        </div>
        <?php
            require "db.php";
            if(isset($_POST["addBitItem"])){
                //get item details
                $sellername = $_SESSION["userSession"];
                $imageName = "image/".$sellername."images/".$_FILES["itemImage"]["name"];;
                $itemName = $_POST["itemName"];
                $itemDuration = $_POST["itemDuration"];
                $itemDescription = $_POST["itemDescription"];

                $dir = "image/".$sellername."images/";
				//send item details to database
                $query = "SELECT * FROM ".$_SESSION["userSession"]." WHERE itemName=".$itemName."";
                $data = mysqli_query($dbc,$query) or die('Problem Occurred');
                $row = mysqli_fetch_row($data);
                if(mysqli_num_rows($data) == 0){
                    if(!is_dir('$dir')){
                        mkdir($dir,0777,true);
                    }
                    move_uploaded_file($_FILES["itemImage"]["tmp_name"],$imageName);
                    //send data since it does not exist
                    $query = "INSERT INTO ".$_SESSION["userSession"]."(itemname,details,imagepath,bidstatus,duration) VALUES ($itemName,$itemDescription,$imageName,0,$itemDuration)";
                    $data = mysqli_query($dbc,$query) or die('Problem Occurred');
                }
                else echo "Bid Item Data already exists!";
            }
            else if(isset($_POST["BidCloser"])){
                //get index of item
                $itemIndex = $_POST["itemIndex"];
                //set status to 1
                $query = "UPDATE ".$_SESSION["userSession"]." SET status=1 WHERE id=".$itemIndex.;
                $data = mysqli_query($dbc,$query) or die('Problem Occurred');

                echo  "<script>window.alert('Item Bid Closed Successfully. Press Enter to Return!')</script>";
            }
        ?>
    </body>
</html>