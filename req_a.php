<?php
require 'db_link.php';
session_start();
?>
    <?php
        //Delete Entries
        if(isset($_GET['del'])){
            $msgd ="";
            $id = $_GET['del'];
            $query = "DELETE FROM request WHERE r_id = '$id' ";
            $fire = mysqli_query($cnt,$query) or die("Can not delete the data from database.". mysqli_error($cnt));
            if($fire) {
                $msgd = "Data deleted from database";
                header("Location: req_a.php");
            };
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
	<h1>Welcome <?php echo $_SESSION['a_e']; ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="home_a.php">Write a Blog </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="m_blog.php">My blog's</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="req_a.php">Blog Request's</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="users_a.php">Users</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <a href="logout.php">Logout</a></h1>
      <?php
        if(isset($_GET['msgd']))
        {
          echo "<p>Request Deleted form database</p>";
        }
        
        ?>
	<h2>All Blog Requests by Users: </h2>
<?php
$sql="select * from request order by r_time desc";
$md=mysqli_query($cnt,$sql) or die("Can not fetch data from database ".mysqli_error($cnt));

if(mysqli_num_rows($md)>0){ 

      while($r=mysqli_fetch_array($md))
      {
          ?>
<hr> 
<strong>Username: </strong><?php echo $r['u_fname'] ?><br><br>
<strong> Request Content: </strong><?php echo $r['r_content'] ?><br><br>
<strong> Request Date: </strong><?php echo $r['r_date'] ?><br><br>
<a href="req_a.php?del=<?php echo $r['r_id'] ?>">Delete This Request</a>
<hr>
<?php
        }      
        }
    else{ ?>
     <strong>Sorry! Hear is No user to Show.</strong>
    <?php } ?>


</body>
</html>