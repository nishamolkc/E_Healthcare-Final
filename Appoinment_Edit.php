      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from appoinment where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_patient_master_id=$_POST['slb_patient_master_id'];
          $var_hospital_id=$_POST['slb_hospital_id'];
          $var_doctor_id=$_POST['slb_doctor_id'];
          $var_app_date=$_POST['txt_app_date'];
          $var_description=$_POST['txt_description'];
          $var_status=$_POST['txt_status'];
          $var_token=$_POST['txt_token'];
          $var_doctor_time_id=$_POST['slb_doctor_time_id'];
          $var_card_number=$_POST['txt_card_number'];
          $var_card_type=$_POST['txt_card_type'];
          $var_cvv=$_POST['txt_cvv'];
          $var_amount=$_POST['txt_amount'];
      $vareditsql="Update appoinment  Set patient_master_id='$var_patient_master_id',hospital_id='$var_hospital_id',doctor_id='$var_doctor_id',app_date='$var_app_date',description='$var_description',status='$var_status',token='$var_token',doctor_time_id='$var_doctor_time_id',card_number='$var_card_number',card_type='$var_card_type',cvv='$var_cvv',amount='$var_amount' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Appoinment_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_patient_master_id");
if(dvar1.value=="")
{
 alert("Select Patient_master Name ...");
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
 var  dvar3 = document.getElementById("slb_doctor_id");
if(dvar3.value=="")
{
 alert("Select Doctor Name ...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_app_date");
if(dvar4.value=="")
{
 alert("Enter app_date...");
dvar4.focus();
return false;
}
 
 var  dvar6 = document.getElementById("txt_status");
if(dvar6.value=="")
{
 alert("Enter status...");
dvar6.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar6.value.match(exp))
{
}
    else 
{
 alert("Enter Valid status...");
dvar6.focus();
return false;
}
}
 var  dvar7 = document.getElementById("txt_token");
if(dvar7.value=="")
{
 alert("Enter token...");
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
 alert("Enter Valid token...");
dvar7.focus();
return false;
}
}
 var  dvar8 = document.getElementById("slb_doctor_time_id");
if(dvar8.value=="")
{
 alert("Select Doctor_time Name ...");
dvar8.focus();
return false;
}
 var  dvar9 = document.getElementById("txt_card_number");
if(dvar9.value=="")
{
 alert("Enter card_number...");
dvar9.focus();
return false;
}
 var  dvar10 = document.getElementById("txt_card_type");
if(dvar10.value=="")
{
 alert("Enter card_type...");
dvar10.focus();
return false;
}
 var  dvar11 = document.getElementById("txt_cvv");
if(dvar11.value=="")
{
 alert("Enter cvv...");
dvar11.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar11.value.match(exp))
{
}
    else 
{
 alert("Enter Valid cvv...");
dvar11.focus();
return false;
}
}
 var  dvar12 = document.getElementById("txt_amount");
if(dvar12.value=="")
{
 alert("Enter amount...");
dvar12.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar12.value.match(exp))
{
}
    else 
{
 alert("Enter Valid amount...");
dvar12.focus();
return false;
}
}
}
</script>
 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">
 $(function(){
$('#txt_app_date').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="Appoinment_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Appoinment Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Patient Master</b></label>
          <td><select  name="slb_patient_master_id"  class="form-control"  id="slb_patient_master_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlpatient_master_id="select * from patient_master";
      $varresultpatient_master_id=mysql_query($varslbsqlpatient_master_id)or die(mysql_error());
        while($rowpatient_master_id =mysql_fetch_array($varresultpatient_master_id))
          { ?>
           <option value="<?php echo $rowpatient_master_id[0]; ?>"<?php if($rowpatient_master_id[0]==$tbrow['patient_master_id']) {?> selected<?php }?>><?php echo $rowpatient_master_id[1]; ?></option>
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
        <label for="exampleInputEmail1" style="color:#000066"><b>App Date</b></label>
          <td><input type="text" name="txt_app_date"  class="form-control" id="txt_app_date" value="<?php echo $tbrow['app_date']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Description</b></label>
          <td><input type="text" name="txt_description"  class="form-control" id="txt_description" value="<?php echo $tbrow['description']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Status</b></label>
          <td><input type="text" name="txt_status"  class="form-control" id="txt_status" value="<?php echo $tbrow['status']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Token</b></label>
          <td><input type="text" name="txt_token"  class="form-control" id="txt_token" value="<?php echo $tbrow['token']; ?>"></td>
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
        <label for="exampleInputEmail1" style="color:#000066"><b>Card Number</b></label>
          <td><input type="text" name="txt_card_number"  class="form-control" id="txt_card_number" value="<?php echo $tbrow['card_number']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Card Type</b></label>
          <td><input type="text" name="txt_card_type"  class="form-control" id="txt_card_type" value="<?php echo $tbrow['card_type']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Cvv</b></label>
          <td><input type="text" name="txt_cvv"  class="form-control" id="txt_cvv" value="<?php echo $tbrow['cvv']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Amount</b></label>
          <td><input type="text" name="txt_amount"  class="form-control" id="txt_amount" value="<?php echo $tbrow['amount']; ?>"></td>
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
