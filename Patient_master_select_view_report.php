      <?php include 'aheader.php'; 
	        include 'dbconnect.php';
     		 $db=new dbconnect();?>
<html>
<head><center>
</center></head>
<script type="text/javascript">
function validate()
{
 var  dvar10 = document.getElementById("txt_patient_name");
if(dvar10.value=="")
{
 alert("Select patient Name ...");
dvar10.focus();
return false;
}
 
}
</script>
 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">
 $(function(){
$('#txt_date_of_birth').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>
<form name="Patient_master_report2.php" action="Appoinment_Select_view_report.php" method="post" onSubmit="return validate()">
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Patient Cosulutation</h3>
</div>
</div>

   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" ><b>Patient Name</b></label>
          <select  name="txt_patient_name" class="form-control"  id="txt_patient_name">
     <?php

      $varslbsql_id="select id,patient_name from patient_master where id in(select patient_master_id from appoinment where status=1)";
      $varresult_id=mysql_query($varslbsql_id)or die(mysql_error());
        while($row_id =mysql_fetch_array($varresult_id))
          { ?>
           <option value="<?php echo $row_id[0]; ?>"><?php echo $row_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1" style="color:#000066"><b>Action</b></label>
   <div class="col-md-12">
          <td><input type="submit" name="cmd" id="cmd" class="btn btn-success" value="Show"></td>
          <td><input type="button" name="cmdback" id="cmdback" class="btn btn-danger" onClick="history.back(-1)" value="Back"></td>
</div>
</div>
</div>
</div>

</body>
</form>
</html>
      <?php include 'footer.php'; ?>
