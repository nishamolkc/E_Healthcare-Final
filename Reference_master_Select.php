      <?php include 'aheader.php'; ?>
<html>
<head>
<h2><b>     Reference_master Details</h2>
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
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="Select reference_master.*, appoinment.patient_master_id from reference_master,appoinment where reference_master.appoinment_id=appoinment.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  <?php
    if($userlevel==1)
      {
  ?>
      <div align="center"><b><a href="Reference_master_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Reference_date</b></td>
          <td align="center"><b>Appoinment</b></td>
          <td align="center"><b>Reason</b></td>
          <td align="center"><b>Refer_appoinment</b></td>
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
                         <td><?php echo $slno; ?></td>
                         <td><?php echo  date("d/m/Y",strtotime($row['reference_date'])); ?> </td>
                         <td><?php echo $row['patient_master_id']; ?> </td>
                         <td><?php echo $row['reason']; ?> </td>
                         <td><?php echo $row['refer_appoinment']; ?> </td>
  <?php
    if($userlevel==1)
      {
  ?>
                         <td align="center"><a class="glyphicon glyphicon-pencil" href="Reference_master_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Reference_master_Delete.php?mvarid=<?php echo $row[0]; ?>" onclick="return DeleteChecked(); "title="Delete"></a></td>
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
