      <?php include 'aheader.php';
	        include 'dbconnect.php';
     	    $db=new dbconnect();
			$username=$_SESSION['username'];
			$userlevel=$_SESSION['userlevel'];
			 $var_id=$_GET['mvarid']; 
			 $var_doctor="select id,doctor_name,email from doctor where email='$username'";
			 $dctr_result=mysql_query($var_doctor);
			 $result=mysql_fetch_array($dctr_result);
			 $id_dctr=$result['id'];
			 $var_patient="select id,patient_name,email from patient_master where email='$username'";
			 $dctr_result1=mysql_query($var_patient);
			 $result1=mysql_fetch_array($dctr_result1);
			 $id_patient=$result1['id']; ?>
<html>
<head>
<h2><b>     Prescription Details</h2>
</head>
<body>
  <?php
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
    if($userlevel==5||$userlevel==6)
      {
 
	  $varsql="select appoinment.id as appid,appoinment.app_date,patient_master.patient_name,doctor.doctor_name,doctor.id,prescription.present_illness  from appoinment,patient_master,doctor,prescription where appoinment.patient_master_id=patient_master.id and prescription.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
	  }
      ?>
	    <?php
    if($userlevel==2)
      {
 
	   $varsql="select appoinment.id as appid,appoinment.app_date,patient_master.patient_name,patient_master.id,doctor.doctor_name,doctor.id,prescription.present_illness,prescription.medical_lab_history,prescription.medical_store_history  from appoinment,patient_master,doctor,prescription where appoinment.patient_master_id=patient_master.id and prescription.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id and doctor.id='$id_dctr'";
      $varresult=mysql_query($varsql)or die(mysql_error());
	  }
      ?>
	  <?php
    if($userlevel==4)
      {
 
	   $varsql="select appoinment.id as appid,appoinment.app_date,patient_master.patient_name,patient_master.id,doctor.doctor_name,doctor.id,prescription.present_illness,prescription.medical_lab_history,prescription.medical_store_history  from appoinment,patient_master,doctor,prescription where appoinment.patient_master_id=patient_master.id and prescription.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id and patient_master.id='$id_patient'";
      $varresult=mysql_query($varsql)or die(mysql_error());
	  }
      ?>
          <div align="center">
  <?php
    if($userlevel==1)
      {
  ?>
      <div align="center"><b><a href="Prescription_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Appoinment ID</b></td>
		  <td align="center"><b>Patient Name</b></td>
          <td align="center"><b>Appointment Date</b></td>
          <td align="center"><b>Doctor Name</b></td>
          <td align="center"><b>Present Illness</b></td>
		  
		  <?php
		  if($userlevel==2 )
		  {
		  ?>
		   <td align="center"><b>Lab&Store </b></td>
           
		  <?php
		  }
		  ?>
          <td align="center"><b>Details</b></td>
		 
		       <?php
    if($userlevel!=6)
      {
  ?>
		  <td align="center"><b>History</b></td>
		       <?php
}
  ?>
		    <?php
    if($userlevel==5)
      {
  ?>
		   <td align="center"><b>Add Files</b></td>
		     <?php
}
  ?>
          
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td align="center"><?php echo $row['appid']; ?> </td>
						 <td><?php echo $row['patient_name']; ?> </td>
						 <td align="center"><?php echo $row['app_date']; ?> </td>
						
						 <td><?php echo $row['doctor_name']; ?> </td>
					    <td><?php echo  $row['present_illness']; ?> </td>
							  <?php
		  if($userlevel==2 )
		  {
		  ?>
		  
		  <td align="center"><a href="Prescription_view.php?mvarid=<?php echo $row['appid']; ?>">Report</a></td>
		    
		  <?php
		  }
		  ?>
						  
   <?php
    if($userlevel==2)
      {
  ?>   
						 
						 <td align="center"><a href="Prescription_Edit.php?mvarid=<?php echo $row['appid']; ?>">Details</a></td>
  <?php
		}
		else
		{
  ?>
   <td align="center"><a href="Prescription_view.php?mvarid=<?php echo $row['appid']; ?>">Details</a></td>
        <?php
		}
  ?>
		       <?php
    if($userlevel!=6)
      {
  ?>
     <td align="center"><a href="Document_Select.php?mvarid=<?php echo $row['appid']; ?>">Documents</a></td>
	    <?php
}
  ?> 

   <?php
    if($userlevel==5)
      {
  ?>   
						 
						 <td align="center"><a href="document_add.php?mvarid=<?php echo $row['appid']; ?>">Add New</a></td>
  <?php
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
