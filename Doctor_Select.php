      <?php include 'aheader.php'; ?>
<html>
<head>
<h2><b>     Doctor Details</h2>
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
	  if(isset($_GET['pp']))
      {
        if($_GET['pp']==4)
          { ?>
              <b> <center><font color="#009900">Approved</font></center> </b>
          <?php   }
       
       
      }
      $varsql="Select doctor.*, city.city_name,district.district_name,specialization.specialization_name from doctor,city,district,specialization where doctor.city_id=city.id and doctor.district_id=district.id and doctor.specialization_id=specialization.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
 
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Doctor Name</b></td>
          <td align="center"><b>House</b></td>
          <td align="center"><b>City</b></td>
          <td align="center"><b>District</b></td>
          <td align="center"><b>Mobile Number</b></td>
          <td align="center"><b>Specialization</b></td>
  <?php
    if($userlevel==1)
      {
  ?>
          <td align="center"><b>Status</b></td>
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
                         <td><?php echo $row['doctor_name']; ?> </td>
                         <td><?php echo $row['house_name']; ?> </td>
                         <td><?php echo $row['city_name']; ?> </td>
                         <td><?php echo $row['district_name']; ?> </td>
                         <td align="center"><?php echo $row['mobile_number']; ?> </td>
                         <td><?php echo $row['specialization_name']; ?> </td>
						 
						 <?php
    if($userlevel==1)
      {
	  if($row['status']==0)
	  {
	  	?>
		
		<td><a href="Doctor_approve.php?mvarid=<?php echo $row[0]; ?>">Approve</a></td>
		<?php
	  }
	  elseif($row['status']==1)
	  {
	  ?>
	  <td>Approved</td>
	  <?php
	  }
  ?>
                         
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Doctor_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
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
