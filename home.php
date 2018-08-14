<?php
include"aheader.php";
include 'dbconnect.php';
  $db=new dbconnect();
  $username=$_SESSION['username'];
  $userlevel=$_SESSION['userlevel'];
   
    if(isset($_GET['msg']))
      {
        if($_GET['msg']==1)
          { ?>
              <b> <center><font color="#009900">Password Changed</font></center> </b>
          <?php   }
         
     }
			if($userlevel==2)
			{
				 $username=$_SESSION['username'];
				$sql="select * from doctor where email='$username'";
				$db=mysql_query($sql);
				$row=mysql_fetch_array($db);
				  $doctor_id=$row[0];
				  $doctor_pic=$row['image_path'];
				   
						 
				  
				  //$sqlcon="Select connection_master.*,agency.agency_name,connection_type.connection_name,customer.customer_name from connection_master,agency,connection_type,customer where connection_master.agency_id=agency.id and connection_master.connection_type_id=connection_type.id and connection_master.customer_id=customer.id and customer.id='$custid'";
				//$dbcon=mysql_query($sqlcon);
				 // $varsqlcust="Select * from refill_master where consumer_no in (select consumer_no from connection_master where customer_id='$custid') order by book_date,id desc  ";
				 // $varresultcust=mysql_query($varsqlcust)or die(mysql_error());
				  
			 ?>
			 
			<div class="home-page-container column">
				<div class="left-container">
					<div class="profile-photo">
						<a id="profile-photo" href="<?php echo $doctor_pic; ?>">
							<img src="<?php echo $doctor_pic; ?>" />
						</a>
					</div>
					<div class="profile-info">
					Name :<b> <?php echo $row[1]; ?></b><br />
					House Name :<?php echo $row[2]; ?><br />
				
					<?php
					/*while($rowcon=mysql_fetch_array($dbcon))
					{
					$con_no=$rowcon['consumer_no'];
					$dt2=$rowcon['connection_date'];
					?>
					Consumer No : <b><?php echo $rowcon['consumer_no']; ?></b><br />
					<?php
						$sqlcyl="select consumer_no from second_cylinder where status='D' and consumer_no='$con_no'";
						$dbcyl=mysql_query($sqlcyl);
						$cyl=mysql_num_rows($dbcyl);
					?>
					No of Cylinders : <?php echo $cyl+1; ?><br />
					Type : </td><td><?php echo $rowcon['connection_name']; ?><br />
					<?php
					}*/
					
					?>
					</div>
				</div>
				<div class="right-container">
						 Hi <b> <?php echo ucwords(strtolower($row[1]));  ?></b>, Thanks for being with us...  
						 <?php
						 $dt=date('Y-m-d');
						 $varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name,doctor.id from appoinment,patient_master,doctor where appoinment.patient_master_id=patient_master.id and appoinment.doctor_id=doctor.id and doctor.id='$doctor_id' and  appoinment.app_date=curdate()";
						  $varresult=mysql_query($varsql);
						 // $varresult=mysql_fetch_array($varsql_result);
						 ?>
						<center> <h4>Today's Appoinments</h4></center>
					 <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
          <td><b>Doctor</b></td>
          <td><b>Appointment Date</b></td>
          <td><b>Description</b></td>
          <td><b>Token</b></td>
          <td><b>Consult</b></td>
          <td><b>History</b></td>
          <td align="center"><b>Refer</b></td>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td align="center"><?php echo $row['patient_name']; ?> </td>
                         <td align="center"><?php echo $row['doctor_name']; ?> </td>
						 <td align="center"><?php echo $row['app_date']; ?> </td>
                         <td align="center"><?php echo $row['description']; ?> </td>
						  <td align="center"><?php echo $row['token']; ?> </td>
      <?php
     if($userlevel==2)
      {
	   if($row['status']==0)
	  {
  ?>     
  				<td align="center"><a href="Prescription_Add_home.php?mvarid=<?php echo $row[0]; ?>">Consult</a></td>
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
  				<td align="center"><a href="Document_Select.php?mvarid=<?php echo $row[0]; ?>">History</a></td>
  				<td align="center"><a href="Appoinment_Add_doctor.php?mvarid=<?php echo $row[0]; ?>">Refer</a></td>
    
               </tr>
          <?php
          $slno++;
          }
		  $var1_sql="select id,email from doctor where email='$username'";
		  $var2_sql=mysql_query($var1_sql);
		  $var_sql1=mysql_fetch_array($var2_sql);
		  $var_sql2=$var_sql1['id'];
		  
		   $varsql="Select document.*,appoinment.patient_master_id,appoinment.doctor_id,doctor.id from document,appoinment,doctor where document.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id and appoinment.doctor_id='$var_sql2' order by document.id desc limit 10";
		    $varresult=mysql_query($varsql)or die(mysql_error());
          ?>	 
				
	</table>

			</div>
			</centre>
			
			<?php
			} 
			elseif($userlevel==4)
			{
				 $username=$_SESSION['username'];
				$sql="select * from patient_master where email='$username'";
				$db=mysql_query($sql);
				$row=mysql_fetch_array($db);
				  $patient_pic=$row[0];
				  $patient_pic=$row['image_path'];
				  
				  //$sqlcon="Select connection_master.*,agency.agency_name,connection_type.connection_name,customer.customer_name from connection_master,agency,connection_type,customer where connection_master.agency_id=agency.id and connection_master.connection_type_id=connection_type.id and connection_master.customer_id=customer.id and customer.id='$custid'";
				//$dbcon=mysql_query($sqlcon);
				 // $varsqlcust="Select * from refill_master where consumer_no in (select consumer_no from connection_master where customer_id='$custid') order by book_date,id desc  ";
				 // $varresultcust=mysql_query($varsqlcust)or die(mysql_error());
				  
			 ?>
			<div class="home-page-container column">
				<div class="left-container">
					<div class="profile-photo">
						<a id="profile-photo" href="<?php echo $patient_pic; ?>">
							<img src="<?php echo $patient_pic; ?>" />
						</a>
					</div>
					<div class="profile-info">
					Name :<b> <?php echo $row[1]; ?></b><br />
					House Name :<?php echo $row[8]; ?><br />
				
					<?php
					/*while($rowcon=mysql_fetch_array($dbcon))
					{
					$con_no=$rowcon['consumer_no'];
					$dt2=$rowcon['connection_date'];
					?>
					Consumer No : <b><?php echo $rowcon['consumer_no']; ?></b><br />
					<?php
						$sqlcyl="select consumer_no from second_cylinder where status='D' and consumer_no='$con_no'";
						$dbcyl=mysql_query($sqlcyl);
						$cyl=mysql_num_rows($dbcyl);
					?>
					No of Cylinders : <?php echo $cyl+1; ?><br />
					Type : </td><td><?php echo $rowcon['connection_name']; ?><br />
					<?php
					}*/
					?>
					</div>
				</div>
				<div class="right-container">
						 Hi <b> <?php echo ucwords(strtolower($row[1]));  ?></b>,....... Thanks for being with us  
						 <?php
						 $varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name,hospital.hospital_name from appoinment,patient_master,doctor,hospital where appoinment.patient_master_id=patient_master.id and appoinment.doctor_id=doctor.id and appoinment.hospital_id=hospital.id and patient_master.email='$username' and curdate()=appoinment.app_date";
						   $varresult=mysql_query($varsql);
						 ?>
						 <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
	  <b><center><a href="Appoinment_add.php">Add New</a></center></b> 
          <td align="center"><b>Id</b></td>
          <td><b>Patient Name</b></td>
		   <td><b>Hospital</b></td>
          <td><b>Doctor</b></td>
          <td align="center"><b>Appointment Date</b></td>
          <td><b>Description</b></td>
          <td><b>Token</b></td>
           <td><b>Details</b></td>
          <td><b>History</b></td>
           
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
						 <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
						 <td align="center"><?php echo $row['app_date']; ?> </td>
                         <td><?php echo $row['description']; ?> </td>
						  <td align="center"><?php echo $row['token']; ?> </td>
     
 			 <td align="center"><a href="Prescription_view.php?mvarid=<?php echo $row[0]; ?>">Details</a></td>  
	         
  				<td align="center"><a href="Document_Select.php?mvarid=<?php echo $row[0]; ?>">History</a></td>
  				 
    
               </tr>
          <?php
          $slno++;
          }
          ?>	 
						
			 
			</table>
				</div>
			</div>
			
			<?php
			} 
     elseif($userlevel==3)
			{
				 $username=$_SESSION['username'];
				$sql="select * from hospital where email='$username'";
				$db=mysql_query($sql);
				$row=mysql_fetch_array($db);
				  $hospital_pic=$row[0];
				  $hospital_pic=$row['image_path'];
				  
				  //$sqlcon="Select connection_master.*,agency.agency_name,connection_type.connection_name,customer.customer_name from connection_master,agency,connection_type,customer where connection_master.agency_id=agency.id and connection_master.connection_type_id=connection_type.id and connection_master.customer_id=customer.id and customer.id='$custid'";
				//$dbcon=mysql_query($sqlcon);
				 // $varsqlcust="Select * from refill_master where consumer_no in (select consumer_no from connection_master where customer_id='$custid') order by book_date,id desc  ";
				 // $varresultcust=mysql_query($varsqlcust)or die(mysql_error());
				  
			 ?>
			<div class="home-page-container column">
				<div class="left-container">
					<div class="profile-photo">
						<a id="profile-photo" href="<?php echo $hospital_pic; ?>">
							<img src="<?php echo $hospital_pic; ?>" />
						</a>
					</div>
					<div class="profile-info">
					Name :<b> <?php echo $row[1]; ?></b><br />
					Location :<?php echo $row[2]; ?><br />
			        Contact :<b> <?php echo $row[5]; ?></b><br />
					Website :<?php echo $row[9]; ?><br />
				
					<?php
					/*while($rowcon=mysql_fetch_array($dbcon))
					{
					$con_no=$rowcon['consumer_no'];
					$dt2=$rowcon['connection_date'];
					?>
					Consumer No : <b><?php echo $rowcon['consumer_no']; ?></b><br />
					<?php
						$sqlcyl="select consumer_no from second_cylinder where status='D' and consumer_no='$con_no'";
						$dbcyl=mysql_query($sqlcyl);
						$cyl=mysql_num_rows($dbcyl);
					?>
					No of Cylinders : <?php echo $cyl+1; ?><br />
					Type : </td><td><?php echo $rowcon['connection_name']; ?><br />
					<?php
					}*/
					?>
					</div>
				</div>
				<div class="right-container">
						 Hi <b> <?php echo ucwords(strtolower($row[1]));  ?></b>,....... Thanks for being with us  
						 <tr></tr>
						
					<?php
					$varsql="Select appoinment.*, patient_master.patient_name,doctor.doctor_name,doctor.id,hospital.hospital_name,doctor_time.id,doctor_time.timing_name from appoinment,patient_master,doctor,hospital,doctor_time where appoinment.patient_master_id=patient_master.id and appoinment.hospital_id=hospital.id and appoinment.doctor_time_id=doctor_time.id and appoinment.doctor_id=doctor.id  and curdate()=appoinment.app_date";
					 $varresult=mysql_query($varsql);
					 
					?>
					
					  <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
	 
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
		  <td><b>Hospital</b></td>
          <td><b>Doctor</b></td>
          <td><b>Appointment Date</b></td>
		  <td><b>Time</b></td>
		<td><b>Token</b></td>
         <td><b>Description</b></td>
		   
  		 
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
						 <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['doctor_name']; ?> </td>
						 <td align="center"><?php echo $row['app_date']; ?> </td>
						  <td align="center"><?php echo $row['timing_name']; ?> </td>
						<td align="center"><?php echo $row['token']; ?> </td>
                         <td><?php echo $row['description']; ?> </td>
						  
         

               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
				</div>
			</div>
			
<?php
} 

 
		elseif($userlevel==5)
			{
			 $username=$_SESSION['username'];
				$sql="select * from medical_lab where email='$username'";
				$db=mysql_query($sql);
				$row=mysql_fetch_array($db);
				  $lab_pic=$row[0];
				  $lab_pic=$row['image_path'];
				  
				  //$sqlcon="Select connection_master.*,agency.agency_name,connection_type.connection_name,customer.customer_name from connection_master,agency,connection_type,customer where connection_master.agency_id=agency.id and connection_master.connection_type_id=connection_type.id and connection_master.customer_id=customer.id and customer.id='$custid'";
				//$dbcon=mysql_query($sqlcon);
				 // $varsqlcust="Select * from refill_master where consumer_no in (select consumer_no from connection_master where customer_id='$custid') order by book_date,id desc  ";
				 // $varresultcust=mysql_query($varsqlcust)or die(mysql_error());
				  
			 ?>
			<div class="home-page-container column">
				<div class="left-container">
					<div class="profile-photo">
						<a id="profile-photo" href="<?php echo $lab_pic; ?>">
							<img src="<?php echo $lab_pic; ?>" />
						</a>
					</div>
					<div class="profile-info">
					Name :<b> <?php echo $row[1]; ?></b><br />
					Contact :<?php echo $row[2]; ?><br />
			        Web :<b> <?php echo $row[4]; ?></b><br />
				 
				
					<?php
					/*while($rowcon=mysql_fetch_array($dbcon))
					{
					$con_no=$rowcon['consumer_no'];
					$dt2=$rowcon['connection_date'];
					?>
					Consumer No : <b><?php echo $rowcon['consumer_no']; ?></b><br />
					<?php
						$sqlcyl="select consumer_no from second_cylinder where status='D' and consumer_no='$con_no'";
						$dbcyl=mysql_query($sqlcyl);
						$cyl=mysql_num_rows($dbcyl);
					?>
					No of Cylinders : <?php echo $cyl+1; ?><br />
					Type : </td><td><?php echo $rowcon['connection_name']; ?><br />
					<?php
					}*/
					?>
					</div>
				</div>
				<div class="right-container">
						 Hi <b> <?php echo ucwords(strtolower($row[1]));  ?></b>,....... Thanks for being with us  
						
					<?php
					  $varsql="select appoinment.id as appid,appoinment.app_date,appoinment.status,patient_master.patient_name,doctor.doctor_name,doctor.id,prescription.present_illness  from appoinment,patient_master,doctor,prescription where appoinment.patient_master_id=patient_master.id and prescription.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id and appoinment.status=1 ";
					 $varresult=mysql_query($varsql);
					 
					?>	
					 <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Appointment ID</b></td>
		  <td><b>Patient Name</b></td>
		  <td><b>Appointment Date</b></td>
		  <td><b>Doctor Name</b></td>
          <td><b>Illness</b></td>
          <td><b>Details</b></td>

		  <td><b>History</b></td>

 
		   <td><b>Add Files</b></td>
     
  
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
		 
						  
   
 
   <td align="center"><a href="Prescription_view.php?mvarid=<?php echo $row['appid']; ?>">Details</a></td>
       
	 
     <td align="center"><a href="Document_Select.php?mvarid=<?php echo $row['appid']; ?>">Documents</a></td>
	   
						 
						 <td align="center"><a href="document_add.php?mvarid=<?php echo $row['appid']; ?>">Add New</a></td align="center">
  
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
			</table>
				</div>
			</div>
					
<?php
}

 		elseif($userlevel==6)
			{
			  $username=$_SESSION['username'];
				$sql="select * from medical_store where email='$username'";
				$db=mysql_query($sql);
				$row=mysql_fetch_array($db);
				  $store_pic=$row[0];
				  $store_pic=$row['image_path'];
				  
				  //$sqlcon="Select connection_master.*,agency.agency_name,connection_type.connection_name,customer.customer_name from connection_master,agency,connection_type,customer where connection_master.agency_id=agency.id and connection_master.connection_type_id=connection_type.id and connection_master.customer_id=customer.id and customer.id='$custid'";
				//$dbcon=mysql_query($sqlcon);
				 // $varsqlcust="Select * from refill_master where consumer_no in (select consumer_no from connection_master where customer_id='$custid') order by book_date,id desc  ";
				 // $varresultcust=mysql_query($varsqlcust)or die(mysql_error());
				  
			 ?>
			<div class="home-page-container column">
				<div class="left-container">
					<div class="profile-photo">
						<a id="profile-photo" href="<?php echo $store_pic; ?>">
							<img src="<?php echo $store_pic; ?>" />
						</a>
					</div>
					<div class="profile-info">
					Name :<b> <?php echo $row[1]; ?></b><br />
					Contact :<?php echo $row[2]; ?><br />
			
				
					<?php
					/*while($rowcon=mysql_fetch_array($dbcon))
					{
					$con_no=$rowcon['consumer_no'];
					$dt2=$rowcon['connection_date'];
					?>
					Consumer No : <b><?php echo $rowcon['consumer_no']; ?></b><br />
					<?php
						$sqlcyl="select consumer_no from second_cylinder where status='D' and consumer_no='$con_no'";
						$dbcyl=mysql_query($sqlcyl);
						$cyl=mysql_num_rows($dbcyl);
					?>
					No of Cylinders : <?php echo $cyl+1; ?><br />
					Type : </td align="center"><td align="center"><?php echo $rowcon['connection_name']; ?><br />
					<?php
					}*/
					?>
					</div>
				</div>
				<div class="right-container">
						 Hi <b> <?php echo ucwords(strtolower($row[1]));  ?></b>,....... Thanks for being with us  
						
				<?php
					
					  $varsql="select appoinment.id as appid,appoinment.app_date,appoinment.status,patient_master.patient_name,doctor.doctor_name,doctor.id,prescription.present_illness  from appoinment,patient_master,doctor,prescription where appoinment.patient_master_id=patient_master.id and prescription.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id and appoinment.status=1 ";
					 $varresult=mysql_query($varsql);
					 
					?>	
					 <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>App ID</b></td>
		  <td><b>Patient Name</b></td>
		  <td><b>Appointment Date</b></td>
		
		  <td><b>Doctor Name</b></td>
          <td><b>Present Illness</b></td>
          <td><b>Details</b></td>

		  <td><b>History</b></td>

 
		    
     
  
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
		 
						  
   
 
   <td align="center"><a href="Prescription_view.php?mvarid=<?php echo $row['appid']; ?>">Details</a></td>
     <td align="center"><a href="Document_Select.php?mvarid=<?php echo $row['appid']; ?>">Documents</a></td>
	    
  
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
			</table>
				</div>
			</div>
					<?php
					}
					elseif($userlevel==1)
			{
 
  ?>
				 <div class="home-page-container column">
	<div class="left-container">
	</div>
	</div>

					
<?php
}
else
{
	?>
	
<?php
//include"minifooter.php";
}
?>
<?php
//include"footer.php";
?>
	