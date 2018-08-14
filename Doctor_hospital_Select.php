      <?php include 'aheader.php';
	  include 'dbconnect.php';
      $db=new dbconnect(); ?>
<html>
<head>
<h2><b>     Doctor Hospital Details</h2>
</head>
<body>
  <?php
    $userlevel=$_SESSION['userlevel'];
	$username=$_SESSION['username'];
	$var_id1=$_GET['slb_hospital_id'];
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
              <b> <center><font color="#009900">Approved</font></center> </b>
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
      if($userlevel==3)
   {
	   $var_hsptl="select id,email from hospital where email='$username'";
			$var_hsptl1=mysql_query($var_hsptl);
		 	$var_result=mysql_fetch_array($var_hsptl1);
			$var_hospital_id=$var_result['id'];
		 $varsql="Select doctor_hospital.*,doctor_time.timing_name,doctor.doctor_name,hospital.hospital_name,designation.designation_name,department.department_name from doctor_time,doctor_hospital,doctor,hospital,designation,department where doctor_hospital.designation_id=designation.id and doctor_hospital.department_id=department.id and  doctor_hospital.doctor_id=doctor.id and doctor_hospital.hospital_id=hospital.id and  doctor_hospital.doctor_time_id=doctor_time.id and doctor_hospital.hospital_id='$var_hospital_id' ";
		}
		 if($userlevel==2)
		{
			   $var_hsptl="select hospital_id from doctor_hospital where id='$var_id1'";
			$var_hsptl1=mysql_query($var_hsptl);
		 	$var_result=mysql_fetch_array($var_hsptl1);
			$var_hospital_id=$var_result['id'];
		  $varsql="Select doctor_hospital.*,doctor_time.timing_name,doctor.doctor_name,hospital.hospital_name,designation.designation_name,department.department_name from doctor_time,doctor_hospital,doctor,hospital where doctor_hospital.designation_id=designation.id and doctor_hospital.department_id=department.id and  doctor_hospital.doctor_id=doctor.id and doctor_hospital.hospital_id=hospital.id and  doctor_hospital.doctor_time_id=doctor_time.id ";
		}
		 if($userlevel==1)
		{
			   $var_hsptl="select hospital_id from doctor_hospital where id='$var_id1'";
			$var_hsptl1=mysql_query($var_hsptl);
		 	$var_result=mysql_fetch_array($var_hsptl1);
			$var_hospital_id=$var_result['id'];
		  $varsql="Select doctor_hospital.*,doctor_time.timing_name,doctor.doctor_name,hospital.hospital_name,designation.designation_name,department.department_name from doctor_time,doctor_hospital,doctor,hospital where doctor_hospital.designation_id=designation.id and doctor_hospital.department_id=department.id and doctor_hospital.doctor_id=doctor.id and doctor_hospital.hospital_id=hospital.id and  doctor_hospital.doctor_time_id=doctor_time.id ";
		}
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
	  <?php
	      if($userlevel==3||$userlevel==2)
      {
  ?>
      
      <div align="center"><b><a href="Doctor_hospital_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Doctor</b></td>
          <td align="center"><b>Hospital</b></td>
          <td align="center"><b>Doctor Time</b></td>
          <td align="center"><b>Day Name</b></td>
          <td align="center"><b>Designation</b></td>
          <td align="center"><b>Department</b></td>
            
		
		<?php
    if($userlevel==1||$userlevel==3)
      {
	  ?>
		  <td align="center"> <b> Status </b></td>
		   <?php
   }
	  ?>

		  
		  
  <?php
    if($userlevel==3)
      {
  ?>
          
          <td align="center"><b>Delete</b></td>
  <?php
  } ?>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td><?php echo $slno; ?></td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td><?php echo $row['hospital_name']; ?> </td>
						 <td><?php echo $row['timing_name']; ?> </td>
                         <td><?php echo $row['day_name']; ?> </td>
						<td><?php echo $row['designation_name']; ?> </td>
						 <td><?php echo $row['department_name']; ?> </td>
                          
						  <?php
    if($userlevel==1||$userlevel==3)
      {
	  if($row['status']==0)
	  {
	  	?>
		<td align="center"><a href="approve_appoinment.php?mvarid=<?php echo $row[0]; ?>">Approve</a></td>
		
		<?php
	  }
	  elseif($row['status']==1)
	  {
	  ?>
	  <td align="center">Approved</td>
	  <?php
	  }
	  }
  ?>
  <?php
    if($userlevel==3)
      {
  ?>
                         
              <td align="center"><a class="glyphicon glyphicon-trash" href="Doctor_hospital_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
  <?php
  } ?>
  
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
