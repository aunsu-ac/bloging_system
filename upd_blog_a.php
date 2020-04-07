<?php
require 'db_link.php';
session_start();
?>
 <?php
    // get update variables
    if(isset($_GET['upd']))
    {
        $id = $_GET['upd'];
        $query = "SELECT * FROM blog WHERE b_id ='$id' ";
        $fire = mysqli_query($cnt,$query) or die("Can not fetch the data.".mysqli_error($cnt));
        $r = mysqli_fetch_assoc($fire);  
    }
?>
<?php
    // update data
    if(isset($_POST['btn'])){
    	$id_u = $_POST['id'];
        $sub = $_POST['sub'];
        $blog = $_POST['blog'];
        
        $query = "UPDATE blog SET b_sub = '$sub',b_content = '$blog',b_time = curtime() WHERE b_id='$id_u' ";
        $fire = mysqli_query($cnt,$query) or die("Can not update the data. ".mysqli_error($cnt));

        if($fire) header("Location: m_blog.php");

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
<body align="center">
	<h1>Welcome <?php echo $_SESSION['a_e']; ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="home_a.php">Write a Blog </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="m_blog.php">My blog's</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="req_a.php">Blog Request's</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="users_a.php">Users</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <a href="logout.php">Logout</a></h1>
	<h2>Write a Blog on Techblog: </h2>
	<form method="post" action="upd_blog_a.php">
		<input type="hidden" name="id" value="<?php echo $r['b_id'] ?>">
		<input type="text" name="sub" placeholder="Enter the Subject of the Blog" value="<?php echo $r['b_sub'] ?>"><br><br>
			<textarea name="blog" cols="150" rows="20" placeholder="This blog must be 255 characters including Space"><?php echo $r['b_content'] ?></textarea>
		<input type="submit" name="btn" value="Submit"><br><br>
		<a href="m_blog.php">&nbsp; Back &nbsp;</a>
	</form>


</body>
</html>