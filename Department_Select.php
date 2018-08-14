      <?php include 'aheader.php'; ?>
<html>
<head>
<h2><b>     Department Details</h2>
</head>
<body>
  <?php
    $userlevel=$_SESSION['userlevel'];
	$username=$_SESSION['username']; 
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
      $varsql="Select * from department";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
		  <?php
    if($userlevel==3)
      {
  ?>
      <div align="center"><b><a href="Department_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
 
     
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Department Name</b></td>
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
                         <td><?php echo $row['department_name']; ?> </td>
  <?php
    if($userlevel==1)
      {
  ?>
                         <td align="center"><a class="glyphicon glyphicon-pencil" href="Department_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Department_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
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
