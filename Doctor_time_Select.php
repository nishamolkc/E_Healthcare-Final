      <?php include 'aheader.php'; 
	   include 'dbconnect.php';
      $db=new dbconnect();
	  $userlevel=$_SESSION['userlevel']; 
	  $var_id=$_GET['mvarid'];
	  ?>
<html>
<head>
<h2><b>     Doctor_time Details</h2>
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
      
      $varsql="Select * from doctor_time";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  <?php
    if($userlevel==3||$userlevel==2)
      {
  ?>
      <div align="center"><b><a href="Doctor_time_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Available Time</b></td>
  <?php
    if($userlevel==3||$userlevel==2)
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
                         <td><?php echo $row['timing_name']; ?> </td>
  <?php
    if($userlevel==3||$userlevel==2)
      {
  ?>
                         <td align="center"><a class="glyphicon glyphicon-pencil" href="Doctor_time_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Doctor_time_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
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
