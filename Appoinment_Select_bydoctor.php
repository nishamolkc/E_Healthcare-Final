      <?php include 'aheader.php';
	        include'dbconnect.php';
			$db=new dbconnect();
			$var1_id=$_GET['mvarid'];
	   ?>
<html>
<head><center>
<h2><b></h2>
</center></head>
<script type="text/javascript">
function validate()
{
  
 var  dvar2 = document.getElementById("slb_doctor_id");
if(dvar2.value=="")
{
 alert("Select Doctor Name ...");
dvar2.focus();
return false;
}
 
}
</script>
  	
		 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">
 $(function(){
$('#txt_app_date').datepicker({
dateFormat: 'yy-mm-dd',
inline: true
});
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
$("#slb_doctor_id").change(function()
{
//alert($(this).val());
		$.post('get_tocken.php',{id:$(this).val(),dt:$(txt_app_date).val()},function(data)
		{
			//alert(data);
			$("#txt_token").val(data);
		});
	});
});
</script>
<form name="Appoinment_Add_bydoctor.php" action="Appoinment_Select.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">     Appoinment Details </h3>
</div>
</div>
<input type="hidden" name="txt_id" id="txt_id" value=""/>
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Doctor</b></label>
          <select  name="slb_doctor_id"  id="slb_doctor_id" class="form-control">
		  <option value="">--Select--</option>
     <?php
      $varslbsqldoctor_id="select * from doctor";
      $varresultdoctor_id=mysql_query($varslbsqldoctor_id)or die(mysql_error());
        while($rowdoctor_id =mysql_fetch_array($varresultdoctor_id))
          { ?>
           <option value="<?php echo $rowdoctor_id[0]; ?>"><?php echo $rowdoctor_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>
   <div class="col-md-3">
     <div class="form-group" align="center">
        <label for="exampleInputEmail1"><b>Action</b></label>
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
