<!--<!--CHANGE PASSWORD ACTION --> -->
<?php
include "dbconnect.php";
$db=new dbconnect();
session_start();
$username=$_SESSION['username'];

$Cpwd=$_POST['txt1'];
$Npwd=$_POST['txt2'];
$CnfrmPwd=$_POST['txt3'];
  $a= "select * from login where username='$username' and password='$Cpwd'";
$b=mysql_query($a);
$c=mysql_num_rows($b);
if($c<1)
{
 header('Location:change_pwd.php');
}
else
{
  $a=" update login set password='$Npwd' where username='$username'";
$b=mysql_query($a);
 header('Location:change_pwd.php?status=1');
}
?>