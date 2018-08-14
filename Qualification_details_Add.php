      <?php include 'aheader.php'; ?>
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
<form name="Qualification_details_Add.php" action="Qualification_details_Action.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Qualification_details Details</h3>
</div>
</div>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor</b></label>
          <td><select  name="slb_doctor_id"  class="form-control"  id="slb_doctor_id">
           <option value="">--Select--</option>
     <?php
      include 'dbconnect.php';
      $db=new dbconnect();
      $varslbsqldoctor_id="select * from doctor";
      $varresultdoctor_id=mysql_query($varslbsqldoctor_id)or die(mysql_error());
        while($rowdoctor_id =mysql_fetch_array($varresultdoctor_id))
          { ?>
           <option value="<?php echo $rowdoctor_id[0]; ?>"><?php echo $rowdoctor_id[1]; ?></option>
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
           <option value="<?php echo $rowqualification_id[0]; ?>"><?php echo $rowqualification_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>College</b></label>
          <td><input type="text" name="txt_college"  class="form-control" id="txt_college" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>University</b></label>
          <td><input type="text" name="txt_university"  class="form-control" id="txt_university" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Year</b></label>
          <td><input type="text" name="txt_year"  class="form-control" id="txt_year" value=""></td>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Certificate Path</b></label>
          <td><input type="text" name="txt_certificate_path"  class="form-control" id="txt_certificate_path" value=""></td>
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
