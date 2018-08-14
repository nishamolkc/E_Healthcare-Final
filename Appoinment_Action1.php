  <?php
  		      include 'dbconnect.php';
      		  $db=new dbconnect();
			  session_start();
			  $username=$_SESSION['username'];
			  $userlevel=$_SESSION['userlevel'];
			 
			 
     ?>
	 <?php
		 
		 echo $var_id=$_POST['txt_id'];
          $var_hsptl_id=$_POST['slb_hsptl_id'];
		  $var_doctor_id=$_POST['slb_doctor_id'];
          $var_app_date=$_POST['txt_app_date'];
          $var_app_time=ucwords($_POST['slb_time_id']);
          $var_description=ucwords($_POST['txt_description']);
          $var_status=0;
		  $var_token=$_POST['txt_token'];
		  
	  if($userlevel==4)
      {
	  $varresult1="select id from patient_master where patient_master.email='$username'";
	  $result=mysql_query($varresult1)or die(mysql_error());
	  $varout1=mysql_fetch_array($result);
	  $var_app_id=$varout1['id'];
	  }
	  if($userlevel==2)
	  {
/* echo $varresult1="select id from appoinment  ";
	  $result=mysql_query($varresult1)or die(mysql_error());
	  $varout1=mysql_fetch_array($result);
	echo  $var_patient_master_id=$varout1['id'];
	   echo $varresult1="select appoinment.id,patient_master.patient_name from appoinment,patient_master where appoinment.patient_master_id=patient_master.id and 	patient_master_id='$var_patient_master_id' ";
	   $varresult2=mysql_query($varresult1);
	$varout1=mysql_fetch_array($varresult2);
	  $var_patient_master_id=$varout1['id']; */
	  $var_app_id=$_POST['txt_app_id'];
	  }
	 
      $varsql="insert into appoinment (patient_master_id,hospital_id,doctor_id,app_date,description,status,token,doctor_time_id) values('$var_app_id','$var_hsptl_id','$var_doctor_id','$var_app_date','$var_description','$var_status','$var_token','$var_app_time')";
      $varresult=mysql_query($varsql)or die(mysql_error());
	  echo '<script>window.location = "Appoinment_Select.php";</script>';
?>
  	    
