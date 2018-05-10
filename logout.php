<html><body background='black'></body></html>
<?php
session_start();
session_unset();
session_destroy();
		//echo "<html><body background='black'></body></html>";
		echo ("<SCRIPT LANGUAGE='Javascript'>
		window.location.href='index.php'
		</SCRIPT>");exit;

?>