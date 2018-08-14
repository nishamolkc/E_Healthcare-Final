      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from reference_master where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_reference_date=$_POST['txt_reference_date'];
          $var_appoinment_id=$_POST['slb_appoinment_id'];
          $var_reason=$_POST['txt_reason'];
          $var_refer_appoinment=$_POST['txt_refer_appoinment'];
      $vareditsql="Update reference_master  Set reference_date='$var_reference_date',appoinment_id='$var_appoinment_id',reason='$var_reason',refer_appoinment='$var_refer_appoinment' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Reference_master_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_reference_date");
if(dvar1.value=="")
{
 alert("Enter reference_date...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("slb_appoinment_id");
if(dvar2.value=="")
{
 alert("Select Appoinment Name ...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_reason");
if(dvar3.value=="")
{
 alert("Enter reason...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_refer_appoinment");
if(dvar4.value=="")
{
 alert("Enter refer_appoinment...");
dvar4.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar4.value.match(exp))
{
}
    else 
{
 alert("Enter Valid refer_appoinment...");
dvar4.focus();
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
$('#txt_reference_date').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="Reference_master_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Reference_master Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Reference Date</b></label>
          <td><input type="text" name="txt_reference_date"  class="form-control" id="txt_reference_date" value="<?php echo $tbrow['reference_date']; ?>"></td>
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
        <label for="exampleInputEmail1" style="color:#000066"><b>Reason</b></label>
          <td><input type="text" name="txt_reason"  class="form-control" id="txt_reason" value="<?php echo $tbrow['reason']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Refer Appoinment</b></label>
          <td><input type="text" name="txt_refer_appoinment"  class="form-control" id="txt_refer_appoinment" value="<?php echo $tbrow['refer_appoinment']; ?>"></td>
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
