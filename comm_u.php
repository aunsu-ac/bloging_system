<?php
require 'db_link.php';
session_start();
?>
<?php
if (isset($_POST['btn'])) 
{
  $b_id=$_POST['bid'];
  $com=$_POST['com'];
  $fn=$_SESSION['u_fn'];

  $sql="insert into comnt(c_cont,b_id,u_fname,c_date,c_time) values('$com',$b_id,'$fn',curdate(),curtime())";

  $r=mysqli_query($cnt,$sql);
      if($r==1)
        //echo "Sign-up sucessfully";
        header("Location: home_u.php?msg=Comment Posted");
      else 
        header("Location: home_u.php?msg=Failed to Upload the blog");
}

?>