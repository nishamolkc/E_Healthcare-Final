
      <?php include 'aheader.php';
	  include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel']; 
	  $var_id=$_GET['mvarid']; ?>
<html>
<head>
<h2><b>     Document Details</h2>
</head>
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
      
          <div align="center">
  <?php
    if($userlevel==2||$userlevel==4||$userlevel==5||$userlevel==6)
	  {
	 $varsql="Select document.*,appoinment.patient_master_id from document,appoinment where document.appoinment_id=appoinment.id and appoinment.id='$var_id'";
	  }
	  else
	  {
      $varsql="Select document.*,appoinment.patient_master_id from document,appoinment where document.appoinment_id=appoinment.id";
	  }
	  $varresult=mysql_query($varsql)or die(mysql_error());
  ?>
      
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Uploaded Date</b></td>
          <td align="center"><b>Title</b></td>
          <td align="center"><b>Download</b></td>
          <td align="center"><b>Description</b></td>
          <td align="center"><b>Investigations</b></td>
          <td align="center"><b>Appoinment</b></td>
  <?php
    if($userlevel==3||$userlevel==5)
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
                         <td align="center"><?php echo  date("d/m/Y",strtotime($row['uploaded_date'])); ?> </td>
                         <td><?php echo $row['title']; ?> </td>
                         <td align="center"><a style="color:#0000CC" class="glyphicon glyphicon-download-alt" href="download.php?filename=upload/<?php echo $row['file_path']; ?>" title="Download"></a></td>
                         <td><?php echo $row['description']; ?> </td>
                         <td><?php echo $row['investigations']; ?> </td>
                         <td align="center"><?php echo $row['patient_master_id']; ?> </td>
  <?php
    if($userlevel==3||$userlevel==5)
      {
  ?>
                         <td align="center"><a class="glyphicon glyphicon-pencil" href="Document_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a style="color:#FF0000" class="glyphicon glyphicon-trash" href="Document_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
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
