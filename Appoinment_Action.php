  <?php
  		      include 'dbconnect.php';
      		  $db=new dbconnect();
			  session_start();
			  $username=$_SESSION['username'];
			  $userlevel=$_SESSION['userlevel'];
			 
			
			 
     ?>
	 <?php
		 
		  $var_id=$_POST['txt_id'];
          $var_hsptl_id=$_POST['slb_hsptl_id'];
		  $var_doctor_id=$_POST['slb_doctor_id'];
          $var_app_date=$_POST['txt_app_date'];
          $var_app_time=ucwords($_POST['slb_time_id']);
          $var_description=ucwords($_POST['txt_description']);
		  $var_card_number=$_POST['txt_card_number'];
          $var_card_type=$_POST['txt_card_type'];
          $var_cvv=$_POST['txt_cvv'];
          $var_amount=$_POST['txt_amount'];
          $var_status=0;
		  $var_token=$_POST['txt_token'];
	  $varresult1="select id from patient_master where patient_master.email='$username'";
	  $result=mysql_query($varresult1)or die(mysql_error());
	  $varout1=mysql_fetch_array($result);
	  $var_app_id=$varout1['id'];
	  $varsql="insert into appoinment (patient_master_id,hospital_id,doctor_id,app_date,description,status,token,doctor_time_id,card_number,card_type,cvv,amount) values('$var_app_id','$var_hsptl_id','$var_doctor_id','$var_app_date','$var_description','$var_status','$var_token','$var_app_time','$var_card_number','$var_card_type','$var_cvv','$var_amount')";
      $varresult=mysql_query($varsql)or die(mysql_error());
	 
		
	  echo '<script>window.location = "Appoinment_Select.php";</script>';
?>
  	    
