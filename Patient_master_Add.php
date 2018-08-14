      <?php include 'aheader.php'; 
	  include 'dbconnect.php';
      $db=new dbconnect();?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_patient_name");
if(dvar1.value=="")
{
 alert("Enter patient name...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_card_number");
if(dvar2.value=="")
{
 alert("Enter card number...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_card_type");
if(dvar3.value=="")
{
 alert("Enter card type...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_date_of_birth");
if(dvar4.value=="")
{
 alert("Enter date of birth...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("txt_gender");
if(dvar5.value=="")
{
 alert("Enter gender...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_mobile_number");
if(dvar6.value=="")
{
 alert("Enter mobile number...");
dvar6.focus();
return false;
}
var  JVarMob = document.getElementById("txt_mobile_number").value;
if(JVarMob.length!=10)
{
 alert("Enter 10 Digit Mobile Number .");
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
 alert("Enter Valid mobile...");
dvar6.focus();
return false;
}
}
 var  dvar7 = document.getElementById("txt_email");
if(dvar7.value=="")
{
 alert("Enter email...");
dvar7.focus();
return false;
}
  else 
{
  var expr=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!expr.test(dvar7.value))
{
 alert("Enter Valid Email ID ...");
dvar7.focus();
return false;
}
}
 var  dvar8 = document.getElementById("txt_house_name");
if(dvar8.value=="")
{
 alert("Enter house_name...");
dvar8.focus();
return false;
}
 var  dvar9 = document.getElementById("txt_post_office");
if(dvar9.value=="")
{
 alert("Enter post_office...");
dvar9.focus();
return false;
}
 var  dvar10 = document.getElementById("slb_district_id");
if(dvar10.value=="")
{
 alert("Select District Name ...");
dvar10.focus();
return false;
}
 var  dvar11 = document.getElementById("slb_city_id");
if(dvar11.value=="")
{
 alert("Select City Name ...");
dvar11.focus();
return false;
}
 var  dvar12 = document.getElementById("slb_blood_group_id");
if(dvar12.value=="")
{
 alert("Select Blood Group ...");
dvar12.focus();
return false;
}
 var  dvar13 = document.getElementById("txt_image_path");
if(dvar13.value=="")
{
 alert("Enter image path...");
dvar13.focus();
return false;
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
 <script type="text/javascript">
  $(document).ready(function()
{
 $("#slb_district_id").change(function (){

    //alert($(this).val());
  //var dataString = 'relid='+ $(this).val(); 
    $.post('get_district.php' ,{id:$(this).val()} , function(data) {      
       //alert(data);
        $("#slb_city_id").empty().append(data);
    }, 'html'); 
 });
 });
</script>
<form name="Patient_master_Add.php" action="Patient_master_Action.php" method="post" enctype="multipart/form-data" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Patient Details</h3>
</div>
</div>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Patient Name</b></label>
          <td><input type="text" name="txt_patient_name"  class="form-control" id="txt_patient_name" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Card Type</b></label>
		  <select  name="txt_card_type"  class="form-control" id="txt_card_type">
           <option value="">Select</option>
           <option value="Adhar">Adhar</option>
           <option value="Voters_id">Voters id</option>
		   <option value="Passport">Passport</option>
           <option value="Ration_card">Ration card</option>
		   <option value="PAN">PAN card</option>
           <option value="Driving_license">Driving license</option>       
		   </select>
</div>
</div>
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Card Number</b></label>
          <td><input type="text" name="txt_card_number"  class="form-control" id="txt_card_number" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Date Of Birth</b></label>
          <td><input type="text" name="txt_date_of_birth"  class="form-control" id="txt_date_of_birth" value="<?php echo date("Y/m/d") ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Gender</b></label>
		  <select class="form-control"  name="txt_gender"  id="txt_gender">
           <option value="">Select</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
          </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Mobile Number</b></label>
          <td><input type="text" name="txt_mobile_number"  class="form-control" id="txt_mobile_number" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Email</b></label>
          <td><input type="text" name="txt_email"  class="form-control" id="txt_email" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>House Name</b></label>
          <td><input type="text" name="txt_house_name"  class="form-control" id="txt_house_name" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Post Office</b></label>
          <td><input type="text" name="txt_post_office"  class="form-control" id="txt_post_office" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>District</b></label>
          <select  name="slb_district_id" class="form-control"  id="slb_district_id">
          <option value="">Select</option>
     <?php
      
      $varslbsqldistrict_id="select * from district";
      $varresultdistrict_id=mysql_query($varslbsqldistrict_id)or die(mysql_error());
        while($rowdistrict_id =mysql_fetch_array($varresultdistrict_id))
          { ?>
           <option value="<?php echo $rowdistrict_id[0]; ?>"><?php echo $rowdistrict_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>City</b></label>
          <select  name="slb_city_id" class="form-control" id="slb_city_id">
		   <option value="">Select</option>
		   <?php
      $varslbsqlcity_id="select * from city";
      $varresultcity_id=mysql_query($varslbsqlcity_id)or die(mysql_error());
        while($rowcity_id =mysql_fetch_array($varresultcity_id))
          { ?>
           <option value="<?php echo $rowcity_id[0]; ?>"><?php echo $rowcity_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Blood Group</b></label>
          <td><select  name="slb_blood_group_id"  class="form-control"  id="slb_blood_group_id">
           <option value="">--Select--</option>
     <?php
      
      $varslbsqlblood_group_id="select * from blood_group";
      $varresultblood_group_id=mysql_query($varslbsqlblood_group_id)or die(mysql_error());
        while($rowblood_group_id =mysql_fetch_array($varresultblood_group_id))
          { ?>
           <option value="<?php echo $rowblood_group_id[0]; ?>"><?php echo $rowblood_group_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Profile Photo</b></label>
          <td><input type="file" name="file"class="form-control" id="file"></td>
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
