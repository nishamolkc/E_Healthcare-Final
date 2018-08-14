      <?php include 'aheader.php';
	  	  $userlevel=$_SESSION['userlevel'];
	   $username=$_SESSION['username']; ?>
<html>
<head><center>
<h2><b>     Medical Store Details</h2>
</center></head>
<body>

  <?php
     
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="Select medical_store.*, city.city_name from medical_store,city where medical_store.city_id=city.id and medical_store.status=1 ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">

      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Store Name</b></td>
          <td><b>Phone Number</b></td>
          <td><b>Email</b></td>
          <td><b>City</b></td>
  
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['store_name']; ?> </td>
                         <td align="center"><?php echo $row['phone_number']; ?> </td>
                         <td><?php echo $row['email']; ?> </td>
                         <td><?php echo $row['city_name']; ?> </td>
                        
                        
   
   <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
<?php include 'footer.php'; ?>