      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from qualification_details where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_doctor_id=$_POST['slb_doctor_id'];
          $var_qualification_id=$_POST['slb_qualification_id'];
          $var_college=$_POST['txt_college'];
          $var_university=$_POST['txt_university'];
          $var_year=$_POST['txt_year'];
          $var_certificate_path=$_POST['txt_certificate_path'];
      $vareditsql="Update qualification_details  Set doctor_id='$var_doctor_id',qualification_id='$var_qualification_id',college='$var_college',university='$var_university',year='$var_year',certificate_path='$var_certificate_path' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Qualification_details_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_doctor_id");
if(dvar1.value=="")
{
 alert("Select Doctor Name ...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("slb_qualification_id");
if(dvar2.value=="")
{
 alert("Select Qualification Name ...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_college");
if(dvar3.value=="")
{
 alert("Enter college...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_university");
if(dvar4.value=="")
{
 alert("Enter university...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("txt_year");
if(dvar5.value=="")
{
 alert("Enter year...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_certificate_path");
if(dvar6.value=="")
{
 alert("Enter certificate_path...");
dvar6.focus();
return false;
}
}
</script>
<form name="Qualification_details_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Qualification_details Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor</b></label>
          <td><select  name="slb_doctor_id"  class="form-control"  id="slb_doctor_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldoctor_id="select * from doctor";
      $varresultdoctor_id=mysql_query($varslbsqldoctor_id)or die(mysql_error());
        while($rowdoctor_id =mysql_fetch_array($varresultdoctor_id))
          { ?>
           <option value="<?php echo $rowdoctor_id[0]; ?>"<?php if($rowdoctor_id[0]==$tbrow['doctor_id']) {?> selected<?php }?>><?php echo $rowdoctor_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Qualification</b></label>
          <td><select  name="slb_qualification_id"  class="form-control"  id="slb_qualification_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlqualification_id="select * from qualification";
      $varresultqualification_id=mysql_query($varslbsqlqualification_id)or die(mysql_error());
        while($rowqualification_id =mysql_fetch_array($varresultqualification_id))
          { ?>
           <option value="<?php echo $rowqualification_id[0]; ?>"<?php if($rowqualification_id[0]==$tbrow['qualification_id']) {?> selected<?php }?>><?php echo $rowqualification_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>College</b></label>
          <td><input type="text" name="txt_college"  class="form-control" id="txt_college" value="<?php echo $tbrow['college']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>University</b></label>
          <td><input type="text" name="txt_university"  class="form-control" id="txt_university" value="<?php echo $tbrow['university']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Year</b></label>
          <td><input type="text" name="txt_year"  class="form-control" id="txt_year" value="<?php echo $tbrow['year']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Certificate Path</b></label>
          <td><input type="text" name="txt_certificate_path"  class="form-control" id="txt_certificate_path" value="<?php echo $tbrow['certificate_path']; ?>"></td>
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
