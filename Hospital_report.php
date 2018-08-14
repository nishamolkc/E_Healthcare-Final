      <?php include 'aheader.php'; ?>
<html>
<head>
<h2><b></h2>
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
}
</script>
<form name="Hospital_report.php" action="Hospital_report2.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Search Doctor</h3>
</div>
</div>

   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Hospital</b></label>
          <select  name="slb_hospital_id" class="form-control" id="slb_hospital_id">
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
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Go"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>

</body>
</html>
      <?php include 'footer.php'; ?>
