      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from experience where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_doctor_id=$_POST['slb_doctor_id'];
          $var_hospital_name=$_POST['txt_hospital_name'];
          $var_location=$_POST['txt_location'];
          $var_designation_id=$_POST['slb_designation_id'];
          $var_from_date=$_POST['txt_from_date'];
          $var_to_date=$_POST['txt_to_date'];
      $vareditsql="Update experience  Set doctor_id='$var_doctor_id',hospital_name='$var_hospital_name',location='$var_location',designation_id='$var_designation_id',from_date='$var_from_date',to_date='$var_to_date' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Experience_Select.php?pp=1";</script>';
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
 var  dvar2 = document.getElementById("txt_hospital_name");
if(dvar2.value=="")
{
 alert("Enter hospital_name...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_location");
if(dvar3.value=="")
{
 alert("Enter location...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("slb_designation_id");
if(dvar4.value=="")
{
 alert("Select Designation Name ...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("txt_from_date");
if(dvar5.value=="")
{
 alert("Enter from_date...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_to_date");
if(dvar6.value=="")
{
 alert("Enter to_date...");
dvar6.focus();
return false;
}
}
</script>
 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">
 $(function(){
$('#txt_from_date').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">
 $(function(){
$('#txt_to_date').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="Experience_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Experience Details</h3>
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
        <label for="exampleInputEmail1" style="color:#000066"><b>Hospital Name</b></label>
          <td><input type="text" name="txt_hospital_name"  class="form-control" id="txt_hospital_name" value="<?php echo $tbrow['hospital_name']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Location</b></label>
          <td><input type="text" name="txt_location"  class="form-control" id="txt_location" value="<?php echo $tbrow['location']; ?>"></td>
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
        <label for="exampleInputEmail1" style="color:#000066"><b>From Date</b></label>
          <td><input type="text" name="txt_from_date"  class="form-control" id="txt_from_date" value="<?php echo $tbrow['from_date']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>To Date</b></label>
          <td><input type="text" name="txt_to_date"  class="form-control" id="txt_to_date" value="<?php echo $tbrow['to_date']; ?>"></td>
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
