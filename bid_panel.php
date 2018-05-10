<?php
    session_start();
    if(isset($_SESSION["userSession"]) && isset($_SESSION["userId"]) && $_SESSION["userType"]==0){
        //put some welcome message...
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
                <div class="global-logo"><p><b>Dolphie</b><span>Bid</span></p></div>
                <div class="sign-up">
                    <p>Welcome
                        <?php 
                            $user = $_SESSION["userSession"];
                            echo $user."!" ;
                        ?>
                    </p>
                </div>
                <div class="sign-in">
                    <p>
                    <form action="logout.php" method="post">
                        <input id="logout" type="submit" value="Log Out" name="logout" />
                    </form>
                    </p>
                </div>
            </div>
            <div class="clear"></div>
            <div class="second-row-2">
                <div  class="second-row-col-1">
                    <div class="item-wrapper">
                        <div class="item-icon">Logo</div>
                            <div class="item-detail-wrapper">
                                <div class="item-detail">Item Details</div>
                                <div class="item-bidder">Last Bidded for by: ......</div>
                            </div>
                            <div class="item-price">
                                <p>#500</p>
                                <p>Bid</p>
                            </div>
                        </div>
                        <!-- 
                        <div class="clear"></div>
                        -->
                </div>
                <div  class="second-row-col-2">
                        <div class="edge-fund">
                            Fund Account<br>
                            <font color="#fff" size="2px">Current Balance: &#x20a6;
                                <?php 
                                require "db.php";
                                $user = $_SESSION["userSession"];
                                $sql = "SELECT wallet FROM user WHERE screenname='$user'";
                                $data = mysqli_query($dbc,$sql) or die('Problem Occurred');
                                $row = mysqli_fetch_row($data);
                                if(mysqli_num_rows($data) > 0){
                                    echo $row[0];
                                }
                                ?>
                            </font>
                            <input type="submit" name="fund" id="fund" value="Fund Now!" onclick="fund()" />
                        </div>
                        <div class="recent-bid">
                            Recent Bids
                        </div>
                </div>
            </div>

            <div class="third-row">
                <div class="third-column-1">
                    <div class="current-bid-panel"><p>Current Bids</p></div>
                    <div class="item-wrapper">
                        <div class="item-icon">Logo</div>
                        <div class="item-detail-wrapper">
                            <div class="item-detail">Item Details</div>
                            <div class="item-bidder">Last Bidded for by: ......</div>
                        </div>
                        <div class="item-price">
                            <p>#500</p>
                            <p>Bid</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div  class="third-column-2">
                    <div class="item-display" style="background-image: url('images/item_1.jpg'); background-size: contain;background-repeat: no-repeat;">
                        <p></p>
                    </div>
                    <div class="item-display" style="background-image: url('images/item_2.jpg'); background-size: contain;background-repeat: no-repeat;">
                        <p></p>
                    </div>
                    <div class="item-display" style="background-image: url('images/item_3.jpg'); background-size: contain;background-repeat: no-repeat;">
                        <p></p>
                    </div>
                
                </div>
            </div>
        </div>
        <div id="funder" class="overlayf">
            <div class="overlayfund">
                <br><br>
                <form action="" method="post">
                <input type="number" name="amount" placeholder="Enter Amount in numbers" required />
                <br><br>
                <input type="submit" value="Fund" name="fund" />
                <br><br>
                </form>
                <input type="submit" value="X" name="toggler" onclick="fund()" />
                <p id="Reply"></p>
                <?php
                    require "fund.php";
                ?>
            </div>
        </div>
    </body>
</html>