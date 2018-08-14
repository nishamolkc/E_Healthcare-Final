      <?php include 'aheader.php';
	        include 'dbconnect.php';
            $db=new dbconnect(); 
	  	    $userlevel=$_SESSION['userlevel'];
	         $username=$_SESSION['username'];
	         $status=$_POST['status'];
			 ?>
<html>
<head><center>
<h2><b>Patient_master Details</b></h2>
</center></head>
<body>
 
  <?php
    if(isset($_GET['pp']))
      {
        if($_GET['pp']==1)
          { ?>
              <b> <center><font color="#009900">Updated</font></center> </b>
          <?php   }
        if($_GET['pp']==2)
          { ?>
              <b> <center><font color="#009900">Deleted</font></center> </b>
          <?php   }
        if($_GET['pp']==3)
          { ?>
              <b> <center><font color="#009900">Error</font></center> </b>
          <?php   }
      }
     if($userlevel==4)
	 {
     $varsql="Select patient_master.*, city.City_name,blood_group.blood_group_name from patient_master,city,blood_group where patient_master.city_id=city.id and patient_master.blood_group_id=blood_group.id and patient_master.email='$username'";
    
	  }
	  else
	  {
	   $varsql="Select patient_master.*, city.City_name,blood_group.blood_group_name from patient_master,city,blood_group where patient_master.city_id=city.id and patient_master.blood_group_id=blood_group.id";
	   }
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
      <table class="CSSTableGenerator">
     <tr bgcolor="#CCCC33">
          <td><b>Id</b></td>
          <td><b>Patient_name</b></td>
          <!--<td><b>Card_number</b></td>
          <td><b>Card_type</b></td>-->
          <td><b>Date_of_birth</b></td>
          <td><b>Gender</b></td>
          <td><b>Mobile_number</b></td>
         <!-- <td><b>Email</b></td>-->
          <td><b>House_name</b></td>
         <!-- <td><b>Post_office</b></td>
          <td><b>City</b></td>-->
          <td><b>Blood_group</b></td>
         <td><b>Upload</b></td>
          
 
 
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                        
                        
                         <td><?php echo  date("d/m/Y",strtotime($row['date_of_birth'])); ?> </td>
                         <td><?php echo $row['gender']; ?> </td>
                         <td><?php echo $row['mobile_number']; ?> </td>
                        
                         <td><?php echo $row['house_name']; ?> </td>
                         
                         <td><?php echo $row['blood_group_name']; ?> </td>
					<td><a href="Document_Add.php?mvarid=<?php echo $row[0]; ?>">Upload Files</a></td>
				  </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
