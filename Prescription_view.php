      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
		   $userlevel=$_SESSION['userlevel'];
    $varsql="select prescription.*,appoinment.id,appoinment.app_date,patient_master.patient_name,doctor.doctor_name from appoinment,patient_master,doctor,prescription where appoinment.patient_master_id=patient_master.id and prescription.appoinment_id=appoinment.id and appoinment.doctor_id=doctor.id and appoinment.id='$var_id'";
		$varsql2=mysql_query($varsql);
		$tbrow=mysql_fetch_array($varsql2);
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
 var  dvar7 = document.getElementById("txt_remarks");
if(dvar7.value=="")
{
 alert("Enter remarks...");
dvar7.focus();
return false;
}
}
</script>
<form name="Prescription_view.php" action="Prescription_action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Prescription Details</h3>
</div>
</div>
<input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"/>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Appointment ID</b></label>
          <input type="text" name="slb_appoinment_id"  class="form-control" readonly="readonly" id="slb_appoinment_id" value="<?php echo $var_id; ?>">
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Patient Name</b></label>
          <input type="text" name="txt_Patient"  class="form-control" readonly="readonly" id="txt_Patient" value="<?php echo $tbrow['patient_name']; ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Appointment Date</b></label>
          <input type="text" name="txt_date"  class="form-control" readonly="readonly" id="txt_date" value="<?php echo $tbrow['app_date']; ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Present Illness</b></label>
          <textarea name="txt_present_illness"  class="form-control"  id="txt_present_illness" readonly="readonly" rows="3" cols="50"><?php echo $tbrow['present_illness']; ?></textarea>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Diagnosis</b></label>
          <textarea name="txt_diagnosis"  class="form-control"  id="txt_diagnosis" rows="3" cols="50"><?php echo $tbrow['diagnosis']; ?></textarea>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>History</b></label>
          <textarea name="txt_history"  class="form-control"  id="txt_history" readonly="readonly" rows="3" cols="50"><?php echo $tbrow['history']; ?></textarea>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Investigation</b></label>
          <textarea name="txt_investigations"  class="form-control"  id="txt_investigations" rows="3" cols="50"><?php echo $tbrow['investigations']; ?></textarea>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Prescrption</b></label>
          <textarea name="txt_prescriptions"  class="form-control"  id="txt_prescriptions"readonly="readonly" rows="3" cols="50"><?php echo $tbrow['prescriptions']; ?></textarea>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Remarks</b></label>
          <textarea name="txt_remarks"   id="txt_remarks" readonly="readonly" class="form-control"  rows="3" cols="50"><?php echo $tbrow['remarks']; ?></textarea>
</div>
</div>
<?php
		  if($userlevel!=3)
		  {
		  ?>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Medical Lab History</b></label>
          <textarea name="txt_lab_his"   id="txt_lab_his" class="form-control"  rows="3" cols="50"><?php echo $tbrow['medical_lab_history']; ?></textarea>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Medical Store History</b></label>
          <textarea name="txt_store_his" class="form-control"  id="txt_store_his" rows="3" cols="50"><?php echo $tbrow['medical_store_history']; ?></textarea>
</div>
</div>
<?php
	       }  
		  ?>
		  <?php
		  if($userlevel==5||$userlevel==6)
		  {
		  ?>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
<?php
	       }  
		  ?>
</div>

</body>
</form>
</html>
      <?php include 'footer.php'; ?>
