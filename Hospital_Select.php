      <?php include 'aheader.php'; ?>
<html>
<head>
<h2><b>Hospital Details</h2>
</head>
<body>
  <?php
    $userlevel=$_SESSION['userlevel'];
	$username=$_SESSION['username'];
	$status=$_POST['status'];
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
      $varsql="Select hospital.*, district.district_name,city.city_name from hospital,district,city where hospital.district_id=district.id and hospital.city_id=city.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  <?php /*?><?php
    if($userlevel==1)
      {
  ?>
      <div align="center"><b><a href="Hospital_Add.php" style="text-decoration:none" title="Add New"><font color="#DF175F">Add New</font></a></b></div>
  <?php
  } ?><?php */?>
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Hospital Name</b></td>
          <td align="center"><b>Location</b></td>
          <td align="center"><b>City</b></td>
          <td align="center"><b>Phone Number</b></td>
          <td align="center"><b>Contact Name</b></td>
          <td align="center"><b>Contact Mobile</b></td>
		 
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
                         <td><?php echo $row['hospital_name']; ?> </td>
                         <td><?php echo $row['location']; ?> </td>
                         <td><?php echo $row['city_name']; ?> </td>
                         <td align="center"><?php echo $row['phone_number']; ?> </td>
                         <td><?php echo $row['contact_name']; ?> </td>
                         <td align="center"> <?php echo $row['contact_mobileno']; ?> </td>
                         <?php /*?><!--<td align="center"><a class="glyphicon glyphicon-download-alt" href="download.php?filename=upload/<?php echo $row['image_path']; ?>"title="Download"></a></td>--><?php */?>
 
		   <?php
    if($userlevel==1)
      {
  ?>
                         
                         <td align="center"><a class="glyphicon glyphicon-trash" href="Hospital_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
						 
						
  <?php
  } ?>
  
    <?php
    if($userlevel==1)
      {
	  if($row['status']==0)
	  {
	  	?>
	    <td><a href="approve_hospital.php?mvarid=<?php echo $row[0]; ?>">Approve</a></td>
	<?php
	  }
	  elseif($row['status']==1)
	  {
	  ?>
	  <td>Approved</td>
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
