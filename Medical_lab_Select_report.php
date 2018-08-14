      <?php include 'aheader.php';
	  $userlevel=$_SESSION['userlevel'];
	   $username=$_SESSION['username'];
	     ?>
<html>
<head><center>
<h2><b>     Medical Lab Details</h2>
</center></head>
<body>

  <?php
    
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="Select medical_lab.*, city.city_name from medical_lab,city where medical_lab.city_id=city.id and medical_lab.status=1";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">

      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Lab Name</b></td>
          <td><b>Phone Number</b></td>
          <td><b>Email</b></td>
          <td><b>Website</b></td>
          <td><b>City</b></td>
           
  
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td><?php echo $slno; ?></td>
                         <td><?php echo $row['lab_name']; ?> </td>
                         <td><?php echo $row['phone_number']; ?> </td>
                         <td><?php echo $row['email']; ?> </td>
                         <td><?php echo $row['website']; ?> </td>
                         <td><?php echo $row['city_name']; ?> </td>
						 
                         
  
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
