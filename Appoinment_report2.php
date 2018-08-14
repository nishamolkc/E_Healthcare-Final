      <?php include 'aheader.php';
	  include 'dbconnect.php';
      $db=new dbconnect(); ?>
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
 var  dvar2 = document.getElementById("slb_doctor_id");
if(dvar2.value=="")
{
 alert("Select Doctor Name ...");
dvar2.focus();
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
<form name="Appoinment_report2.php" action="Appoinment_select_report.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Appoinment Details</h3>
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Patient Name</b></label>
		  <select  name="slb_patient_master_id"  class="form-control"  id="slb_patient_master_id">
     <?php
     
      $varslbsqlpatient_master_id="select * from patient_master";
      $varresultpatient_master_id=mysql_query($varslbsqlpatient_master_id)or die(mysql_error());
        while($rowpatient_master_id =mysql_fetch_array($varresultpatient_master_id))
          { ?>
           <option value="<?php echo $rowpatient_master_id[0]; ?>"><?php echo $rowpatient_master_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor Name</b></label>
          <select  name="slb_doctor_id" class="form-control"  id="slb_doctor_id">
     <?php
      $varslbsqldoctor_id="select * from doctor";
      $varresultdoctor_id=mysql_query($varslbsqldoctor_id)or die(mysql_error());
        while($rowdoctor_id =mysql_fetch_array($varresultdoctor_id))
          { ?>
           <option value="<?php echo $rowdoctor_id[0]; ?>"><?php echo $rowdoctor_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Status</b></label>
          <select  name="txt_status" class="form-control"  id="txt_status">
           <option value="">Select</option>
           <option value="1">Consulted</option>
           <option value="0">Pending</option>
          </select>
</div>
</div>
     
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" style="color:#000066"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Show"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>

</body>
</html>
      <?php include 'footer.php'; ?>
