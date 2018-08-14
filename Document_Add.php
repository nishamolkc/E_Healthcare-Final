      <?php include 'aheader.php'; 
	  include 'dbconnect.php';
     	 $db=new dbconnect();
		 $var_id=$_GET['mvarid'];
	   $varsqlpatient="select appoinment.id,appoinment.app_date,patient_master.patient_name from appoinment,patient_master where appoinment.patient_master_id=patient_master.id and appoinment.id='$var_id'";
	  $varresult1=mysql_query($varsqlpatient)or die(mysql_error());
	  $varresult=mysql_fetch_array($varresult1);?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_uploaded_date");
if(dvar1.value=="")
{
 alert("Enter uploaded_date...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_title");
if(dvar2.value=="")
{
 alert("Enter title...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_file_path");
if(dvar3.value=="")
{
 alert("Enter file_path...");
dvar3.focus();
return false;
}
 
 var  dvar5 = document.getElementById("txt_investigations");
if(dvar5.value=="")
{
 alert("Enter investigations...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("slb_appoinment_id");
if(dvar6.value=="")
{
 alert("Select Appoinment Name ...");
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
$('#txt_uploaded_date').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="Document_Add.php" action="Document_Action.php" method="post" enctype="multipart/form-data" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Document Details</h3>
</div>
</div>

	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Appoinment ID</b></label>
		  <input type="text" name="slb_appoinment_id" readonly="readonly" class="form-control" id="slb_appoinment_id" value="<?php echo $var_id; ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Patient Name</b></label>
		  <input type="text" name="txt_Patient" readonly="readonly" class="form-control" id="txt_Patient" value="<?php echo $varresult['patient_name']; ?>">
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Uploaded Date</b></label>
          <td><input type="text" name="txt_uploaded_date"  class="form-control" id="txt_uploaded_date" value="<?php echo date("Y/m/d") ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Title</b></label>
          <td><input type="text" name="txt_title"  class="form-control" id="txt_title" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>File Path</b></label>
          <td><input type="file" name="txt_file_path"  class="form-control" id="txt_file_path" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Description</b></label>
          <td><input type="text" name="txt_description"  class="form-control" id="txt_description" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Investigations</b></label>
          <td><input type="text" name="txt_investigations"  class="form-control" id="txt_investigations" value=""></td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" ><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Save"></td>
          
</div>
</div>
</div>
</div>
