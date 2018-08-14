  <?php
           include 'dbconnect.php';
   		   $db=new dbconnect();
          session_start();
		  $userlevel=$_SESSION['userlevel'];
		  $var_leave_date=$_POST['txt_leave'];
		  $var_leave_date_upto=$_POST['txt_leave_upto'];
	  if($userlevel==2)
		  {
				$username=$_SESSION['username'];
				$dctr="select id,email from doctor where email='$username'";
				$result=mysql_query($dctr)or die(mysql_error());
				$resu=mysql_fetch_array($result);
				$dctr_id=$resu['id'];
		  }
	  elseif($userlevel==3)
		  {
				$dctr_id=ucwords($_POST['slb_doctor_id']);
		  }
	  //$varsql="insert into leave_master (leave_date,doctor_id) values('$var_leave_date','$dctr_id')";
      //$varresult=mysql_query($varsql)or die(mysql_error());
	  $dt=date('Y-m-d',strtotime($var_leave_date."+1 days"));
	  if($var_leave_date!=$var_leave_date_upto)
	  {
	  	$dt=date('Y-m-d',strtotime($var_leave_date."+1 days"));
		while($dt!=$var_leave_date_upto)
		{
		$varsql="insert into leave_master (leave_date,doctor_id) values('$dt','$dctr_id')";
      $varresult=mysql_query($varsql)or die(mysql_error());
	  $dt=date('Y-m-d',strtotime($dt."+1 days"));
	  	
		}
	  }
       echo '<script>window.location = "leave_master_select.php";</script>';
      ?>
