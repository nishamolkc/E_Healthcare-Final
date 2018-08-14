      <?php include 'aheader.php'; ?>
<html>
<head><center>
<h2><b>     Prescription Details</h2>
</center></head>
<body>
<script type="text/javascript">
function DeleteChecked()
{
 var  answer = confirm("Are you sure you   to Delete ?")
if (answer){
 document.messages.submit();
}
return false;
}
</script>
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
      $varsql="Select prescription.*, appoinment.patient_master_id from prescription,appoinment where prescription.appoinment_id=appoinment.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  <?php
    if($userlevel==1)
      {
  ?>
      <b><a href="Prescription_Add.php">Add New</a></b>
  <?php
  } ?>
      <table class="table table-bordered">
     <tr bgcolor="#CCCC33" align="center">
          <td><b>Id</b></td>
          <td><b>Appoinment</b></td>
          <td><b>Present Illness</b></td>
          <td><b>Diagnosis</b></td>
          <td><b>History</b></td>
          <td><b>Investigations</b></td>
          <td><b>Prescriptions</b></td>
          <td><b>Remarks</b></td>
  <?php
    if($userlevel==1)
      {
  ?>
          <td align="center"><b>Edit</b></td>
          <td align="center"><b>Delete</b></td>
  <?php
  } ?>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td align="center"><?php echo $row['patient_master_id']; ?> </td>
                         <td><?php echo $row['present_illness']; ?> </td>
                         <td><?php echo $row['diagnosis']; ?> </td>
                         <td><?php echo $row['history']; ?> </td>
                         <td><?php echo $row['investigations']; ?> </td>
                         <td><?php echo $row['prescriptions']; ?> </td>
                         <td><?php echo $row['remarks']; ?> </td>
  <?php
    if($userlevel==1)
      {
  ?>
		 <td align="center"><a class="glyphicon glyphicon-pencil" href="Prescription_Edit.php?mvarid=<?php echo $row[0]; ?>" title="Edit"></a></td>
		 <td align="center"><a class="glyphicon glyphicon-trash" href="Prescription_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); " title="Delete"></a></td>
  <?php
  } ?>
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</body>
</html>
      <?php include 'footer.php'; ?>
