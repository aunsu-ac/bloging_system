 <?php
require 'db_link.php';
session_start();
?>
 <?php
    // get update variables
    if(isset($_GET['upd']))
    {
        $id = $_GET['upd'];
        $query = "SELECT * FROM u_login WHERE u_id ='$id' ";
        $fire = mysqli_query($cnt,$query) or die("Can not fetch the data.".mysqli_error($cnt));
        $r = mysqli_fetch_assoc($fire);  
    }
?>
<?php
    // update data
    if(isset($_POST['btn_u'])){
    	$id_u = $_POST['id'];
        $fn = $_POST['fname'];
        $un = $_POST['uname'];
        $pw = $_POST['pass'];
        
        $query = "UPDATE u_login SET u_fname = '$fn',u_uname = '$un',u_pass = '$pw' WHERE u_id='$id_u' ";
        $fire = mysqli_query($cnt,$query) or die("Can not update the data. ".mysqli_error($cnt));

        if($fire) header("Location: users_a.php");

    }
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website Title</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
		<h1>Welcome <?php echo $_SESSION['a_e']; ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="home_a.php">Write a Blog </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="m_blog.php">My blog's</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="req_a.php">Blog Request's</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="users_a.php">Users</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <a href="logout.php">Logout</a></h1>
<div id="login_container">
			<br>
			
			<center>
			<form  method="post" action="update.php">
				<h2>Update your Selected User</h2>
				<br>
				<br>

				<input type="hidden" name="id" value="<?php echo $r['u_id'] ?>">

				<input type="text" name="fname" placeholder="Enter your new fullname" 
				value="<?php echo $r['u_fname'] ?>"><br><br>

				<input type="text"  name="uname" placeholder="Enter Your new username" 
				value="<?php echo $r['u_uname'] ?>"><br><br>

				<input type="password"  name="pass" placeholder="Enter Your new Password" 
				value="<?php echo $r['u_pass'] ?>" ><br><br><br>

                <button name="btn_u" id="btn_u" >Update</button>
                <a href="users_a.php">&nbsp; Back &nbsp;</a>
			</form>	

			</center>
			<br>
			<br>
			<br>
		</div>



</body>
</html>
