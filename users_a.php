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
		<h2>All Users: </h2>
<?php
    //Delete Entries
    if(isset($_GET['del'])){
        $msgd ="";
        $id = $_GET['del'];
        $query = "DELETE FROM u_login WHERE u_id = $id";
        $fire = mysqli_query($cnt,$query) or die("Can not delete the data from database.". mysqli_error($cnt));
        if($fire) {
            $msgd = "Data deleted from database";
            header("Location: users_a.php");
        };
    }
?>
    <?php
        if(isset($_GET['msgd']))
        {
          echo "<p>Your Selected User Profile is Deleted</p>";
        }
        
        ?>
<?php
$sql="select * from u_login";
$md=mysqli_query($cnt,$sql) or die("Can not fetch data from database ".mysqli_error($cnt));

if(mysqli_num_rows($md)>0){ 

      while($r=mysqli_fetch_array($md))
      {
          ?>
<hr>
<strong> Fullname: </strong><?php echo $r['u_fname'] ?><br><br> 
<strong>Username: </strong><?php echo $r['u_uname'] ?><br><br>
<strong>Action: </strong>
<a href="update.php?upd=<?php echo $r['u_id'] ?>">Update</a>
&nbsp;
<a href="users_a.php?del=<?php echo $r['u_id'] ?>">Delete</a>
<hr>
<?php
        }      
        }
    else{ ?>
     <strong>Sorry! Hear is No user to Show.</strong>
    <?php } ?>


</body>
</html>