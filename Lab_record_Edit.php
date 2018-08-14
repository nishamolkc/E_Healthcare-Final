      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from lab_record where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_appoinment_id=$_POST['slb_appoinment_id'];
          $var_medical_lab_id=$_POST['slb_medical_lab_id'];
          $var_lab_test_id=$_POST['slb_lab_test_id'];
          $var_result=$_POST['txt_result'];
      $vareditsql="Update lab_record  Set appoinment_id='$var_appoinment_id',medical_lab_id='$var_medical_lab_id',lab_test_id='$var_lab_test_id',result='$var_result' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Lab_record_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_appoinment_id");
if(dvar1.value=="")
{
 alert("Select Appoinment Name ...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("slb_medical_lab_id");
if(dvar2.value=="")
{
 alert("Select Medical_lab Name ...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("slb_lab_test_id");
if(dvar3.value=="")
{
 alert("Select Lab_test Name ...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_result");
if(dvar4.value=="")
{
 alert("Enter result...");
dvar4.focus();
return false;
}
}
</script>
<form name="Lab_record_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Lab_record Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Appoinment</b></label>
          <td><select  name="slb_appoinment_id"  class="form-control"  id="slb_appoinment_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlappoinment_id="select * from appoinment";
      $varresultappoinment_id=mysql_query($varslbsqlappoinment_id)or die(mysql_error());
        while($rowappoinment_id =mysql_fetch_array($varresultappoinment_id))
          { ?>
           <option value="<?php echo $rowappoinment_id[0]; ?>"<?php if($rowappoinment_id[0]==$tbrow['appoinment_id']) {?> selected<?php }?>><?php echo $rowappoinment_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Medical Lab</b></label>
          <td><select  name="slb_medical_lab_id"  class="form-control"  id="slb_medical_lab_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlmedical_lab_id="select * from medical_lab";
      $varresultmedical_lab_id=mysql_query($varslbsqlmedical_lab_id)or die(mysql_error());
        while($rowmedical_lab_id =mysql_fetch_array($varresultmedical_lab_id))
          { ?>
           <option value="<?php echo $rowmedical_lab_id[0]; ?>"<?php if($rowmedical_lab_id[0]==$tbrow['medical_lab_id']) {?> selected<?php }?>><?php echo $rowmedical_lab_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Lab Test</b></label>
          <td><select  name="slb_lab_test_id"  class="form-control"  id="slb_lab_test_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqllab_test_id="select * from lab_test";
      $varresultlab_test_id=mysql_query($varslbsqllab_test_id)or die(mysql_error());
        while($rowlab_test_id =mysql_fetch_array($varresultlab_test_id))
          { ?>
           <option value="<?php echo $rowlab_test_id[0]; ?>"<?php if($rowlab_test_id[0]==$tbrow['lab_test_id']) {?> selected<?php }?>><?php echo $rowlab_test_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Result</b></label>
          <td><input type="text" name="txt_result"  class="form-control" id="txt_result" value="<?php echo $tbrow['result']; ?>"></td>
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
