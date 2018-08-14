      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from prescription where appoinment_id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_appoinment_id=$_POST['slb_appoinment_id'];
          $var_present_illness=$_POST['txt_present_illness'];
          $var_diagnosis=$_POST['txt_diagnosis'];
          $var_history=$_POST['txt_history'];
          $var_investigations=$_POST['txt_investigations'];
          $var_prescriptions=$_POST['txt_prescriptions'];
          $var_remarks=$_POST['txt_remarks'];
          $var_medical_lab_history=$_POST['txt_medical_lab_history'];
          $var_medical_store_history=$_POST['txt_medical_store_history'];
       $vareditsql="Update prescription  Set present_illness='$var_present_illness',diagnosis='$var_diagnosis',history='$var_history',investigations='$var_investigations',prescriptions='$var_prescriptions',remarks='$var_remarks',medical_lab_history='$var_medical_lab_history',medical_store_history='$var_medical_store_history' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
	  
      echo '<script>window.location = "Prescription_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_appoinment_id");
if(dvar1.value=="")
{
 alert("Select Appoinment Name ...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_present_illness");
if(dvar2.value=="")
{
 alert("Enter present_illness...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_diagnosis");
if(dvar3.value=="")
{
 alert("Enter diagnosis...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_history");
if(dvar4.value=="")
{
 alert("Enter history...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("txt_investigations");
if(dvar5.value=="")
{
 alert("Enter investigations...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_prescriptions");
if(dvar6.value=="")
{
 alert("Enter prescriptions...");
dvar6.focus();
return false;
}
 
 var  dvar8 = document.getElementById("txt_medical_lab_history");
if(dvar8.value=="")
{
 alert("Enter medical_lab_history...");
dvar8.focus();
return false;
}
 var  dvar9 = document.getElementById("txt_medical_store_history");
if(dvar9.value=="")
{
 alert("Enter medical_store_history...");
dvar9.focus();
return false;
}
}
</script>
<form name="Prescription_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Prescription Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Present Illness</b></label>
          <td><input type="text" name="txt_present_illness"  class="form-control" id="txt_present_illness" value="<?php echo $tbrow['present_illness']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Diagnosis</b></label>
          <td><input type="text" name="txt_diagnosis"  class="form-control" id="txt_diagnosis" value="<?php echo $tbrow['diagnosis']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>History</b></label>
          <td><input type="text" name="txt_history"  class="form-control" id="txt_history" value="<?php echo $tbrow['history']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Investigations</b></label>
          <td><input type="text" name="txt_investigations"  class="form-control" id="txt_investigations" value="<?php echo $tbrow['investigations']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Prescriptions</b></label>
          <td><input type="text" name="txt_prescriptions"  class="form-control" id="txt_prescriptions" value="<?php echo $tbrow['prescriptions']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Remarks</b></label>
          <td><input type="text" name="txt_remarks"  class="form-control" id="txt_remarks" value="<?php echo $tbrow['remarks']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Medical Lab History</b></label>
          <td><input type="text" name="txt_medical_lab_history"  class="form-control" id="txt_medical_lab_history" value="<?php echo $tbrow['medical_lab_history']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Medical Store History</b></label>
          <td><input type="text" name="txt_medical_store_history"  class="form-control" id="txt_medical_store_history" value="<?php echo $tbrow['medical_store_history']; ?>"></td>
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
