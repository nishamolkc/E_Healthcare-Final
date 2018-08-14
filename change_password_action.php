<?php
include 'dbconnect.php';
$db=new dbconnect();
session_start();
$uname=$_SESSION['username'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];
   $sel="SELECT * FROM login WHERE username='$uname' AND password='$cpass'";
$ans=mysql_query($sel);
  $count=mysql_num_rows($ans);
if($count==1)
{
      $upd="UPDATE login SET password='$npass' WHERE username='$uname'";
    $upd_ans=mysql_query($upd);
    header("location:home.php?msg=1");
    
}
else
{
     header("location:change_pwd.php?msg=2");
}
?>