      <?php 
		include 'aheader.php';
		include 'dbconnect.php';
		$db=new dbconnect();
		$userlevel=$_SESSION['userlevel'];
		$username=$_SESSION['username']; 
		$varsql="select id,email,hospital_name from hospital where email='$username'";
		$var_result1=mysql_query($varsql);
		$var_hsptl1=mysql_fetch_array($var_result1);
		$var_hsptl=$var_hsptl1['id'];
	   ?>
<html>
<head>
<h2><b>     Hospital Department Details</h2>
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
      <?php
     if($var_hsptl>0)
	 {
	 
      $varsql="Select hospital_department.*, hospital.hospital_name,hospital.id,department.department_name from hospital_department,hospital,department where hospital_department.hospital_id=hospital.id and hospital_department.department_id=department.id and hospital_department.hospital_id='$var_hsptl' ";
	 }
	 else
	 {
	
      $varsql="Select hospital_department.*, hospital.hospital_name,hospital.id,department.department_name from hospital_department,hospital,department where hospital_department.hospital_id=hospital.id and hospital_department.department_id=department.id";
	 }
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  <?php
    if($userlevel==3)
      {
  ?>
      <div align="center"><b><a href="Hospital_department_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Hospital</b></td>
          <td align="center"><b>Department</b></td>
  <?php
    if($userlevel==3)
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
                         <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['department_name']; ?> </td>
  <?php
    if($userlevel==3)
      {
  ?>
                         <td align="center"><a class="glyphicon glyphicon-pencil" href="Hospital_department_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Hospital_department_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
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
