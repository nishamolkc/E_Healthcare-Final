      <?php include 'aheader.php'; 
	  include 'dbconnect.php';
      $db=new dbconnect();
	  $username=$_SESSION['username'];
	  ?>
<html>
<head>
<h2><b>     Lab Record Details</h2>
</head>
<body>
  <?php
    $userlevel=$_SESSION['userlevel'];
  ?>
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
  ?>
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
	  echo $varsql="Select lab_record.*, appoinment.patient_master_id,medical_lab.lab_name,patient_master.id,patient_master.patient_name from lab_record,appoinment,medical_lab,patient_master where lab_record.appoinment_id=appoinment.id and lab_record.medical_lab_id=medical_lab.id and  patient_master.email='$username'";
	  $varsql="select appoinment.id as appid,appoinment.app_date,appoinment.status,patient_master.patient_name,doctor.doctor_name,doctor.id,prescription.medical_lab_history  from appoinment,patient_master,doctor,prescription where appoinment.patient_master_id=patient_master.id and prescription.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id and appoinment.status=1 ";
   
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  <?php
    if($userlevel==1)
      {
  ?>
      <div align="center"><b><a href="Lab_record_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Appoinment</b></td>
          <td align="center"><b>Medical Lab</b></td>
          <td align="center"><b>Lab Test</b></td>
          <td align="center"><b>Result</b></td>
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
                         <td><?php echo $row['lab_name']; ?> </td>
                         <td><?php echo $row['test_name']; ?> </td>
                         <td><?php echo $row['result']; ?> </td>
  <?php
    if($userlevel==1)
      {
  ?>
                         <td align="center"><a class="glyphicon glyphicon-pencil" href="Lab_record_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Lab_record_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
  <?php
  } ?>
               </tr>
          <?php
          $slno++;
          }
          ?>
</table>
</div>
</body>
</html>
      <?php include 'footer.php'; ?>
