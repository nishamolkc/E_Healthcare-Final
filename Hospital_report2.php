     <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel']; 
	   $var_hsptl=$_POST['slb_hospital_id'];
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

     $varsql="Select * from doctor    where id in (select doctor_id from    doctor_hospital where hospital_id='$var_hsptl')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
             
		  <div align="center">
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Doctor Name</b></td>
          
          <td><b>Details</b></td>
   
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['doctor_name']; ?> </td>
                         
                         <td align="center"><a href="Doctor_edit_view.php?mvarid=<?php echo $row[0]; ?>">Details</a></td>
                         
  
                         
                          
  
 </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
