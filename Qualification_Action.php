<?php
$var_id=$_POST['txt_id'];
$var_qualificaton=$_POST['txt_qualificaton'];
$var_des=$_POST['txt_des'];
include'dbconnect.php';
$db=new dbconnect();
$var_sql="insert into qualification(qualification,description)values('$var_qualificaton','$var_des')";
$var4=mysql_query($var_sql)or die(mysql_error());
header("Location:qualification_select.php");
?>