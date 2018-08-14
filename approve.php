     <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel']; 
	   ?>
<html>
<head><center>
<h2><b>     Doctor Details</h2>
</center></head>
<body>
 

          <?php   
      $varsql="Select doctor.*,qualification_details.*, city.City_name,district.district_name,specialization.specialization_name,doctor.doctor_name,qualification.qualification,doctor.id from doctor,city,district,specialization,qualification,qualification_details where doctor.city_id=city.id and doctor.district_id=district.id and doctor.specialization_id=specialization.id and qualification_details.doctor_id=doctor.id and qualification_details.qualification_id=qualification.id";
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
          <td><b>Specialization</b></td>
		  <th> Qualification</th>
		<th> College</th>
		<th> University </th>
		<th>Passout Year</th>
		<th> Certificate </th>
  
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
                         <td><?php echo $row['specialization_name']; ?> </td>
						 <td> <?php echo $row['qualification']; ?> </td>
							<td> <?php echo $row['college']; ?> </td>
							<td><?php echo $row['university']; ?></td>
							<td> <?php echo $row['year']; ?> </td>
							<td> <?php echo $row['certificate_path']; ?> </td>   <?php
          $slno++;
          }
          ?>
							
							</tr>
							</table>
							<table>
							<tr>
                         
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
  } ?>
 </tr>
       
</table>

</body>
</html>
      <?php include 'footer.php'; ?>
