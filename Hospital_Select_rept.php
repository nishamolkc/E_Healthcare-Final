      <?php include 'aheader.php';
	  	  $userlevel=$_SESSION['userlevel'];
	   $username=$_SESSION['username'];
	   $status=$_POST['status']; ?>
<html>
<head><center>
<h2><b>     Hospital Details</h2>
</center></head>
<body>
 
  <?php
     
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="Select hospital.*, city.City_name from hospital,city where hospital.city_id=city.id and hospital.status=1";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Hospital Name</b></td>
          <td><b>Location</b></td>
          <td><b>City</b></td>
          <td><b>Phone Number</b></td>
        <!--  <td><b>Email</b></td>-->
          <td><b>Contact Name</b></td>
          <td><b>Mobile No.</b></td>
         
		  
   
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['location']; ?> </td>
                         <td><?php echo $row['City_name']; ?> </td>
                         <td align="center"><?php echo $row['phone_number']; ?> </td>
                       
                         <td><?php echo $row['contact_name']; ?> </td>
                         <td align="center"><?php echo $row['contact_mobileno']; ?> </td>
                      
	 
      </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
 <?php include 'footer.php'; ?>