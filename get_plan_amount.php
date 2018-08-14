<?php
include 'Database/Login.php';
$con= new Login();
$id=$_POST['id'];
$var="select amount from plandetails where plan_id='$id'";
$ans=mysql_query($var);
$data=mysql_fetch_array($ans);
echo $data[0];
?>