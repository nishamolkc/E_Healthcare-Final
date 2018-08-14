      <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel'];
	  $username=$_SESSION['username'];
	  $var_dctr="select id,email from doctor where email='$username'";
	   $result=mysql_query($var_dctr)or die(mysql_error());
	   $resu=mysql_fetch_array($result);
	   $dctr_id=$resu['id'];
	   /*  if($userlevel==2)
	  {
	  	$var_dctr="select id,email from doctor where email='$username'";
	   $result=mysql_query($var_dctr)or die(mysql_error());
	   $resu=mysql_fetch_array($result);
	   $dctr_id=$resu['id'];
	   $varsql1="Select leave_master.*,doctor.doctor_name,doctor.id from leave_master,doctor where leave_master.doctor_id=doctor.id";
	  }
	  elseif($userlevel==3)
	  {
	  	$var_hosp="select id,email from hospital where email='$username'";
	   $result=mysql_query($var_dctr)or die(mysql_error());
	   $resu=mysql_fetch_array($result);
	   $hosp_id=$resu['id'];
	   $varsql="Select leave_master.*,doctor.doctor_name,doctor.id from leave_master,doctor where leave_master.doctor_id=doctor.id";
	  }*/
	  
	 ?>
	 
<html>
<head><center>
<h2><b>     Leave Details</h2>
</center></head>
<body>

  <?php
    
      
      $varsql="Select leave_master.*,doctor.doctor_name,doctor.id from leave_master,doctor where leave_master.doctor_id=doctor.id and doctor.id!='$dctr_id'";
	 /* if($userlevel==2)
	  {
	  $varsql="Select leave_master.*,doctor.doctor_name,doctor.id from leave_master,doctor where leave_master.doctor_id=doctor.id and doctor.id='$dctr_id' ";
	  }*/
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Leave Date</b></td>
		  <td><b>Doctor</b></td>
		   
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td align="center"><?php echo $row['leave_date']; ?> </td>
						 <td><?php echo $row['doctor_name']; ?> </td>
                </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
