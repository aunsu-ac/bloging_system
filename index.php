<?php
require 'db_link.php';
?>
<?php
session_start();
if(isset($_POST['login']))
{
    $ans=$_POST['login'];
    if($ans=="Admin_login")
    {
    	$msg_a ="";
        $a_un=$_POST['a_e'];
        $a_pw=$_POST['a_p'];

        $sql="select * from a_login where a_uname='$a_un' and a_pass='$a_pw' ";
    
    $fire=mysqli_query($cnt,$sql);
    if ($fire) 
    {
    	if(mysqli_num_rows($fire) == 1){
    		    while($a=mysqli_fetch_array($fire))
    				{
    					$a_fn=$a['a_fname'];
    					$_SESSION['a_fn'] = $a_fn;
			    		$_SESSION['a_e'] = $a_un;
					header("Location: home_a.php");
    				}
    		}else{
    			header("Location: index.php?msg_a=".$msg_a);
        		$msg_a .= "incorrect username or password";
        		} 
    }   
    }
else if($ans=="User_login")
{
	$msg_u ="";
    $u_un=$_POST['u_e'];
    $u_pw=$_POST['u_p'];

    $sql="select * from u_login where u_uname='$u_un' and u_pass='$u_pw' ";
    
    $fire=mysqli_query($cnt,$sql);
    if ($fire) 
    {
    	if(mysqli_num_rows($fire) == 1){
    		    while($a=mysqli_fetch_array($fire))
    				{
    					$u_fn=$a['u_fname'];
    					$_SESSION['u_fn'] = $u_fn;
			    		$_SESSION['u_e'] = $u_un;
					header("Location: home_u.php");
    				}
    		}else{
    			header("Location: index.php?msg_u=".$msg_u);
        		$msg_u .= "incorrect username or password";
        		} 
    }

}   
}
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
<body>
	<center><h1>Welcome to Tech Blog</h1></center>
		<div id="login_container">
			<br>
			
			<center>
			<form  method="post" action="index.php">
				<h2>Login Form for Admin</h2>
				<br>

				<?php if(isset($_GET['msg_a'])) echo "<font color=red><b><p>Your email or password may be wrong</p></b></font>" ?>

				<input type="text"  name="a_e" placeholder="Enter Your username" ><br><br>
				<input type="password"  name="a_p" placeholder="Enter Your Password"  ><br><br><br>
				<input type="submit"  name="login" value="Admin_login" >
			</form>	
			</center>
			<br>
			<br>
			<br>
		</div>
		<div id="admin_login">
			
			<br>
			<br>
			<center>
			<form  method="post" action="index.php">
				<h2>Login Form for Users</h2>
				<?php
				if(isset($_GET['msg_u']))
				{
					echo "<font color=red><b><p>Your email or password may be wrong</p></b></font>";
				}
				
				?>
				<br>
				<br>
				<input type="text"  name="u_e" placeholder="Enter Your username" ><br><br>
				<input type="password"  name="u_p" placeholder="Enter Your Password"  ><br><br><br>
				<input type="submit"  name="login" value="User_login" >
			</form><br>
			<a class="sup" href="sign_up.php">&nbsp; If You are a New User Then Click Hear &nbsp;</a>
			</center>
			<br>
			<br>
		</div>
</body>
</html>
