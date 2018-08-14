<?php
error_reporting(0);
include "dbconnect.php";
$db=new dbconnect();
$cnt=0;
$cn=0;
$cn1=0;
$id=$_POST['id'];
$dt=$_POST['dt'];
$doctor=$_POST['doctor'];
$hospital=$_POST['hospital'];
session_start();
error_reporting(0);
$username=$_SESSION['username'];
$var_email="select id,email from patient_master where email='$username'";
$var_email1=mysql_query($var_email);
$var_mail3=mysql_fetch_array($var_email1);
$var_patient=$var_mail3['id'];
$varsql2="select * from appoinment where doctor_id='$doctor' and app_date='$dt' and hospital_id='$hospital' and doctor_time_id='$id' and patient_master_id='$var_patient'";
$var_sql3=mysql_query($varsql2);
$var_sql_result=mysql_fetch_array($var_sql3);
$cnt=mysql_num_rows($var_sql3);
//$tokeno=1;
if($cnt>0)
{
	$tokeno="Already Took Appointment";
}
else
{
$cast1="select doctor_id from  leave_master where leave_date='$dt' and doctor_id='$id'";
	$res1=mysql_query($cast1);
	$cn1=mysql_num_rows($res1);
	if($cn1>=1)
	{
		$tokeno="Doctor on Leave";
	}
	else
	{
  $cast="select max(token) as tok from appoinment where doctor_id='$doctor' and app_date='$dt' and hospital_id='$hospital' and doctor_time_id='$id'";
	$res=mysql_query($cast);
		$cn=mysql_num_rows($res);
		if($cn==1 && $cn1!=1)
		{
			$data1=mysql_fetch_array($res);
					$tokeno=$data1[0]+1;
					if($tokeno>30)
					{
					$tokeno="Count Over";
					}
		}
	
      }
	  }
	
	  echo $tokeno;

	    ?>