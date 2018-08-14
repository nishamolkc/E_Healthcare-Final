  <?php
  		      include 'dbconnect.php';
      		  $db=new dbconnect();
			  session_start();
			  $username=$_SESSION['username'];
			  $userlevel=$_SESSION['userlevel'];			 
		  $var_old_app_id=$_POST['txt_old_app_id'];
          $var_hsptl_id=$_POST['slb_hsptl_id'];
		  $var_doctor_id=$_POST['slb_doctor_id'];
          $var_app_date=$_POST['txt_app_date'];
          $var_app_time=ucwords($_POST['slb_time_id']);
          $var_description=ucwords($_POST['txt_description']);
          $var_status=0;
		  $var_token=$_POST['txt_token'];
		 $dt=date('Y-m-d');
		$var_patient_master_id=$_POST['txt_patient_id'];
		$varsql="insert into appoinment (patient_master_id,hospital_id,doctor_id,app_date,description,status,token,doctor_time_id) values('$var_patient_master_id','$var_hsptl_id','$var_doctor_id','$var_app_date','$var_description','$var_status','$var_token','$var_app_time')";
      $varresult=mysql_query($varsql)or die(mysql_error());
		  $app_refer="select max(id) from appoinment";
		  $var_refer=mysql_query($app_refer);
		  $var_rslt=mysql_fetch_array($var_refer);
		  $var_new_id=$var_rslt[0];
		$varsql_refer="insert into reference_master (reference_date,appoinment_id,reason,refer_appoinment_id) values('$dt','$var_old_app_id','$var_description','$var_new_id');";
		$var_refer1=mysql_query($varsql_refer)or die(mysql_error());
		$varsql="update appoinment set status=1 where id='$var_old_app_id'";
		$var_result=mysql_query($varsql)or die(mysql_error());
	  echo '<script>window.location = "Appoinment_Select.php";</script>';
?>
  	    
