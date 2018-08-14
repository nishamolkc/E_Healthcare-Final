      <?php include 'aheader.php'; include 'dbconnect.php';
      			  $db=new dbconnect();
				  ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_doctor_name");
if(dvar1.value=="")
{
 alert("Enter doctor_name...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_house_name");
if(dvar2.value=="")
{
 alert("Enter house_name...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("slb_city_id");
if(dvar3.value=="")
{
 alert("Select City Name ...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("slb_district_id");
if(dvar4.value=="")
{
 alert("Select District Name ...");
dvar4.focus();
return false;
}
 
 var  dvar7 = document.getElementById("txt_mobile_number");
if(dvar7.value=="")
{
 alert("Enter mobile_number...");
dvar7.focus();
return false;
}
var  JVarMob = document.getElementById("txt_mobile_number").value;
if(JVarMob.length!=10)
{
 alert("Enter 10 Digit Mobile Number .");
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
 alert("Enter Valid mobile...");
dvar7.focus();
return false;
}
}
 var  dvar8 = document.getElementById("txt_email");
if(dvar8.value=="")
{
 alert("Enter email...");
dvar8.focus();
return false;
}
  else 
{
  var expr=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!expr.test(dvar8.value))
{
 alert("Enter Valid Email ID ...");
dvar8.focus();
return false;
}
}
 var  dvar9 = document.getElementById("slb_specialization_id");
if(dvar9.value=="")
{
 alert("Select Specialization Name ...");
dvar9.focus();
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
<form name="Doctor_Add.php" action="Doctor_Action.php" enctype="multipart/form-data" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Doctor Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor Name</b></label>
          <td><input type="text" name="txt_doctor_name"  class="form-control" id="txt_doctor_name" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>House Name</b></label>
          <td><input type="text" name="txt_house_name"  class="form-control" id="txt_house_name" value=""></td>
</div>
</div>
 <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>District</b></label>
          <td><select  name="slb_district_id"  class="form-control"  id="slb_district_id">
           <option value="">--Select--</option>
     <?php
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
  
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Mobile Number</b></label>
          <td><input type="text" name="txt_mobile_number"  class="form-control" id="txt_mobile_number" value=""></td>
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
        <label for="exampleInputEmail1" style="color:#000066"><b>Specialization</b></label>
          <td><select  name="slb_specialization_id"  class="form-control"  id="slb_specialization_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlspecialization_id="select * from specialization";
      $varresultspecialization_id=mysql_query($varslbsqlspecialization_id)or die(mysql_error());
        while($rowspecialization_id =mysql_fetch_array($varresultspecialization_id))
          { ?>
           <option value="<?php echo $rowspecialization_id[0]; ?>"><?php echo $rowspecialization_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Image Path</b></label>
          <td><input type="file" name="file"  class="form-control" id="file"></td>
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
