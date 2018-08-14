      <?php include 'aheader.php'; ?>
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
<form name="Experience_Add.php" action="Experience_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Experience Details</h3>
</div>
</div>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor</b></label>
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
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Hospital Name</b></label>
          <td><input type="text" name="txt_hospital_name"  class="form-control" id="txt_hospital_name" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Location</b></label>
          <td><input type="text" name="txt_location"  class="form-control" id="txt_location" value=""></td>
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
           <option value="<?php echo $rowdesignation_id[0]; ?>"><?php echo $rowdesignation_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>From Date</b></label>
          <td><input type="text" name="txt_from_date"  class="form-control" id="txt_from_date" value="<?php echo date("Y/m/d") ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>To Date</b></label>
          <td><input type="text" name="txt_to_date"  class="form-control" id="txt_to_date" value="<?php echo date("Y/m/d") ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" style="color:#000066"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>
