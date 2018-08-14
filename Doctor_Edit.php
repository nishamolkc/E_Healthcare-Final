      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
	   $username=$_SESSION['username'];
      $varsql="select * from doctor where email='$username'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_doctor_name=$_POST['txt_doctor_name'];
          $var_house_name=$_POST['txt_house_name'];
          $var_city_id=$_POST['slb_city_id'];
          $var_district_id=$_POST['slb_district_id'];
          $var_card=$_POST['txt_card'];
          $var_card_no=$_POST['txt_card_no'];
          $var_mobile_number=$_POST['txt_mobile_number'];
          $var_email=strtolower($_POST['txt_email']);
          $var_specialization_id=$_POST['slb_specialization_id'];
          $var_status=$_POST['txt_status'];
          $var_image_path=$_POST['txt_image_path'];
      $vareditsql="Update doctor  Set doctor_name='$var_doctor_name',house_name='$var_house_name',city_id='$var_city_id',district_id='$var_district_id',card='$var_card',card_no='$var_card_no',mobile_number='$var_mobile_number',email='$var_email',specialization_id='$var_specialization_id',status='$var_status',image_path='$var_image_path' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "home.php?pp=1";</script>';
      }
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
 var  dvar5 = document.getElementById("txt_card");
if(dvar5.value=="")
{
 alert("Enter card...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_card_no");
if(dvar6.value=="")
{
 alert("Enter card_no...");
dvar6.focus();
return false;
}
 var  dvar7 = document.getElementById("txt_mobile_number");
if(dvar7.value=="")
{
 alert("Enter mobile_number...");
dvar7.focus();
return false;
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
 var  dvar10 = document.getElementById("txt_status");
if(dvar10.value=="")
{
 alert("Enter status...");
dvar10.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar10.value.match(exp))
{
}
    else 
{
 alert("Enter Valid status...");
dvar10.focus();
return false;
}
}
 var  dvar11 = document.getElementById("txt_image_path");
if(dvar11.value=="")
{
 alert("Enter image_path...");
dvar11.focus();
return false;
}
}
</script>
<form name="Doctor_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Doctor Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor Name</b></label>
          <td><input type="text" name="txt_doctor_name"  class="form-control" id="txt_doctor_name" value="<?php echo $tbrow['doctor_name']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>House Name</b></label>
          <td><input type="text" name="txt_house_name"  class="form-control" id="txt_house_name" value="<?php echo $tbrow['house_name']; ?>"></td>
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
           <option value="<?php echo $rowcity_id[0]; ?>"<?php if($rowcity_id[0]==$tbrow['city_id']) {?> selected<?php }?>><?php echo $rowcity_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
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
           <option value="<?php echo $rowdistrict_id[0]; ?>"<?php if($rowdistrict_id[0]==$tbrow['district_id']) {?> selected<?php }?>><?php echo $rowdistrict_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Card</b></label>
          <td><input type="text" name="txt_card"  class="form-control" id="txt_card" value="<?php echo $tbrow['card']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Card No</b></label>
          <td><input type="text" name="txt_card_no"  class="form-control" id="txt_card_no" value="<?php echo $tbrow['card_no']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Mobile Number</b></label>
          <td><input type="text" name="txt_mobile_number"  class="form-control" id="txt_mobile_number" value="<?php echo $tbrow['mobile_number']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Email</b></label>
          <td><input type="text" name="txt_email"  class="form-control" id="txt_email" value="<?php echo $tbrow['email']; ?>"></td>
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
           <option value="<?php echo $rowspecialization_id[0]; ?>"<?php if($rowspecialization_id[0]==$tbrow['specialization_id']) {?> selected<?php }?>><?php echo $rowspecialization_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Status</b></label>
          <td><input type="text" name="txt_status"  class="form-control" id="txt_status" value="<?php echo $tbrow['status']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Image Path</b></label>
          <td><input type="text" name="txt_image_path"  class="form-control" id="txt_image_path" value="<?php echo $tbrow['image_path']; ?>"></td>
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
