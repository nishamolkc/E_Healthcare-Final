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
echo $var3="insert into experience (doctor_id,hospital_name,location,designation,from_date,to_date)values('$var_doctor_id','$var_hsptl','$var_location','$var_desig','$var_frmdt','$var_todate')";
$var4=mysql_query($var3)or die(mysql_error());
header("location:experience_select.php");
?>