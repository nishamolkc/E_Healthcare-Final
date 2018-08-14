      <?php include 'aheader.php';
	        include 'dbconnect.php';
            $db=new dbconnect(); 
	  	    $userlevel=$_SESSION['userlevel'];
	         $username=$_SESSION['username'];
	         $status=$_POST['status'];
			 ?>
<html>
<head><center>
<h2><b>Patient Details</b></h2>
</center></head>
<body>
 
  <?php
    
	   $varsql="Select patient_master.*, city.City_name,blood_group.blood_group_name from patient_master,city,blood_group where patient_master.city_id=city.id and patient_master.blood_group_id=blood_group.id and patient_master.status=1";
	   
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Patient Name</b></td>
          <!--<td><b>Card_number</b></td>
          <td><b>Card_type</b></td>-->
          <td><b>Date of Birth</b></td>
          <td><b>Gender</b></td>
          <td><b>Mobile Number</b></td>
         <!-- <td><b>Email</b></td>-->
          <td><b>House</b></td>
         <!-- <td><b>Post_office</b></td>
          <td><b>City</b></td>-->
          <td><b>Blood Group</b></td>
        <!--  <td><b>Image_path</b></td>-->
   
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                        
                        
                         <td><?php echo  date("d/m/Y",strtotime($row['date_of_birth'])); ?> </td>
                         <td><?php echo $row['gender']; ?> </td>
                         <td align="center"><?php echo $row['mobile_number']; ?> </td>
                        
                         <td><?php echo $row['house_name']; ?> </td>
                         
                         <td><?php echo $row['blood_group_name']; ?> </td>
					
                        
   
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
