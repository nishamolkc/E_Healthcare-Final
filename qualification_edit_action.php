<?php
$var_des=$_POST['txt_des'];
$var_qualification=$_POST['txt_qualification'];
$var2=$_POST['txt_id'];
include'dbconnect.php';
$db=new dbconnect();
 $var3="update qualification set qualification='$var_qualification',description='$var_des' where id='$var2'";
$var4=mysql_query($var3)or die(mysql_error());
header("Location:qualification_select.php");
?>