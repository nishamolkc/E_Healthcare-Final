      <?php include 'aheader.php'; ?>
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
<form name="Hospital_department_Add.php" action="Hospital_department_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Hospital Department Details</h3>
</div>
</div>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Hospital</b></label>
          <td><select  name="slb_hospital_id"  class="form-control"  id="slb_hospital_id">
           <option value="">--Select--</option>
     <?php
      include 'dbconnect.php';
      $db=new dbconnect();
      $varslbsqlhospital_id="select * from hospital";
      $varresulthospital_id=mysql_query($varslbsqlhospital_id)or die(mysql_error());
        while($rowhospital_id =mysql_fetch_array($varresulthospital_id))
          { ?>
           <option value="<?php echo $rowhospital_id[0]; ?>"><?php echo $rowhospital_id[1]; ?></option>
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
           <option value="<?php echo $rowdepartment_id[0]; ?>"><?php echo $rowdepartment_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
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
