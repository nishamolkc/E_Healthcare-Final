      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from hospital_department where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_hospital_id=$_POST['slb_hospital_id'];
          $var_department_id=$_POST['slb_department_id'];
      $vareditsql="Update hospital_department  Set hospital_id='$var_hospital_id',department_id='$var_department_id' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Hospital_department_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("slb_hospital_id");
if(dvar1.value=="")
{
 alert("Select Hospital Name ...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("slb_department_id");
if(dvar2.value=="")
{
 alert("Select Department Name ...");
dvar2.focus();
return false;
}
}
</script>
<form name="Hospital_department_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Hospital_department Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Hospital</b></label>
          <td><select  name="slb_hospital_id"  class="form-control"  id="slb_hospital_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqlhospital_id="select * from hospital";
      $varresulthospital_id=mysql_query($varslbsqlhospital_id)or die(mysql_error());
        while($rowhospital_id =mysql_fetch_array($varresulthospital_id))
          { ?>
           <option value="<?php echo $rowhospital_id[0]; ?>"<?php if($rowhospital_id[0]==$tbrow['hospital_id']) {?> selected<?php }?>><?php echo $rowhospital_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Department</b></label>
          <td><select  name="slb_department_id"  class="form-control"  id="slb_department_id">
           <option value="">--Select--</option>
     <?php
      $varslbsqldepartment_id="select * from department";
      $varresultdepartment_id=mysql_query($varslbsqldepartment_id)or die(mysql_error());
        while($rowdepartment_id =mysql_fetch_array($varresultdepartment_id))
          { ?>
           <option value="<?php echo $rowdepartment_id[0]; ?>"<?php if($rowdepartment_id[0]==$tbrow['department_id']) {?> selected<?php }?>><?php echo $rowdepartment_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
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
