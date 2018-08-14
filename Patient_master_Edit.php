      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from patient_master where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_patient_name=$_POST['txt_patient_name'];
          $var_card_number=$_POST['txt_card_number'];
          $var_card_type=$_POST['txt_card_type'];
          $var_date_of_birth=$_POST['txt_date_of_birth'];
          $var_gender=$_POST['txt_gender'];
          $var_mobile_number=$_POST['txt_mobile_number'];
          $var_email=strtolower($_POST['txt_email']);
          $var_house_name=$_POST['txt_house_name'];
          $var_post_office=$_POST['txt_post_office'];
          $var_district_id=$_POST['slb_district_id'];
          $var_city_id=$_POST['slb_city_id'];
          $var_blood_group_id=$_POST['slb_blood_group_id'];
          $var_image_path=$_POST['txt_image_path'];
          
      $vareditsql="Update patient_master  Set patient_name='$var_patient_name',card_number='$var_card_number',card_type='$var_card_type',date_of_birth='$var_date_of_birth',gender='$var_gender',mobile_number='$var_mobile_number',email='$var_email',house_name='$var_house_name',post_office='$var_post_office',district_id='$var_district_id',city_id='$var_city_id',blood_group_id='$var_blood_group_id',image_path='$var_image_path' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Patient_master_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
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
 var  dvar2 = document.getElementById("txt_card_number");
if(dvar2.value=="")
{
 alert("Enter card_number...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_card_type");
if(dvar3.value=="")
{
 alert("Enter card_type...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_date_of_birth");
if(dvar4.value=="")
{
 alert("Enter date_of_birth...");
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
 alert("Select Blood_group Name ...");
dvar12.focus();
return false;
}
 var  dvar13 = document.getElementById("txt_image_path");
if(dvar13.value=="")
{
 alert("Enter image_path...");
dvar13.focus();
return false;
}
}
</script>
<form name="Patient_master_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" > Modify Patient Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Patient Name</b></label>
          <td><input type="text" name="txt_patient_name"  class="form-control" id="txt_patient_name" value="<?php echo $tbrow['patient_name']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Card Number</b></label>
          <td><input type="text" name="txt_card_number"  class="form-control" id="txt_card_number" value="<?php echo $tbrow['card_number']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Card Type</b></label>
		  <select  name="txt_card_type" class="form-control" id="txt_card_type">
           <option value="Adhar" <?php if($tbrow['card_type']=='Adhar') { ?> selected  <?php } ?>>Adhar</option>
           <option value="Voters Id" <?php if($tbrow['card_type']=='Voters Id') { ?> selected  <?php } ?>>Voters Id</option>
		   <option value="Passport" <?php if($tbrow['card_type']=='Passport') { ?> selected  <?php } ?>>Passport</option>
           <option value="Ration Card" <?php if($tbrow['card_type']=='Ration Card') { ?> selected  <?php } ?>>Ration card</option>
		   <option value="PAN" <?php if($tbrow['card_type']=='PAN') { ?> selected  <?php } ?>>PAN card</option>
           <option value="Driving License" <?php if($tbrow['card_type']=='Driving License') { ?> selected  <?php } ?>>Driving license</option>          
		  </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Date Of Birth</b></label>
          <td><input type="text" name="txt_date_of_birth"  class="form-control" id="txt_date_of_birth" value="<?php echo $tbrow['date_of_birth']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Gender</b></label>
		  <select  name="txt_gender" class="form-control" id="txt_gender">
           <option value="Male" <?php if($tbrow['gender']=='Male') { ?> selected  <?php } ?>>Male</option>
           <option value="Female" <?php if($tbrow['gender']=='Female') { ?> selected  <?php } ?>>Female</option>          
		  </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Mobile Number</b></label>
          <td><input type="text" name="txt_mobile_number"  class="form-control" id="txt_mobile_number" value="<?php echo $tbrow['mobile_number']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Email</b></label>
          <td><input type="text" name="txt_email"  class="form-control" id="txt_email" value="<?php echo $tbrow['email']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>House Name</b></label>
          <td><input type="text" name="txt_house_name"  class="form-control" id="txt_house_name" value="<?php echo $tbrow['house_name']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Post Office</b></label>
          <td><input type="text" name="txt_post_office"  class="form-control" id="txt_post_office" value="<?php echo $tbrow['post_office']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>District</b></label>
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
        <label for="exampleInputEmail1" ><b>City</b></label>
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
        <label for="exampleInputEmail1" ><b>Blood Group</b></label>
          <td><select  name="slb_blood_group_id"  class="form-control"  id="slb_blood_group_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlblood_group_id="select * from blood_group";
      $varresultblood_group_id=mysql_query($varslbsqlblood_group_id)or die(mysql_error());
        while($rowblood_group_id =mysql_fetch_array($varresultblood_group_id))
          { ?>
           <option value="<?php echo $rowblood_group_id[0]; ?>"<?php if($rowblood_group_id[0]==$tbrow['blood_group_id']) {?> selected<?php }?>><?php echo $rowblood_group_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Image Path</b></label>
          <td><input type="text" name="txt_image_path"  class="form-control" id="txt_image_path" value="<?php echo $tbrow['image_path']; ?>"></td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" ><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="CmdSave" id="CmdSave" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>
