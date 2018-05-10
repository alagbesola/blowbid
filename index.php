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
            function overlaysellerhub(){
                el = document.getElementById("overlaysellerhub");
                el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="first-row">
                <div class="global-logo"><p><b>Dolphie</b><span>Bid</span></p></div>
                <div class="seller-hub"><p><input type="submit" value="Sellers' Hub" name="sellershub" onclick="overlaysellerhub()" /></p></div>
                <div class="sign-up"><p><input type="submit" value="Sign Up!" name="signup" onclick="overlayx()" /></p></div>
                <div class="sign-in"><p><input type="submit" value="Sign In" name="signin" onclick="overlay()" /></p></div>
            </div>
            <div class="clear"></div>
            <div class="second-row">
                <div class="bid-now-button">
                    <p><input type="submit" value="Bid Now!" name="bidnow" onclick="overlay()" />
                    </p>
                </div>
            </div>
            <div class="clear"></div>
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
        <div id="overlay" class="overlay">
            <div class="overlayD">
                <br><br>
                <form action="login.php" method="post">
                <input type="text" name="usernameb" maxlength="15" placeholder="Username" required />
                <br><br>
                <input type="password" name="passwordb" maxlength="30" placeholder="Password" required />
                <br><br>
                <input type="submit" value="Sign In" name="signinbid" />
                <br><br>
                </form>
                <input type="submit" value="X" name="toggler" onclick="overlay()" />
                <p id="Reply"></p>
            </div>
        </div>
        <div id="overlayx" class="overlay">
            <div class="overlayD">
                <br><br>
                <form action="" method="post">
                <input type="text" name="firstname" maxlength="25" placeholder="Firstname" required />
                <br><br>
                <input type="text" name="lastname" maxlength="25" placeholder="Lastname" required />
                <br><br>
                <input type="email" name="email" maxlength="50" placeholder="Email" required />
                <br><br>
                <input type="phone" name="phone" maxlength="13" placeholder="Phone Number" required />
                <br><br>
                <input type="text" name="username" maxlength="15" placeholder="Username" required />
                <br><br>
                <input type="password" name="password" maxlength="30" placeholder="Password" required />
                <br><br>
                <input type="submit" value="Sign Up" name="signup" />
                <br><br>
                </form>
                <input type="submit" value="X" name="toggler" onclick="overlayx()" />
                <p id="Reply"></p>
                <?php
                    require "signup.php";
                ?>
            </div>
        </div>

        <div id="overlaysellerhub" class="overlay">
            <div class="overlaysellerhub-2">
                <div class="sellerhub-left">
                    <!-- This part for seller's signing up -->
                    <br>
                    New! Register Here
                    <br><br>
                    <form action="" method="post">
                    <input type="text" name="firstname" maxlength="25" placeholder="Firstname" required />
                    <br><br>
                    <input type="text" name="lastname" maxlength="25" placeholder="Lastname" required />
                    <br><br>
                    <input type="email" name="email" maxlength="50" placeholder="Email" required />
                    <br><br>
                    <input type="phone" name="phone" maxlength="13" placeholder="Phone Number" required />
                    <br><br>
                    <input type="text" name="username" maxlength="15" placeholder="Username" required />
                    <br><br>
                    <input type="password" name="password" maxlength="30" placeholder="Password" required />
                    <br><br>
                    <input type="submit" value="Sign Up" name="ssignup" />
                    <br><br>
                    </form>
                    <!-- <input type="submit" value="X" name="toggler" onclick="overlaysellerhub()" /> -->
                    <p id="Reply"></p>
                    <?php
                        require "signup.php";
                    ?>
                </div>
                <div class="sellerhub-right">
                    <!-- This part for seller's signing in -->
                    <br>
                    Sign In Here:
                    <br><br>
                    <form action="login.php" method="post">
                    <input type="text" name="usernames" maxlength="15" placeholder="Username" required />
                    <br><br>
                    <input type="password" name="passwords" maxlength="30" placeholder="Password" required />
                    <br><br>
                    <input type="submit" value="Sign In" name="signinsell" />
                    <br><br>
                    </form>
                    <input type="submit" value="X" name="toggler" onclick="overlaysellerhub()" />
                    <p id="Reply"></p>
                </div>
            </div>
        </div>
    </body>
</html>