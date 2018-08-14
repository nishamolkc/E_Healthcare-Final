      <?php include 'aheader.php'; ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_lab_name");
if(dvar1.value=="")
{
 alert("Enter lab_name...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_phone_number");
if(dvar2.value=="")
{
 alert("Enter phone_number...");
dvar2.focus();
return false;
}
var  JVarMob = document.getElementById("txt_phone_number").value;
if(JVarMob.length!=11)
{
 alert("Enter 11 Digit Phone Number .");
dvar2.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar2.value.match(exp))
{
}
    else 
{
 alert("Enter Valid Phone...");
dvar2.focus();
return false;
}
}
 var  dvar3 = document.getElementById("txt_email");
if(dvar3.value=="")
{
 alert("Enter email...");
dvar3.focus();
return false;
}
  else 
{
  var expr=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!expr.test(dvar3.value))
{
 alert("Enter Valid Email ID ...");
dvar3.focus();
return false;
}
}
 var  dvar4 = document.getElementById("txt_website");
if(dvar4.value=="")
{
 alert("Enter website...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("slb_district_id");
if(dvar5.value=="")
{
 alert("Select District Name ...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("slb_city_id");
if(dvar6.value=="")
{
 alert("Select City Name ...");
dvar6.focus();
return false;
}
 
  
}
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
<form name="Medical_lab_Add.php" action="Medical_lab_Action.php" enctype="multipart/form-data" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Medical_lab Details</h3>
</div>
</div>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Lab Name</b></label>
          <td><input type="text" name="txt_lab_name"  class="form-control" id="txt_lab_name" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Phone Number</b></label>
          <td><input type="text" name="txt_phone_number"  class="form-control" id="txt_phone_number" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Email</b></label>
          <td><input type="text" name="txt_email"  class="form-control" id="txt_email" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Website</b></label>
          <td><input type="text" name="txt_website"  class="form-control" id="txt_website" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>District</b></label>
          <td><select  name="slb_district_id"  class="form-control"  id="slb_district_id">
           <option value="">--Select--</option>
     <?php
      include 'dbconnect.php';
      $db=new dbconnect();
      $varslbsqldistrict_id="select * from district";
      $varresultdistrict_id=mysql_query($varslbsqldistrict_id)or die(mysql_error());
        while($rowdistrict_id =mysql_fetch_array($varresultdistrict_id))
          { ?>
           <option value="<?php echo $rowdistrict_id[0]; ?>"><?php echo $rowdistrict_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>City</b></label>
          <td><select  name="slb_city_id"  class="form-control"  id="slb_city_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlcity_id="select * from city";
      $varresultcity_id=mysql_query($varslbsqlcity_id)or die(mysql_error());
        while($rowcity_id =mysql_fetch_array($varresultcity_id))
          { ?>
           <option value="<?php echo $rowcity_id[0]; ?>"><?php echo $rowcity_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Image Path</b></label>
          <td><input type="file" name="file"class="form-control" id="file"></td>
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
