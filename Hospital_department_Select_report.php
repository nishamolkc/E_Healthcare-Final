      <?php include 'aheader.php';
	  	  $userlevel=$_SESSION['userlevel'];
	   $username=$_SESSION['username'];
	   $var_hsptl=$_POST['slb_hospital_id']; ?>
<html>
<head><center>
<h2><b>     Hospital Department Details</h2>
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
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="Select hospital_department.*, hospital.hospital_name,hospital.id,department.department_name from hospital_department,hospital,department where hospital_department.hospital_id=hospital.id and hospital_department.department_id=department.id and hospital.id='$var_hsptl'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
   
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td align="center"><b>Id</b></td>
          <td><b>Hospital</b></td>
          <td><b>Department</b></td>
 
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
				 <td align="center"><?php echo $slno; ?></td>
				 <td><?php echo $row['hospital_name']; ?> </td>
				 <td><?php echo $row['department_name']; ?> </td>
   
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
