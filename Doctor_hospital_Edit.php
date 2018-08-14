      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from doctor_hospital where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_doctor_id=$_POST['slb_doctor_id'];
          $var_hospital_id=$_POST['slb_hospital_id'];
          $var_doctor_time_id=$_POST['slb_doctor_time_id'];
          $var_day_name=$_POST['txt_day_name'];
          $var_designation_id=$_POST['slb_designation_id'];
          $var_department_id=$_POST['slb_department_id'];
          $var_status=$_POST['txt_status'];
      $vareditsql="Update doctor_hospital  Set doctor_id='$var_doctor_id',hospital_id='$var_hospital_id',doctor_time_id='$var_doctor_time_id',day_name='$var_day_name',designation_id='$var_designation_id',department_id='$var_department_id',status='$var_status' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Doctor_hospital_Select.php?pp=1";</script>';
      }
      ?>
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
<form name="Doctor_hospital_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Doctor_hospital Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor</b></label>
          <td><select  name="slb_doctor_id"  class="form-control"  id="slb_doctor_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldoctor_id="select * from doctor";
      $varresultdoctor_id=mysql_query($varslbsqldoctor_id)or die(mysql_error());
        while($rowdoctor_id =mysql_fetch_array($varresultdoctor_id))
          { ?>
           <option value="<?php echo $rowdoctor_id[0]; ?>"<?php if($rowdoctor_id[0]==$tbrow['doctor_id']) {?> selected<?php }?>><?php echo $rowdoctor_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Hospital</b></label>
          <td><select  name="slb_hospital_id"  class="form-control"  id="slb_hospital_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlhospital_id="select * from hospital";
      $varresulthospital_id=mysql_query($varslbsqlhospital_id)or die(mysql_error());
        while($rowhospital_id =mysql_fetch_array($varresulthospital_id))
          { ?>
           <option value="<?php echo $rowhospital_id[0]; ?>"<?php if($rowhospital_id[0]==$tbrow['hospital_id']) {?> selected<?php }?>><?php echo $rowhospital_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor Time</b></label>
          <td><select  name="slb_doctor_time_id"  class="form-control"  id="slb_doctor_time_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldoctor_time_id="select * from doctor_time";
      $varresultdoctor_time_id=mysql_query($varslbsqldoctor_time_id)or die(mysql_error());
        while($rowdoctor_time_id =mysql_fetch_array($varresultdoctor_time_id))
          { ?>
           <option value="<?php echo $rowdoctor_time_id[0]; ?>"<?php if($rowdoctor_time_id[0]==$tbrow['doctor_time_id']) {?> selected<?php }?>><?php echo $rowdoctor_time_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Day Name</b></label>
          <td><input type="text" name="txt_day_name"  class="form-control" id="txt_day_name" value="<?php echo $tbrow['day_name']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Designation</b></label>
          <td><select  name="slb_designation_id"  class="form-control"  id="slb_designation_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldesignation_id="select * from designation";
      $varresultdesignation_id=mysql_query($varslbsqldesignation_id)or die(mysql_error());
        while($rowdesignation_id =mysql_fetch_array($varresultdesignation_id))
          { ?>
           <option value="<?php echo $rowdesignation_id[0]; ?>"<?php if($rowdesignation_id[0]==$tbrow['designation_id']) {?> selected<?php }?>><?php echo $rowdesignation_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Department</b></label>
          <td><select  name="slb_department_id"  class="form-control"  id="slb_department_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldepartment_id="select * from department";
      $varresultdepartment_id=mysql_query($varslbsqldepartment_id)or die(mysql_error());
        while($rowdepartment_id =mysql_fetch_array($varresultdepartment_id))
          { ?>
           <option value="<?php echo $rowdepartment_id[0]; ?>"<?php if($rowdepartment_id[0]==$tbrow['department_id']) {?> selected<?php }?>><?php echo $rowdepartment_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Status</b></label>
          <td><input type="text" name="txt_status"  class="form-control" id="txt_status" value="<?php echo $tbrow['status']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" style="color:#000066"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="CmdSave" id=CmdSave"" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>
