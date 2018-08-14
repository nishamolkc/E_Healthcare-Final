      <?php include 'aheader.php';
	  include 'dbconnect.php';
	  $db=new dbconnect();
	  $var_id=$_GET['mvarid'];
	  $username=$_SESSION['username'];
$userlevel=$_SESSION['userlevel'];
	  $varsqlpatient="select appoinment.id,appoinment.app_date,patient_master.patient_name from appoinment,patient_master where appoinment.patient_master_id=patient_master.id and appoinment.id='$var_id'";
	  $varresult=mysql_query($varsqlpatient)or die(mysql_error());
	  $result=mysql_fetch_array($varresult); ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_appoinment_id");
if(dvar1.value=="")
{
 alert("Select Appoinment ...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_present_illness");
if(dvar2.value=="")
{
 alert("Enter present illness...");
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
 
}
</script>
<form name="Prescription_Add.php" action="Prescription_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Prescription Details</h3>
</div>
</div>

   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Appoinment ID</b></label>
          <input type="text" name="slb_appoinment_id" readonly="readonly" class="form-control" id="slb_appoinment_id" value="<?php echo $var_id; ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Patient Name</b></label>
		  <input type="text" name="txt_Patient" readonly="readonly" class="form-control" id="txt_Patient" value="<?php echo $result[2]; ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Date</b></label>
		  <input type="text" name="txt_date" readonly="readonly" class="form-control" id="txt_date" value="<?php echo $result[1]; ?>">
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Present Illness</b></label>
          <td><input type="text" name="txt_present_illness"  class="form-control" id="txt_present_illness" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Diagnosis</b></label>
          <td><input type="text" name="txt_diagnosis"  class="form-control" id="txt_diagnosis" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>History</b></label>
          <td><input type="text" name="txt_history"  class="form-control" id="txt_history" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Investigations</b></label>
          <td><input type="text" name="txt_investigations"  class="form-control" id="txt_investigations" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Prescriptions</b></label>
          <td><input type="text" name="txt_prescriptions"  class="form-control" id="txt_prescriptions" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Remarks</b></label>
          <td><input type="text" name="txt_remarks"  class="form-control" id="txt_remarks" value=""></td>
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
