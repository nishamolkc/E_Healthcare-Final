      <?php include 'aheader.php';
	  include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel'];
	  $username=$_SESSION['username']; 
	  $doctor_id=$_POST['slb_doctor_id'];
	  $var_doctor_name="select doctor_name,id from doctor where  id='$doctor_id'";
	  $var_sql=mysql_query($var_doctor_name);
	  $var_sql_result=mysql_fetch_array($var_sql);
	  $id_get=$var_sql_result['id'];
	    $status=$_POST['status']; ?>
<html>
<head>
<h2><b>     Appoinment Details</h2>
</head>
<body>
  <?php
    $userlevel=$_SESSION['userlevel'];
  ?>
  <?php
    if(isset($_GET['pp']))
      {
        if($_GET['pp']==1)
          { ?>
              <b> <center><font color="#009900">Updated</font></center> </b>
          <?php   }
        if($_GET['pp']==2)
          { ?>
              <b> <center><font color="#009900">Deleted</font></center> </b>
          <?php   }
        if($_GET['pp']==3)
          { ?>
              <b> <center><font color="#009900">Error</font></center> </b>
          <?php   }
      }
  ?>
<script type="text/javascript">
function DeleteChecked()
{
 var  answer = confirm("Are you sure you   to Delete ?")
if (answer){
 document.messages.submit();
}
return false;
}
</script>
      <?php
     if($userlevel==2)
   {
       $varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name,hospital.hospital_name,doctor_time.id,doctor_time.timing_name from appoinment,patient_master,doctor,hospital,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_time_id=doctor_time.id and appoinment.doctor_time_id=doctor_time.id and appoinment.doctor_id=doctor.id and doctor.email='$username'";
	  }
	  elseif($userlevel==4)
	  {
	    $varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name,hospital.hospital_name,doctor_time.id,doctor_time.timing_name from appoinment,patient_master,doctor,hospital,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_time_id=doctor_time.id and appoinment.doctor_id=doctor.id and patient_master.email='$username'";
	   }
	    elseif($userlevel==3)
	  {
	      $varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name,doctor.id,hospital.hospital_name,doctor_time.id,doctor_time.timing_name from appoinment,patient_master,doctor,hospital,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_time_id=doctor_time.id and appoinment.doctor_id=doctor.id and doctor.id='$id_get'";
	   }
	  else
	  { $varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name,hospital.hospital_name,doctor_time.id,doctor_time.timing_name from appoinment,patient_master,doctor,hospital,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_time_id=doctor_time.id and appoinment.doctor_id=doctor.id ";
	  }
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  <?php
    if($userlevel==4)
      {
  ?>
      <div align="center"><b><a href="Appoinment_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Patient Name</b></td>
          <td align="center"><b>Hospital</b></td>
          <td align="center"><b>Doctor</b></td>
          <td align="center"><b>Appointment date</b></td>
          <td align="center"><b>Time</b></td>
		  <td align="center"><b>Token</b></td>
		  <td align="center"><b>Description</b>
          <!--<td align="center"><b>Card_number</b></td>
          <td align="center"><b>Card_type</b></td>
          <td align="center"><b>Cvv</b></td>
          <td align="center"><b>Amount</b></td>-->
		  <?php
    if($userlevel==2)
      {
  ?>
          <td align="center"><b>Consult</b></td>

   <?php
}
  ?>
  
  <?php
    if($userlevel==4)
      {
  ?>
          <td align="center"><b>Edit</b></td>
          <td align="center"><b>Delete</b></td>
  <?php
  } ?>
  <?php
    if($userlevel==2||$userlevel==4)
      {
  ?>
          <td align="center"><b>History</b></td>

   <?php
}
  ?>
     <?php
    if($userlevel==2)
      {
  ?>
          <td align="center"><b>Refer</b></td>

   <?php
}
  ?>
  <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             {
			 $appid=$row[0];
			 $cnt=0;
			 $app_refer="select * from reference_master where appoinment_id='$appid'";
		  $var_refer=mysql_query($app_refer);
		  $cnt=mysql_num_rows($var_refer); 
			 ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
						 <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
						 <td align="center"><?php echo $row['app_date']; ?> </td>
						  <td align="center"><?php echo $row['timing_name']; ?> </td>
						<td align="center"><?php echo $row['token']; ?> </td>
                         <td><?php echo $row['description']; ?> </td>
						  
      <?php
    if($userlevel==2)
      {
	   if($row['status']==0)
	  {
  ?>     
  				<td align="center"><a href="Prescription_Add.php?mvarid=<?php echo $row[0]; ?>">Consult</a></td>
    <?php
   }
   elseif($row['status']==1)
   {
   ?>
   <td align="center"> Consulted </td>
   <?php
   }
   else
   {
  ?>     
 			 <td align="center"><a href="Prescription_view.php?mvarid=<?php echo $row[0]; ?>">Details</a></td>  
	<?php
	}	
	}	 
	?>         
  <?php
    if($userlevel==4)
      {
  ?>
                         <td align="center"><a class="glyphicon glyphicon-pencil" href="Appoinment_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Appoinment_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
  <?php
  } ?>
   <?php
       if($userlevel==2||$userlevel==4)
      {
	  
  ?>     
  				<td align="center"><a href="Document_Select.php?mvarid=<?php echo $row[0]; ?>">History</a></td>
    <?php
   }
   ?>
   <?php
       if($userlevel==2)
      {
	  if($cnt==0)
	  {
  ?>     
  				<td align="center"><a href="Appoinment_Add_doctor.php?mvarid=<?php echo $row[0]; ?>">Refer</a></td>
    <?php
	}
	elseif($cnt>0)
	{
	?>
	<td align="center">Refered</td>
	<?php
	}
   }
   ?>
    
               </tr>
          <?php
          $slno++;
          }
          ?>
  
     
</table>
</div>
</body>
</html>
      <?php include 'footer.php'; ?>
