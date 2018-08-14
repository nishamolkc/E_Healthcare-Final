      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="select * from city where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
  ?>
  <?php
    if(isset($_POST['CmdSave']))
      {
          $var_id=$_POST['txt_id'];
          $var_city_name=$_POST['txt_city_name'];
          $var_district_id=$_POST['slb_district_id'];
      $vareditsql="Update city  Set city_name='$var_city_name',district_id='$var_district_id' where id='$var_id'";
      $varupdate=mysql_query($vareditsql)or die(mysql_error());
      echo '<script>window.location = "City_Select.php?pp=1";</script>';
      }
      ?>
<html>
<head>
</head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_city_name");
if(dvar1.value=="")
{
 alert("Enter city_name...");
dvar1.focus();
return false;
}
 var  dvar2 = document.getElementById("slb_district_id");
if(dvar2.value=="")
{
 alert("Select District Name ...");
dvar2.focus();
return false;
}
}
</script>
<form name="City_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header" style="color:#000066"> Modify City Details</h3>
</div>
</div>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>City Name</b></label>
          <td><input type="text" name="txt_city_name"  class="form-control" id="txt_city_name" value="<?php echo $tbrow['city_name']; ?>"></td>
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
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" style="color:#000066"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="CmdSave" id=CmdSave"" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>
