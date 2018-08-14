      <?php include 'aheader.php'; ?>
<html>
<head><center>
<h2><b>     </h2>
</center></head>
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
 
}
</script>
<form name="Lab_record_report2.php" action="Lab_record_select_report.php" method="post" onSubmit="return validate()">
<body>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Lab Record Details</h3>
</div>
</div>

   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Appoinment</b></label>
          <select  name="slb_appoinment_id" class="form-control" id="slb_appoinment_id">
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
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Medical Lab</b></label>
          <select  name="slb_medical_lab_id" class="form-control" id="slb_medical_lab_id">
     <?php
      $varslbsqlmedical_lab_id="select * from medical_lab";
      $varresultmedical_lab_id=mysql_query($varslbsqlmedical_lab_id)or die(mysql_error());
        while($rowmedical_lab_id =mysql_fetch_array($varresultmedical_lab_id))
          { ?>
           <option value="<?php echo $rowmedical_lab_id[0]; ?>"><?php echo $rowmedical_lab_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Save"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>

</body>
</form>
</html>
      <?php include 'footer.php'; ?>
