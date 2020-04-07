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

<h2>My Blogs: </h2>
<?php
$fn=$_SESSION['a_fn'];
$sql="select * from blog where a_fname='$fn' order by b_time desc";
$md=mysqli_query($cnt,$sql) or die("Can not fetch data from database ".mysqli_error($cnt));

if(mysqli_num_rows($md)>0){ 

      while($r=mysqli_fetch_array($md))
      {
          ?>
<hr>
<strong> Subject: </strong><?php echo $r['b_sub'] ?><br><br> 
<strong>About the Subject/Blog: </strong><br><?php echo $r['b_content'] ?><br><br>
<strong>Posted on: </strong><?php echo $r['b_date'] ?> <br><br>
<a href="m_blog.php?del=<?php echo $r['b_id'] ?>">&nbsp; Delete this blog &nbsp;</a><br><br>
<a href="upd_blog_a.php?upd=<?php echo $r['b_id'] ?>">&nbsp; Update this blog &nbsp;</a><br><br>
<a href="fetch_comm_a.php?code=<?php echo $r['b_id'] ?>">&nbsp; Show Commments for this Blog &nbsp;</a>
<hr>
<?php
    //Delete Entries
    if(isset($_GET['del'])){
        $msgd ="";
        $id = $_GET['del'];
        $query = "DELETE FROM blog WHERE b_id = $id";
        $fire = mysqli_query($cnt,$query) or die("Can not delete the data from database.". mysqli_error($cnt));
        if($fire) {
            $msgd = "Blog deleted from database";
            header("Location: m_blog.php");
        };
    }
?>
<?php
        }      
        }
    else{ ?>
     <strong>Sorry! There is No Blogs to Show.</strong>
    <?php } ?>

<h2>All Blogs: </h2>
<?php
$sql="select * from blog order by b_time desc";
$md=mysqli_query($cnt,$sql) or die("Can not fetch data from database ".mysqli_error($cnt));

if(mysqli_num_rows($md)>0){ 

      while($r=mysqli_fetch_array($md))
      {
          ?>
<hr>
<strong>Writen by: </strong><?php echo $r['a_fname'] ?> on <?php echo $r['b_date'] ?><br><br>
<strong> Subject: </strong><?php echo $r['b_sub'] ?><br><br>
<strong>About the Subject/Blog Content: </strong><br><?php echo $r['b_content'] ?><br><br>
<strong>Posted on: </strong><?php echo $r['b_date'] ?>
<hr>

        

<?php
        }      
        }
    else{ ?>
     <strong>Sorry! There is No Blogs to Show.</strong>
    <?php } ?>

</body>
</html>