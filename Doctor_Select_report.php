      <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel'];
	  $var_name=$_POST['txt_doctor_name'];
	  $var_status=$_POST['txt_status']; 
	   ?>
<html>
<head><center>
<h2><b>     Doctor Details</h2>
</center></head>
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

      $varsql="Select doctor.*, city.City_name,district.district_name,designation.designation_name,department.department_name,specialization.specialization_name from doctor,city,district,designation,department,specialization where doctor.city_id=city.id and doctor.district_id=district.id and doctor.designation_id=designation.id and doctor.department_id=department.id and doctor.specialization_id=specialization.id and doctor_name='$var_name' and status='$var_status'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
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
                         
 
 </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
