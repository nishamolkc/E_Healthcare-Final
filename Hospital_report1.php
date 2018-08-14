     <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel']; 
	   $var_hsptl=$_POST['slb_hospital_id'];
	   $var1_id=$_GET['mvarid'];
	   ?>
<html>
<head>
<h2><b>     Doctor Details</h2>
</head>
<body>
 
  <?php
    if(isset($_GET['pp']))
      {
        if($_GET['pp']==1)
          { ?>
              <b> <center><font color="#009900">Approved</font></center> </b>
          <?php   }
        if($_GET['pp']==2)
          { ?>
              <b> <center><font color="#009900">Deleted</font></center> </b>
          <?php   }
       
      }

  //    $varsql="Select doctor.*, city.City_name,district.district_name,designation.designation_name,department.department_name,specialization.specialization_name,doctor_hospital.doctor_id,doctor_hospital.hospital_id,hospital.id from doctor,city,district,designation,department,specialization,doctor_hospital,hospital where hospital.district=district.id and hospital.city_id=city.id and doctor_hospital.hospital_id=hospital.id and doctor_hospital.doctor_id=doctor.id and doctor.city_id=city.id and doctor.district_id=district.id and doctor.designation_id=designation.id and doctor.department_id=department.id and doctor.specialization_id=specialization.id and doctor_id in(select doctor_id from doctor_hospital where hospital_id='$var_hsptl') and doctor.id='$var1_id'";
  $varsql="Select doctor.*, city.City_name,district.district_name,designation.designation_name,department.department_name,specialization.specialization_name,doctor_hospital.doctor_id,doctor_hospital.hospital_id,hospital.id from doctor,city,district,designation,department,specialization,doctor_hospital,hospital where hospital.district=district.id and hospital.city_id=city.id and doctor_hospital.hospital_id=hospital.id and doctor_hospital.doctor_id=doctor.id and doctor.city_id=city.id and doctor.district_id=district.id and doctor.designation_id=designation.id and doctor.department_id=department.id and doctor.specialization_id=specialization.id and doctor.id='$var1_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
            <?php
    if($userlevel==3)
      {
  ?><center>
      <b><a href="Doctor_Add.php">Add New</a></b></center>
  <?php
  } ?>
		  <div align="center">
      <table class="CSSTableGenerator">
     <tr bgcolor="#CCCC33">
          <td><b>Id</b></td>
          <td><b>Doctor_name</b></td>
          <td><b>House_name</b></td>
          <td><b>City</b></td>
          <td><b>District</b></td>
          <td><b>Mobile_number</b></td>
          <td><b>Department</b></td>
          <td><b>Specialization</b></td>
  <?php
    if($userlevel==1)
      {
  ?>
       	<td><b>Status</b></td>
        <td><b>Delete</b></td>
		
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
                         <td><?php echo $row['house_name']; ?> </td>
                         <td><?php echo $row['City_name']; ?> </td>
                         <td><?php echo $row['district_name']; ?> </td>
                         <td><?php echo $row['mobile_number']; ?> </td>
                         <td><?php echo $row['department_name']; ?> </td>
                         <td><?php echo $row['specialization_name']; ?> </td>
                         
  <?php
    if($userlevel==1)
      {
	  if($row['status']==0)
	  {
	  	?>
		<td><a href="Approve_doctor.php?mvarid=<?php echo $row[0]; ?>">Approve</a></td>
		<?php
	  }
	  elseif($row['status']==1)
	  {
	  ?>
	  <td>Approved</td>
	  <?php
	  }
  ?>
                         
                         <td><a href="Doctor_Delete.php?mvarid=<?php echo $row[0]; ?>">Delete</a></td>
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
