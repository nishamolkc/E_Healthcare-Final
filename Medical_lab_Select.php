      <?php include 'aheader.php'; ?>
<html>
<head>
<h2>Medical Lab Details</h2>
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
		  if($_GET['pp']==4)
          { ?>
              <b> <center><font color="#009900">Approved</font></center> </b>
          <?php   }
      }
  ?>
<script type="text/javascript">
function DeleteChecked()
{
 var  answer = confirm("Are you sure you to Delete ?")
if (answer){
 document.messages.submit();
}
return false;
}
</script>
      <?php
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="Select medical_lab.*, district.district_name,city.city_name from medical_lab,district,city where medical_lab.district_id=district.id and medical_lab.city_id=city.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
 
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Lab Name</b></td>
          <td align="center"><b>Phone Number</b></td>
          <td align="center"><b>Email</b></td>
          <td align="center"><b>Website</b></td>
          <td align="center"><b>District</b></td>
          <td align="center"><b>City</b></td>
          
  <?php
    if($userlevel==1)
      {
  ?>
          <td align="center"><b>Delete</b></td>
          <td align="center"><b>Status</b></td>
  <?php
  } ?>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['lab_name']; ?> </td>
                         <td align="center"><?php echo $row['phone_number']; ?> </td>
                         <td><?php echo $row['email']; ?> </td>
                         <td><?php echo $row['website']; ?> </td>
                         <td><?php echo $row['district_name']; ?> </td>
                         <td><?php echo $row['city_name']; ?> </td>
						 <?php
    if($userlevel==1)
      {
	  if($row['status']==0)
	  {
	  	?>              
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Medical_lab_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
						 <td align="center"><a href="approve_medical_lab.php?mvarid=<?php echo $row[0]; ?>">Approve</a></td>
		<?php
	  }
	  elseif($row['status']==1)
	  {
	  ?>
	  <td align="center"><a class="glyphicon glyphicon-trash" href="Medical_lab_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
	  <td align="center">Approved</td>
	  <?php
	  }
	  }
  ?>

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
