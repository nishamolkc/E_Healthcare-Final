<?php
include "dbconnect.php";
$db=new dbconnect();
$id=$_POST['id'];
$dt=$_POST['dt'];
//$tokeno=1;
$cn=0;
	$cn1=0;
$cast1="select doctor_id from  leave_master where leave_date='$dt' and doctor_id='$id'";
	$res1=mysql_query($cast1);
	$cn1=mysql_num_rows($res1);
	if($cn1>=1)
	{
		$tokeno="Doctor on Leave";
	}
	else
	{
  $cast="select max(token) as tok from appoinment where doctor_id='$id' and app_date='$dt'";
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
	 // echo $cast1;
    echo $tokeno;

	    ?>