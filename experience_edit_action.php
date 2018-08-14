<?php
$var_id=$_POST['txt_id'];
$var_doctor_id=$_POST['slb_doctor_id'];
$var_hsptl=$_POST['txt_hsptl'];
$var_location=$_POST['txt_location'];
$var_desig=$_POST['txt_desig'];
$var_frmdt=$_POST['txt_frmdt'];
 $var_todate=$_POST['txt_todate'];
include 'dbconnect.php';
$db=new dbconnect();
 $var3="update experience set doctor_id='$var_doctor_id',hospital_name='$var_hsptl',location='$var_location',designation='$var_desig',from_date='$var_frmdt',to_date='$var_todate' where id='$var_id'";
$var4=mysql_query($var3)or die(mysql_error());
header("location:experience_select.php");
?>