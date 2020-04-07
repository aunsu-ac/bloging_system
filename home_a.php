<?php
require 'db_link.php';
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body align="center">
	<h1>Welcome <?php echo $_SESSION['a_e']; ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="home_a.php">Write a Blog </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="m_blog.php">My blog's</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="req_a.php">Blog Request's</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="users_a.php">Users</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <a href="logout.php">Logout</a></h1>
	<h2>Write a Blog on Techblog: </h2>
	<form method="post" action="home_a.php">
		<input type="text" name="sub" placeholder="Enter the Subject of the Blog"><br><br>
			<textarea name="blog" cols="150" rows="20" placeholder="This blog must be 255 characters including Space"></textarea>
		<input type="submit" name="btn" value="Submit">
	</form>
		<?php
			if(isset($_POST['btn']))
			{
				$sub=$_POST['sub'];
				$cont=$_POST['blog'];
				$fn=$_SESSION['a_fn'];

				$sql="INSERT INTO blog (b_id, b_sub, b_content, b_date, b_time, a_fname) VALUES(NULL,'$sub','$cont',curdate(), curtime(),'$fn')";

				$r=mysqli_query($cnt,$sql);
    			if($r==1)
    				//echo "Sign-up sucessfully";
    				header("Location: m_blog.php");
    			else if($r==0)
    				echo "Failed to Upload the blog";
			}
		?>

</body>
</html>