  <?php
  		      include 'dbconnect.php';
      		  $db=new dbconnect();
			  session_start();
			  $userlevel=$_SESSION['userlevel'];
			 
			   $var_appoinment_id=$_POST['slb_appoinment_id'];
         
	  if($userlevel==5)
	  {
	      $var_txt_id=$_POST['txt_id'];
	     $var_medical_lab=$_POST['txt_lab_his'];
	     $medical_lab="update prescription set medical_lab_history='$var_medical_lab' where appoinment_id='$var_txt_id'";
		   $varresult=mysql_query($medical_lab)or die(mysql_error());
	}
	 elseif($userlevel==6)
	  {
	        $var_txt_id=$_POST['txt_id'];
	     $var_medical_store=$_POST['txt_store_his'];
	       $medical_store="update prescription set medical_store_history='$var_medical_store'  where appoinment_id='$var_txt_id'";
		   $varresult=mysql_query($medical_store)or die(mysql_error());
	}
    else
	{
	
          $var_present_illness=ucwords($_POST['txt_present_illness']);
          $var_diagnosis=ucwords($_POST['txt_diagnosis']);
          $var_history=ucwords($_POST['txt_history']);
          $var_investigations=ucwords($_POST['txt_investigations']);
          $var_prescriptions=ucwords($_POST['txt_prescriptions']);
          $var_remarks=ucwords($_POST['txt_remarks']);
      $varsql="insert into prescription (appoinment_id,present_illness,diagnosis,history,investigations,prescriptions,remarks) values('$var_appoinment_id','$var_present_illness','$var_diagnosis','$var_history','$var_investigations','$var_prescriptions','$var_remarks')";
	    $varresult=mysql_query($varsql)or die(mysql_error());
	
	}
	  		$var_status="select * from appoinment";
		 $var_status_result=mysql_query($var_status)or die(mysql_error());
		 $var_status_result1=mysql_fetch_array($var_status_result);
		 $var_update="update appoinment set status=1 where id='$var_appoinment_id'";
		$var_status_update=mysql_query($var_update)or die(mysql_error());
      echo '<script>window.location = "home.php";</script>';
      ?>
