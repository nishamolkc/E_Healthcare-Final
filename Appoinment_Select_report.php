      <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	   $status=$_POST['txt_status'];
	   $var_id=$_POST['slb_patient_master_id'];?>
<html>
<head><center>
<h2><b>Appoinment Details</h2>
</center></head>
<body>
 
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

      $varsql="Select appoinment.*, patient_master.patient_name,patient_master.id,doctor.doctor_name from appoinment,patient_master,doctor where appoinment.patient_master_id=patient_master.id and appoinment.doctor_id=doctor.id and appoinment.status='$status' ";
	  if($var_id>0)
	  {
	  $varsql=$varsql." and patient_master.id='$var_id'";
	  }
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">

      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
          <td><b>Doctor Name</b></td>
          <td><b>Appointment Date</b></td>
          <td><b>Description</b></td>
          <td><b>Status</b></td>
		  <td><b>Token</b></td>
 
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td align="center"><?php echo  date("d/m/Y",strtotime($row['app_date'])); ?> </td>
                         <td><?php echo $row['description']; ?> </td>
                         <td align="center"><?php echo $row['status']; ?> </td>
						  <td align="center"><?php echo $row['token']; ?> </td>
 
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
