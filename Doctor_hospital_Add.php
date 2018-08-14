      <?php include 'aheader.php';
	  $userlevel=$_SESSION['userlevel'];
			$username=$_SESSION['username']; ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_doctor_id");
if(dvar1.value=="")
{
 alert("Select Doctor Name ...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("slb_hospital_id");
if(dvar2.value=="")
{
 alert("Select Hospital Name ...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("slb_doctor_time_id");
if(dvar3.value=="")
{
 alert("Select Doctor_time Name ...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_day_name");
if(dvar4.value=="")
{
 alert("Enter day_name...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("slb_designation_id");
if(dvar5.value=="")
{
 alert("Select Designation Name ...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("slb_department_id");
if(dvar6.value=="")
{
 alert("Select Department Name ...");
dvar6.focus();
return false;
}
 var  dvar7 = document.getElementById("txt_status");
if(dvar7.value=="")
{
 alert("Enter status...");
dvar7.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar7.value.match(exp))
{
}
    else 
{
 alert("Enter Valid status...");
dvar7.focus();
return false;
}
}
}
</script>
<form name="Doctor_hospital_Add.php" action="Doctor_hospital_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Doctor Hospital Add</h3>
</div>
</div>

	<?php
	  if($userlevel!=2)
	  {
	  ?>
		  
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Doctor</b></label>
          <td><select  name="slb_doctor_id"  class="form-control"  id="slb_doctor_id">
           <option value="">--Select--</option>
     <?php
      include 'dbconnect.php';
      $db=new dbconnect();
      $varslbsqldoctor_id="select * from doctor";
      $varresultdoctor_id=mysql_query($varslbsqldoctor_id)or die(mysql_error());
        while($rowdoctor_id =mysql_fetch_array($varresultdoctor_id))
          { ?>
           <option value="<?php echo $rowdoctor_id[0]; ?>"><?php echo $rowdoctor_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
		<?php
	        }
		  ?>
		  <?php
		  if($userlevel!=3)
		  {
		  ?>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Hospital</b></label>
          <td><select  name="slb_hospital_id"  class="form-control"  id="slb_hospital_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlhospital_id="select * from hospital";
      $varresulthospital_id=mysql_query($varslbsqlhospital_id)or die(mysql_error());
        while($rowhospital_id =mysql_fetch_array($varresulthospital_id))
          { ?>
           <option value="<?php echo $rowhospital_id[0]; ?>"><?php echo $rowhospital_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
		 <?php
		  }
		  ?>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Doctor Time</b></label>
          <td><select  name="slb_doctor_time_id"  class="form-control"  id="slb_doctor_time_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldoctor_time_id="select * from doctor_time";
      $varresultdoctor_time_id=mysql_query($varslbsqldoctor_time_id)or die(mysql_error());
        while($rowdoctor_time_id =mysql_fetch_array($varresultdoctor_time_id))
          { ?>
           <option value="<?php echo $rowdoctor_time_id[0]; ?>"><?php echo $rowdoctor_time_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Day Name</b></label>
		  <select  name="txt_day_type"  id="txt_day_type" class="form-control">
           <option value="">--Select--</option>
           <option value="Sun">Sunday</option>
           <option value="Mon">Monday</option>
		   <option value="Tue">Tuesday</option>
           <option value="Wed">Wednesday</option>
		   <option value="Thu">Thursday</option>
           <option value="Fri">Friday</option> 
		   <option value="Sat">Saturday</option>       
		   </select>
          
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Designation</b></label>
          <td><select  name="slb_designation_id"  class="form-control"  id="slb_designation_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldesignation_id="select * from designation";
      $varresultdesignation_id=mysql_query($varslbsqldesignation_id)or die(mysql_error());
        while($rowdesignation_id =mysql_fetch_array($varresultdesignation_id))
          { ?>
           <option value="<?php echo $rowdesignation_id[0]; ?>"><?php echo $rowdesignation_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Department</b></label>
          <td><select  name="slb_department_id"  class="form-control"  id="slb_department_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldepartment_id="select * from department";
      $varresultdepartment_id=mysql_query($varslbsqldepartment_id)or die(mysql_error());
        while($rowdepartment_id =mysql_fetch_array($varresultdepartment_id))
          { ?>
           <option value="<?php echo $rowdepartment_id[0]; ?>"><?php echo $rowdepartment_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>
