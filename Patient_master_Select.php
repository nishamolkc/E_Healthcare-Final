      <?php 
	    include 'aheader.php';
	  	include 'dbconnect.php';
		$db=new dbconnect(); 
		$userlevel=$_SESSION['userlevel'];
	    $username=$_SESSION['username'];
	    $status=$_POST['status']; ?>
<html>
<head>
<h2><b>Patient Details</h2>
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
		  if($_GET['pp']==4)
          { ?>
              <b> <center><font color="#009900">Approved</font></center> </b>
          <?php   }
      }
	  if($userlevel==4)
	 {
     $varsql="Select patient_master.*, city.city_name,blood_group.blood_group_name from patient_master,city,blood_group where patient_master.city_id=city.id and patient_master.blood_group_id=blood_group.id and patient_master.email='$username'";
    
	  }
	  else
	  {
	   $varsql="Select patient_master.*, city.city_name,blood_group.blood_group_name from patient_master,city,blood_group where patient_master.city_id=city.id and patient_master.blood_group_id=blood_group.id";
	   }
      $varresult=mysql_query($varsql)or die(mysql_error());
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
     
      $varsql="Select patient_master.*, district.district_name,city.city_name,blood_group.blood_group_name from patient_master,district,city,blood_group where patient_master.district_id=district.id and patient_master.city_id=city.id and patient_master.blood_group_id=blood_group.id ";
      $varresult=mysql_query($varsql)or die(mysql_error());
      ?>
          <div align="center">
  
      <div style=" overflow: auto ">
      <table class="table table-bordered">
     <tr bgcolor="#CCCCCC">
          <td align="center"><b>Id</b></td>
          <td align="center"><b>Patient Name</b></td>
          <!--<td align="center"><b>Card Number</b></td>
          <td align="center"><b>Card Type</b></td>-->
          <td align="center"><b>Date of birth</b></td>
          <td align="center"><b>Gender</b></td>
          <td align="center"><b>Mobile Number</b></td>
          <!--<td align="center"><b>Email</b></td>-->
          <td align="center"><b>House</b></td>
          <!--<td align="center"><b>Post_office</b></td>
          <td align="center"><b>District</b></td>
          <td align="center"><b>City</b></td>-->
          <td align="center"><b>Blood Group</b></td>
          <!--<td align="center"><b>Download</b></td>
          <td align="center"><b>Status</b></td>-->
		  
		  <?php
    if($userlevel==3)
      {
  ?>
         <td align="center"><b>Edit</b></td>
          <td align="center"><b>Delete</b></td>
		  <td align="center"><b>Status</b></td>
  <?php
  } 
  ?>
  <?php
    if($userlevel==1)
      {
  ?>
          <td align="center"><b>Delete</b></td>
          <td align="center"> <b>Status</b></td>
     
  <?php
  } ?>
     </tr>
     <?php
          $slno=1;
          while($row=mysql_fetch_array($varresult))
             { ?>
               <tr>
                         <td align="center"><?php echo $slno; ?></td>
                         <td><?php echo $row['patient_name']; ?> </td>
                        
                        
                         <td align="center"><?php echo  date("d/m/Y",strtotime($row['date_of_birth'])); ?> </td>
                         <td><?php echo $row['gender']; ?> </td>
                         <td align="center"><?php echo $row['mobile_number']; ?> </td>
                        
                         <td><?php echo $row['house_name']; ?> </td>
                         
                         <td align="center"><?php echo $row['blood_group_name']; ?> </td>
					
                        
  <?php
    if($userlevel==3)
      {
  ?>
                         <td align="center"><a style="color:#0000FF" class="glyphicon glyphicon-pencil" href="Patient_master_Edit.php?mvarid=<?php echo $row[0]; ?>"title="Edit"></a></td>
                         <td align="center"><a style="color:#FF0000" class="glyphicon glyphicon-trash" href="Patient_master_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
						  <?php
						 if($row['status']==0)
						 {
						 ?>
						 <td align="center"><a href="approve_patient_master.php?mvarid=<?php echo $row[0]; ?>">Approve</a></td>
 <?php
  } 
  else
  {
  ?>
  <td align="center">Approved</a></td> 
  <?php
  }
  }
  ?>
  <?php
    if($userlevel==1)
      {
	   if($row['status']==0)
	  {
  ?>
                         <td align="center"><a style="color:#FF0000" class="glyphicon glyphicon-trash" href="Patient_master_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
                         <td><a href="approve_patient_master.php?mvarid=<?php echo $row[0]; ?>">Approve</a></td>
	 <?php
	        }
			else if($row['status']==1)
			{
	 ?>
	 <td align="center"><a class="glyphicon glyphicon-trash" style="color:#FF0000" href="Patient_master_Delete.php?mvarid=<?php echo $row[0]; ?>" onClick="return DeleteChecked(); "title="Delete"></a></td>
	<td align="center" >Approved</a></td> 
                         
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
