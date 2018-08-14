      <?php include 'aheader.php'; ?>
<html>
<head><center>
<h2><b>     Lab Record Details</h2>
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
      $varsql="Select lab_record.*, appoinment.patient_master_id,medical_lab.lab_name,lab_test.test_name from lab_record,appoinment,medical_lab,lab_test where lab_record.appoinment_id=appoinment.id and lab_record.medical_lab_id=medical_lab.id and lab_record.lab_test_id=lab_test.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Appoinment</b></td>
          <td><b>Medical Lab</b></td>
          <td><b>Lab Test</b></td>
          <td><b>Result</b></td>
 
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td align="center"><?php echo $row['patient_master_id']; ?> </td>
                         <td><?php echo $row['lab_name']; ?> </td>
                         <td><?php echo $row['test_name']; ?> </td>
						  <td><?php echo $row['result']; ?> </td>
 
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
