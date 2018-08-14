      <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel'];
	  $username=$_SESSION['username'];
	 $id=$_POST['txt_patient_name'];
	  ?>
<html>
<head><center>
<h2><b>Appoinment Details</h2>
</center></head>
<body>
 
  <?php

   if($userlevel==3)
	  { 
	  $varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name from appoinment,patient_master,doctor where appoinment.patient_master_id=patient_master.id and appoinment.doctor_id=doctor.id and appoinment.patient_master_id='$id'  ";
	  }
      $varresult=mysql_query($varsql)or die(mysql_error());
	  
	
      ?>
          <div align="center">
 

      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
         
          <td><b>Doctor</b></td>
          <td><b>Appointment Date</b></td>
          <td><b>Appointment Time</b></td>
          <td><b>Description</b></td>
          <td><b>Token</b></td>
		  <td><b>Details</b></td>
  <?php
    if($userlevel==3)
      {
  ?>
          <td><b>Files</b></td>
		  
  <?php
  } ?>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td align="center"><?php echo  date("d/m/Y",strtotime($row['app_date'])); ?> </td>
                         <td align="center"><?php echo $row['app_time']; ?> </td>
                         <td><?php echo $row['description']; ?> </td>
						  <td align="center"><?php echo $row['token']; ?> </td>
      <?php
    if($userlevel==3)
      {
	   
  ?>     
 			 <td align="center"><a href="Prescription_view.php?mvarid=<?php echo $row[0]; ?>">Details</a></td>  
	<?php
	}	
	?>         
  <?php
    if($userlevel==3)
      {
  ?>
         <td align="center"><a href="Document_Add.php?mvarid=<?php echo $row[0]; ?>">Upload Files</a></td>
  <?php
  } ?>
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
