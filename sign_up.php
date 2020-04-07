<?php
require 'db_link.php';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Tech Blog</title>
	<link rel="stylesheet" href="style_new.css">
</head>
<body>
	<center><h1>Website Title have to be hear</h1></center>
	<div id="new_sign">
	<center>
		<form method="post" action="sign_up.php">
			<h2>Sign-up Form</h2>
			<label>Enter your Fullname: </label><br><br>
			<input type="text" name="fname" placeholder="Enter Your Fullname"><br><br>
			<label>Enter your Username: </label><br><br>
			<input type="text" name="uname" placeholder="Enter Your Username"><br><br>
			<label>Enter your Password: </label><br><br>
			<input type="Password" name="pass" placeholder="Enter Your Password"><br><br>
			<input type="submit" name="btn" value="Submit">&nbsp; <a href="index.php">&nbsp; Back &nbsp;</a>
		</form>
			
	</center>
		<?php
			if(isset($_POST['btn']))
			{
				$fn=$_POST['fname'];
				$un=$_POST['uname'];
				$pw=$_POST['pass'];

				$sql="INSERT INTO u_login (u_id, u_fname, u_uname, u_pass) VALUES(NULL,'$fn','$un','$pw')";

				$r=mysqli_query($cnt,$sql);
    			if($r==1)
    				//echo "Sign-up sucessfully";
    				header("Location: index.php?msg=Sign-up sucessfully");
    			else if($r==0)
    				echo "Failed to Upload the blog";
			}
		
		?>
</div>
</body>
</html>