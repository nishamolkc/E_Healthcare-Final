  <?php
	  
	            $var_department_id=$_POST['slb_department_id'];
      include 'dbconnect.php';
      $db=new dbconnect();
	 session_start();
	   $userlevel=$_SESSION['userlevel'];
	   $username=$_SESSION['username'];
	  	   $varsql="select id,email,hospital_name from hospital where email='$username'";
	   $var_result1=mysql_query($varsql);
	   $var_hsptl1=mysql_fetch_array($var_result1);
	   	    $var_hsptl=$var_hsptl1['id'];
	  
	  if($userlevel!=3)
	  {

	$var_hospital_id=$_POST['slb_hospital_id'];
      $varsql="insert into hospital_department (hospital_id,department_id) values('$var_hospital_id','$var_department_id')";
	  }
	  else
	  {
      $varsql="insert into hospital_department (hospital_id,department_id) values('$var_hsptl','$var_department_id')";	  
	  }
      $varresult=mysql_query($varsql)or die(mysql_error());
    echo '<script>window.location = "Hospital_department_Select.php";</script>';
      ?>
