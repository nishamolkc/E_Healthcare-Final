      <?php include 'aheader.php';
	        include'dbconnect.php';
			$db=new dbconnect();
			$var_id=$_GET['mvarid'];
			   $varsql="select appoinment.*,patient_master.patient_name,doctor.doctor_name from appoinment,patient_master,doctor where appoinment.patient_master_id=patient_master.id and appoinment.doctor_id=doctor.id and appoinment.id='$var_id'" ;
			 $varresult=mysql_query($varsql)or die(mysql_error());
			 $varresult_id=mysql_fetch_array($varresult);
			 $var_patient=$varresult_id['patient_name'];
			 $var_patient_id=$varresult_id['patient_master_id'];
			 $var_doctor=$varresult_id['doctor_id'];	 
	   ?>
<html>
<head><center>
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
 var  dvar3 = document.getElementById("txt_app_date");
if(dvar3.value=="")
{
 alert("Enter app_date...");
dvar3.focus();
return false;
}


 var  dvar5 = document.getElementById("txt_description");
if(dvar5.value=="")
{
 alert("Enter description...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_token");
if(dvar6.value=="")
	{
		 alert("Token Should Not Be Blank");
		dvar6.focus();
		return false;
	}
	  else 
	{
	   var exp=/^[0-9]+$/;
		if(dvar6.value.match(exp))
			{
			}
				else
			{
				 alert("not eligible to get token..");
				dvar6.focus();
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
$('#txt_app_date').datepicker({
dateFormat: 'yy-mm-dd',
minDate:0,
inline: true
});
});
</script>

<script type="text/javascript">
  $(document).ready(function()
{
 $("#slb_doctor_id").change(function (){

    //alert($(this).val());
  //var dataString = 'relid='+ $(this).val(); 
    $.post('get_timing.php' ,{id:$(this).val(),dt:$(txt_app_date).val(),hospital:$(slb_hsptl_id).val()} , function(data) {      
      // alert(data);
        $("#slb_time_id").empty().append(data);
    }, 'html'); 
 });
 });
</script>
<script type="text/javascript">
  $(document).ready(function()
{
 $("#slb_hsptl_id").change(function (){

    //alert($(this).val());
  //var dataString = 'relid='+ $(this).val(); 
    $.post('get_hospital.php' ,{id:$(this).val()} , function(data) {      
      // alert(data);
        $("#slb_doctor_id").empty().append(data);
    }, 'html'); 
 });
 });
</script>
<script type="text/javascript">
$(document).ready(function()
{
$("#slb_time_id").change(function()
{
//alert($(this).val());
		$.post('get_tocken.php',{id:$(this).val(),dt:$(txt_app_date).val(),doctor:$(slb_doctor_id).val(),hospital:$(slb_hsptl_id).val()},function(data)
		{
		//	alert(data);
		var tk=data.trim();
			$("#txt_token").val(tk);
		});
	});
});
</script>
<form name="Appoinment_Add_doctor.php" action="Appoinment_Action_Doctor.php" method="post" onSubmit="return validate()">
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Appoinment Details</h3>
</div>
</div>
	<td> <input type="hidden" name="txt_old_app_id" id="txt_old_app_id" value="<?php echo $var_id; ?>"/>
	<input type="hidden" name="txt_patient_id" id="txt_patient_id" readonly="readonly" value="<?php echo $var_patient_id ?>">
	<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Appointment Date</b></label>
		  <input type="text" name="txt_app_date" id="txt_app_date"  class="form-control" value="<?php echo date("Y/m/d") ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Patient Name</b></label>
          <input type="text" name="txt_patient" id="txt_patient" class="form-control" readonly="readonly" value="<?php echo $var_patient ?>">
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Hospital</b></label>
          <select  name="slb_hsptl_id" class="form-control" id="slb_hsptl_id">
		  <option value="">Select</option>
     <?php        
      $varslbsqlhsptl_id="select * from hospital";
      $varresulthsptl_id=mysql_query($varslbsqlhsptl_id)or die(mysql_error());
        while($rowhsptl_id =mysql_fetch_array($varresulthsptl_id))
          { ?>
           <option value="<?php echo $rowhsptl_id[0]; ?>"><?php echo $rowhsptl_id[1]; ?></option>
          <?php } ?>
          </select>
</div>
</div>

   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Doctor</b></label>
          <select  name="slb_doctor_id" class="form-control" id="slb_doctor_id">
		  <option value="">Select</option>
    
          </select>
</div>
</div>
   
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Time</b></label>
          <select  name="slb_time_id" class="form-control"  id="slb_time_id">
		   <option value="">Select</option>
          </select>
</div>
</div>

   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Description</b></label>
          <td><input type="text" name="txt_description"  class="form-control" id="txt_description" value=""></td>
</div>
</div>
   
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1" style="color:#000066"><b>Token</b></label>
          <td><input type="text" name="txt_token"  class="form-control" readonly="readonly" id="txt_token" value=""></td>
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


<?php /*?><center>
      <table>
	  <tr>
	  <td> <input type="hidden" name="txt_old_app_id" id="txt_old_app_id" value="<?php echo $var_id; ?>"/>
	  </td>
	  </tr>
	  <tr>
          <td><input type="hidden" name="txt_patient_id" id="txt_patient_id" readonly="readonly" value="<?php echo $var_patient_id ?>"></td>
          </tr>
          <tr>
          <td><b>Appoinment Date</b></td>
          <td><input type="text" name="txt_app_date" id="txt_app_date" value="<?php echo date("Y/m/d") ?>"></td>
          </tr>
		   <tr>
          <td><b>Patient Name</b></td>
          <td><input type="text" name="txt_patient" id="txt_patient" readonly="readonly" value="<?php echo $var_patient ?>"></td>
          </tr>
		  
          <tr>
          <td><b>Hospital</b></td> 
          <td><select  name="slb_hsptl_id"  id="slb_hsptl_id">
		  <option value="">Select</option>
     <?php        
      $varslbsqlhsptl_id="select * from hospital";
      $varresulthsptl_id=mysql_query($varslbsqlhsptl_id)or die(mysql_error());
        while($rowhsptl_id =mysql_fetch_array($varresulthsptl_id))
          { ?>
           <option value="<?php echo $rowhsptl_id[0]; ?>"><?php echo $rowhsptl_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
          </tr>
          <tr>
          <td><b>Doctor</b></td> 
          <td><select  name="slb_doctor_id"  id="slb_doctor_id">
		  <option value="">Select</option>
    
          </select>
          </td>
          </tr>
           <tr>
          <td><b>Time</b></td> 
          <td><select  name="slb_time_id"  id="slb_time_id">
		  
          </select>
          </td>
          </tr>
          <tr>
          <td><b>Description</b></td>
          <td><input type="text" name="txt_description" id="txt_description" value=""></td>
          </tr>
		   <tr>
          <td><b>Token</b></td>
          <td><input type="text" name="txt_token" id="txt_token" readonly="readonly" ></td>
          </tr>
          <tr>
          <td></td>
          <td><input type="submit" name="cmd" id="cmd" value="Save"></td>
		    <td><input type="button" name="Cmdback" id="Cmdback" value="Back" onClick="history.back(-1)"></td>
          </tr>
		  </table>
</center><?php */?>
</body>
</form>
</html>
      <?php include 'footer.php'; ?>
