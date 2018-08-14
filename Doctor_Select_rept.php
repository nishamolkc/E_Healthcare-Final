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
    

      $varsql="Select doctor.*, city.city_name,district.district_name,specialization.specialization_name from doctor,city,district,specialization where doctor.city_id=city.id and doctor.district_id=district.id and doctor.specialization_id=specialization.id and doctor.status=1";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
            
		  <div align="center">
		  <div style="overflow:auto">
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Doctor Name</b></td>
          <td><b>House</b></td>
          <td><b>City</b></td>
          <td><b>District</b></td>
          <td><b>Mobile Number</b></td>
          <td><b>Specialization</b></td>
  
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td><?php echo $row['house_name']; ?> </td>
                         <td><?php echo $row['city_name']; ?> </td>
                         <td><?php echo $row['district_name']; ?> </td>
                         <td align="center"><?php echo $row['mobile_number']; ?> </td>
                         <td><?php echo $row['specialization_name']; ?> </td>
                         
  
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
