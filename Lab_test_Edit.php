      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from lab_test where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_test_name=$_POST['txt_test_name'];
          $var_normal_value=$_POST['txt_normal_value'];
      $vareditsql="Update lab_test  Set test_name='$var_test_name',normal_value='$var_normal_value' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "Lab_test_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_test_name");
if(dvar1.value=="")
{
 alert("Enter test_name...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("txt_normal_value");
if(dvar2.value=="")
{
 alert("Enter normal_value...");
dvar2.focus();
return false;
}
}
</script>
<form name="Lab_test_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify Lab_test Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Test Name</b></label>
          <td><input type="text" name="txt_test_name"  class="form-control" id="txt_test_name" value="<?php echo $tbrow['test_name']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Normal Value</b></label>
          <td><input type="text" name="txt_normal_value"  class="form-control" id="txt_normal_value" value="<?php echo $tbrow['normal_value']; ?>"></td>
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
