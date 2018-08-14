      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from medical_store where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_store_name=$_POST['txt_store_name'];
          $var_phone_number=$_POST['txt_phone_number'];
          $var_email=strtolower($_POST['txt_email']);
          $var_district_id=$_POST['slb_district_id'];
          $var_city_id=$_POST['slb_city_id'];
          $var_status=$_POST['txt_status'];
          $var_image_path=$_POST['txt_image_path'];
      $vareditsql="Update medical_store  Set store_name='$var_store_name',phone_number='$var_phone_number',email='$var_email',district_id='$var_district_id',city_id='$var_city_id',status='$var_status',image_path='$var_image_path' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Medical_store_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_store_name");
if(dvar1.value=="")
{
 alert("Enter store_name...");
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
 var  dvar4 = document.getElementById("slb_district_id");
if(dvar4.value=="")
{
 alert("Select District Name ...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("slb_city_id");
if(dvar5.value=="")
{
 alert("Select City Name ...");
dvar5.focus();
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
 var  dvar7 = document.getElementById("txt_image_path");
if(dvar7.value=="")
{
 alert("Enter image_path...");
dvar7.focus();
return false;
}
}
</script>
<form name="Medical_store_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Medical_store Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Store Name</b></label>
          <td><input type="text" name="txt_store_name"  class="form-control" id="txt_store_name" value="<?php echo $tbrow['store_name']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Phone Number</b></label>
          <td><input type="text" name="txt_phone_number"  class="form-control" id="txt_phone_number" value="<?php echo $tbrow['phone_number']; ?>"></td>
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
