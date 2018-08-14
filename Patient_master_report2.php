      <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect(); ?>
<html>
<head><center>
</center></head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_patient_name");
if(dvar1.value=="")
{
 alert("Enter patient_name...");
dvar1.focus();
return false;
}
 
 var  dvar5 = document.getElementById("txt_gender");
if(dvar5.value=="")
{
 alert("Enter gender...");
dvar5.focus();
return false;
}

 
 var  dvar11 = document.getElementById("slb_blood_group_id");
if(dvar11.value=="")
{
 alert("Select Blood_group Name ...");
dvar11.focus();
return false;
}
 
 var  dvar13 = document.getElementById("txt_status");
if(dvar13.value=="")
{
 alert("Enter status...");
dvar13.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar13.value.match(exp))
{
}
    else 
{
 alert("Enter Valid status...");
dvar13.focus();
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
$('#txt_date_of_birth').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="Patient_master_report2.php" action="Patient_master_select_report.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Patient Details</h3>
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Patient Name</b></label>
		  <input type="text" name="txt_patient_name" class="form-control" id="txt_patient_name" value="">
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Gender</b></label>
          <select  name="txt_gender"  class="form-control"  id="txt_gender">
           <option value="">--Select--</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
          </select>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Blood Group</b></label>
          <select  name="slb_blood_group_id"  class="form-control"  id="slb_blood_group_id">
		  <option value="">--Select--</option>
     <?php
      $varslbsqlblood_group_id="select * from blood_group";
      $varresultblood_group_id=mysql_query($varslbsqlblood_group_id)or die(mysql_error());
        while($rowblood_group_id =mysql_fetch_array($varresultblood_group_id))
          { ?>
           <option value="<?php echo $rowblood_group_id[0]; ?>"><?php echo $rowblood_group_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Status</b></label>
          <select  name="txt_status" class="form-control" class="form-control"  id="txt_status">
           <option value="">--Select--</option>
           <option value="1">Approved</option>
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
