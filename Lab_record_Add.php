      <?php include 'aheader.php'; ?>
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
<form name="Lab_record_Add.php" action="Lab_record_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Lab_record Details</h3>
</div>
</div>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Appoinment</b></label>
          <td><select  name="slb_appoinment_id"  class="form-control"  id="slb_appoinment_id">
           <option value="">--Select--</option>
     <?php
      include 'dbconnect.php';
      $db=new dbconnect();
      $varslbsqlappoinment_id="select * from appoinment";
      $varresultappoinment_id=mysql_query($varslbsqlappoinment_id)or die(mysql_error());
        while($rowappoinment_id =mysql_fetch_array($varresultappoinment_id))
          { ?>
           <option value="<?php echo $rowappoinment_id[0]; ?>"><?php echo $rowappoinment_id[1]; ?></option>
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
           <option value="<?php echo $rowmedical_lab_id[0]; ?>"><?php echo $rowmedical_lab_id[1]; ?></option>
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
           <option value="<?php echo $rowlab_test_id[0]; ?>"><?php echo $rowlab_test_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Result</b></label>
          <td><input type="text" name="txt_result"  class="form-control" id="txt_result" value=""></td>
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
