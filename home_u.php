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
	<link rel="stylesheet" href="style_u.css">
</head>
<body>
	<h1>&nbsp;Welcome <?php echo $_SESSION['u_fn']; ?> on Tech Blog
    <div align="right">
	<a href="logout.php">Logout</a> &nbsp;</h1>
</div>
<?php
if(isset($_GET['r_btn']))
{
    $cont=$_GET['req'];
    $r_fn=$_SESSION['u_fn'];
    $sql_r="INSERT INTO request (r_id, r_content, r_date, r_time, u_fname) VALUES (NULL,'$cont',curdate(), curtime(),'$r_fn')";

    $r_r=mysqli_query($cnt,$sql_r);
    if($r_r==1){
        echo "Request Submited Sucessfully, We will <br>
         write a blog on <strong>".$cont."</strong>
          as soon as possible <br> Thank You.<strong> ".$_SESSION['u_fn']."</strong>
            Please! "."<a href=home_u.php>&nbsp; Click Hear &nbsp;</a>";
    }
    else if($r_r==0){
        echo "Failed to Submit the Request";
    }
}
?>
<h2>Your Searched Blogs:  
  <div align="right">

  <form action="home_u.php" method="get">
        Search Your Requered blog hear: &nbsp;
    <input type="text" name="srch" placeholder="Search Your Required Blog">
    <input type="submit" name="s_btn" value="Search">&nbsp;
  </form>
</div>
</h2>
  <?php
if (isset($_GET['s_btn'])) 
{
  $srch=$_GET['srch'];
  $sql_s="select * from blog where b_sub like '%$srch%' ";
    $rs=mysqli_query($cnt,$sql_s);
       if(mysqli_num_rows($rs)>0)
{
  while($a=mysqli_fetch_array($rs))
  {
    ?>
    <hr>
<strong> Subject: </strong><?php echo $a['b_sub'] ?><br><br><br> 
<strong>About the Subject: </strong><?php echo $a['b_content'] ?><br><br>
<p><strong>Posted on: </strong><?php echo $a['b_date'] ?></p> 
<hr>
<?php
  }
}
}
  ?>
  <h2>All Blogs: 
      <div align="right">
  <form action="home_u.php" method="get">
    Request Your blog hear: &nbsp;
    <input type="text" name="req" placeholder="Place your Request for Blog">
    <input type="submit" name="r_btn" value="Submit">&nbsp;
  </form>
</div>

  </h2>
<?php
$sql="select * from blog order by b_time";
$md=mysqli_query($cnt,$sql) or die("Can not fetch data from database ".mysqli_error($cnt));

if(mysqli_num_rows($md)>0){ 

      while($r=mysqli_fetch_array($md))
      {
          ?>
<hr>
<strong> Subject: </strong><?php echo $r['b_sub'] ?><br><br><br> 
<strong>About the Subject: </strong><?php echo $r['b_content'] ?><br><br>
<p><strong>Posted on: </strong><?php echo $r['b_date'] ?></p>
<?php //include_once 'comm_u.php'; ?> 
<form method="post" action="comm_u.php">
<input type="hidden" name="bid" value="<?php echo $r['b_id'] ?>">
<input type="post" name="com" placeholder="Enter Your Comment">
<input type="submit" name="btn" value="Post">
</form>
<hr

        

<?php
        }      
        }
    else{ ?>
     <strong>Sorry! There is No Blogs to Show.</strong>
    <?php } ?>


</body>
</html>