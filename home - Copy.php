<?php include 'aheader.php';
 include 'dbconnect.php';
      $db=new dbconnect();
	   ?>
<?php
if($ulevel==1)//***********ADMIN
            {
  ?>
  
  <?php
			}
elseif($ulevel==2)//***********ADMIN
            {
     
      $varsql="Select appoinment.*, patient_master.patient_name,hospital.hospital_name,doctor.doctor_name,doctor_time.timing_name from appoinment,patient_master,hospital,doctor,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_id=doctor.id and appoinment.doctor_time_id=doctor_time.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
          <td><b>Hospital</b></td>
          <td><b>Doctor</b></td>
          <td><b>App Date</b></td>
          <td><b>Token</b></td>
          <td><b>Doctor Time</b></td>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                         <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td><?php echo  date("d/m/Y",strtotime($row['app_date'])); ?> </td>
                         <td><?php echo $row['token']; ?> </td>
                         <td><?php echo $row['timing_name']; ?> </td>
                         
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</div>
			  <?php
			  }
			 elseif($ulevel==3)//***********ADMIN
            {
              
			   $varsql="Select appoinment.*, patient_master.patient_name,hospital.hospital_name,doctor.doctor_name,doctor_time.timing_name from appoinment,patient_master,hospital,doctor,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_id=doctor.id and appoinment.doctor_time_id=doctor_time.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
          <td><b>Hospital</b></td>
          <td><b>Doctor</b></td>
          <td><b>App_date</b></td>
          <td><b>Token</b></td>
          <td><b>Doctor_time</b></td>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                         <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td><?php echo  date("d/m/Y",strtotime($row['app_date'])); ?> </td>
                         <td><?php echo $row['token']; ?> </td>
                         <td><?php echo $row['timing_name']; ?> </td>
                         
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</div>
			  <?php
			  }
			  elseif($ulevel==4)//***********ADMIN
            {
               
			  <div align="center"><b><a href="Appoinment_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
			   $varsql="Select appoinment.*, patient_master.patient_name,hospital.hospital_name,doctor.doctor_name,doctor_time.timing_name from appoinment,patient_master,hospital,doctor,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_id=doctor.id and appoinment.doctor_time_id=doctor_time.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
          <td><b>Hospital</b></td>
          <td><b>Doctor</b></td>
          <td><b>App_date</b></td>
          <td><b>Token</b></td>
          <td><b>Doctor_time</b></td>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                         <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td><?php echo  date("d/m/Y",strtotime($row['app_date'])); ?> </td>
                         <td><?php echo $row['token']; ?> </td>
                         <td><?php echo $row['timing_name']; ?> </td>
                         
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</div>
			  <?php
			  }
			  elseif($ulevel==5)//***********ADMIN
            {
               
			   $varsql="Select appoinment.*, patient_master.patient_name,hospital.hospital_name,doctor.doctor_name,doctor_time.timing_name from appoinment,patient_master,hospital,doctor,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_id=doctor.id and appoinment.doctor_time_id=doctor_time.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
          <td><b>Hospital</b></td>
          <td><b>Doctor</b></td>
          <td><b>App_date</b></td>
          <td><b>Token</b></td>
          <td><b>Doctor_time</b></td>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                         <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td><?php echo  date("d/m/Y",strtotime($row['app_date'])); ?> </td>
                         <td><?php echo $row['token']; ?> </td>
                         <td><?php echo $row['timing_name']; ?> </td>
                         
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</div>
			  <?php
			  }
			  ?>
<?php include 'footer.php'; ?>