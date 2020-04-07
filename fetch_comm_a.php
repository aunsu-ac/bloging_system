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
<body>
	<h1>Welcome <?php echo $_SESSION['a_e']; ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="home_a.php">Write a Blog </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="m_blog.php">My blog's</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="req_a.php">Blog Request's</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="users_a.php">Users</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <a href="logout.php">Logout</a></h1>

<h2>Selected Blog: </h2>
<?php
if (isset($_GET['code'])) {

$id=$_GET['code'];
$fn=$_SESSION['a_fn'];
$sql="select * from blog where b_id=$id ";
$md=mysqli_query($cnt,$sql) or die("Can not fetch data from database ".mysqli_error($cnt));

if(mysqli_num_rows($md)>0){ 

      while($r=mysqli_fetch_array($md))
      {
          ?>
<hr>
<strong> Subject: </strong><?php echo $r['b_sub'] ?><br><br> 
<strong>About the Subject/Blog: </strong><br><?php echo $r['b_content'] ?><br><br>
<strong>Posted on: </strong><?php echo $r['b_date'] ?> <br>
<hr>
<?php
}
}
}

$sql="select * from comnt where b_id='$id' order by c_time ";
$md=mysqli_query($cnt,$sql) or die("Can not fetch data from database ".mysqli_error($cnt));

if(mysqli_num_rows($md)>0)
  	{ 

      while($r=mysqli_fetch_array($md))
        {
?>			
			<hr>	
            <strong><label>Commented: </label></strong> by &nbsp;<?php echo $r['u_fname']; ?>
            &nbsp;on &nbsp;<?php echo $r['c_date']; ?>&nbsp; at &nbsp;<?php echo $r['c_time']; ?><br>
            <ol>
            	<li>
					<?php echo $r['c_cont']; ?>
            	</li>
            </ol> 
            <hr>
          <?php
    	}      
    }else{
    	?>
     <strong>Sorry! There is No Comments to Show.</strong>
    <?php
    }
?>
</body>
</html>