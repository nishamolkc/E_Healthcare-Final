  <?php
        
		  $var_time_id=$_POST['slb_doctor_time_id'];
		  $var_day_id=$_POST['txt_day_type'];
         $var_designation_id=$_POST['slb_designation_id'];
		 $var_department_id=$_POST['slb_department_id'];
      include 'dbconnect.php';
      $db=new dbconnect();
	  	    session_start();
			$userlevel=$_SESSION['userlevel'];
			$username=$_SESSION['username'];
		
		
	   if($userlevel==2)
			{
			
			 $var_hospital_id=$_POST['slb_hospital_id'];
			 		    $var_designation_id=$_POST['slb_designation_id'];
          $var_department_id=$_POST['slb_department_id'];
			  $var_dctrl="select id,email from doctor where email='$username'";
			$var_dctr2=mysql_query($var_dctrl);
			$var_result1=mysql_fetch_array($var_dctr2);
			$var_doctor_id=$var_result1['id'];
      $varsql="insert into doctor_hospital (doctor_id,hospital_id,doctor_time_id,day_name,designation_id,department_id) values('$var_doctor_id','$var_hospital_id','$var_time_id','$var_day_id','$var_designation_id','$var_department_id')";
	  }
	  elseif($userlevel==3)
	  {
	   $var_doctor_id=$_POST['slb_doctor_id'];
	  $var_hsptl="select id,email from hospital where email='$username'";
			$var_hsptl1=mysql_query($var_hsptl);
			$var_result=mysql_fetch_array($var_hsptl1);
			$var_hospital_id=$var_result['id'];
	    $varsql="insert into doctor_hospital (doctor_id,hospital_id,doctor_time_id,day_name,designation_id,department_id,status) values('$var_doctor_id','$var_hospital_id','$var_time_id','$var_day_id','$var_designation_id','$var_department_id',0)";
	  }
	  	
			else
			{
			 $var_doctor_id=$_POST['slb_doctor_id'];
			 $var_hospital_id=$_POST['slb_hospital_id'];
      $varsql="insert into doctor_hospital (doctor_id,hospital_id,doctor_time_id,day_name,designation_id,department_id) values('$var_doctor_id','$var_hospital_id','$var_time_id','$var_day_id','$var_designation_id','$var_department_id')";
	  }
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Doctor_hospital_Select.php";</script>';
      ?>
