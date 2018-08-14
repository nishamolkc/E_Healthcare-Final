      <?php include 'aheader.php'; 
	  include'dbconnect.php';
			$db=new dbconnect();
			$var1_id=$_GET['mvarid'];?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_patient_master_id");
if(dvar1.value=="")
{
 alert("Select Patient Name ...");
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
<script type="text/javascript">
  $(document).ready(function()
{
 $("#slb_doctor_id").change(function (){

   // alert($(this).val());
  //var dataString = 'relid='+ $(this).val(); 
    $.post('get_timing.php' ,{id:$(this).val(),dt:$("#txt_app_date").val(),hospital:$("#slb_hsptl_id").val()} , function(data) {      
        //alert(data);
        $("#slb_time_id").empty().append(data);
    }, 'html'); 
 });
 });
</script>
<script type="text/javascript">
  $(document).ready(function()
{
 $("#slb_hsptl_id").change(function (){

   //  alert($(this).val());
  //var dataString = 'relid='+ $(this).val(); 
    $.post('get_department.php' ,{id:$(this).val()} , function(data) {      
      // alert(data);
        $("#slb_department_id").empty().append(data);
    }, 'html'); 
 });
 });
</script>
<script type="text/javascript">
  $(document).ready(function()
{
 $("#slb_department_id").change(function (){

      //alert($(this).val());
  //var dataString = 'relid='+ $(this).val(); 
    $.post('get_doctor.php' ,{did:$(this).val(),hid:$(slb_hsptl_id).val()} , function(data) {      
       // alert(data);
        $("#slb_doctor_id").empty().append(data);
    }, 'html'); 
 });
 });
</script>
<script type="text/javascript">
$(document).ready(function()
{
$("#slb_time_id").change(function()
{
 //alert($(this).val());
		$.post('get_tocken.php',{id:$(this).val(),dt:$("#txt_app_date").val(),doctor:$("#slb_doctor_id").val(),hospital:$("#slb_hsptl_id").val()},function(data)
		{
		 	//alert(data);
		var tk=data.trim();
			$("#txt_token").val(tk);
		});
	});
});
</script>
<form name="Appoinment_Add.php" action="Appoinment_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Appoinment Details</h3>
</div>
</div>
	<input type="hidden" name="txt_id" id="txt_id" value="<?php echo $var1_id; ?>"/>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>App Date</b></label>
          <td><input type="text" name="txt_app_date"  class="form-control" id="txt_app_date" value="<?php echo date("Y/m/d") ?>"></td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Hospital</b></label>
          <select  name="slb_hsptl_id" class="form-control"  id="slb_hsptl_id">
		  <option value="">Select</option>
     <?php        
      $varslbsqlhsptl_id="select * from hospital";
      $varresulthsptl_id=mysql_query($varslbsqlhsptl_id)or die(mysql_error());
        while($rowhsptl_id =mysql_fetch_array($varresulthsptl_id))
          { ?>
           <option value="<?php echo $rowhsptl_id[0]; ?>"><?php echo $rowhsptl_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Department</b></label>
          <td><select  name="slb_department_id" class="form-control" id="slb_department_id">
		  <option value="">Select</option>
    
          </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor</b></label>
          <select  name="slb_doctor_id" class="form-control"  id="slb_doctor_id">
		  <option value="">Select</option>
          </select>
</div>
</div>
   
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Time</b></label>
          <select  name="slb_time_id" class="form-control"  id="slb_time_id">
		  <option value="">Select</option>
          </select>
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Card Number</b></label>
          <td><input type="text" name="txt_card_number"  class="form-control" id="txt_card_number" value=""></td>
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Card Type</b></label>
          <select  name="txt_card_type" class="form-control"  id="txt_card_type">
           <option value="">Select</option>
           <option value="Debit Card">Debit Card</option>
           <option value="Credit Card">Credit Card</option>
		   <option value="Rupee Card">Rupee Card</option>      
		   </select>
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Cvv</b></label>
          <td><input type="text" name="txt_cvv"  class="form-control" id="txt_cvv" value=""></td>
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Amount</b></label>
          <td><input type="text" readonly="readonly" name="txt_amount"  class="form-control" id="txt_amount" value="200"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Description</b></label>
          <td><input type="text" name="txt_description"  class="form-control" id="txt_description" value=""></td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Token</b></label>
          <td><input type="text" name="txt_token"  class="form-control" id="txt_token" value=""></td>
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
