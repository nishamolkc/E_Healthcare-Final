      <?php include 'aheader.php';
	        include 'dbconnect.php';
      $db=new dbconnect();
	  $var_id=$_GET['mvarid'];
	  $username=$_SESSION['username'];
$userlevel=$_SESSION['userlevel'];
	  $varsqlpatient="select appoinment.id,appoinment.app_date,patient_master.patient_name from appoinment,patient_master where appoinment.patient_master_id=patient_master.id and appoinment.id='$var_id'";
	  $varresult=mysql_query($varsqlpatient)or die(mysql_error());
	  $result=mysql_fetch_array($varresult);
        
    ?>
<html>
<head><center>
<h2><b>     Prescription Details</h2>
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
 var  dvar2 = document.getElementById("txt_present_illness");
if(dvar2.value=="")
{
 alert("Enter present_illness...");
dvar2.focus();
return false;
}
 var  dvar3 = document.getElementById("txt_diagnosis");
if(dvar3.value=="")
{
 alert("Enter diagnosis...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("txt_history");
if(dvar4.value=="")
{
 alert("Enter history...");
dvar4.focus();
return false;
}
 var  dvar5 = document.getElementById("txt_investigations");
if(dvar5.value=="")
{
 alert("Enter investigations...");
dvar5.focus();
return false;
}
 var  dvar6 = document.getElementById("txt_prescriptions");
if(dvar6.value=="")
{
 alert("Enter prescriptions...");
dvar6.focus();
return false;
}
 var  dvar7 = document.getElementById("txt_remarks");
if(dvar7.value=="")
{
 alert("Enter remarks...");
dvar7.focus();
return false;
}
}
</script>
<form name="Prescription_Add.php" action="Prescription_Action_home.php" method="post" onSubmit="return validate()">
<body>
<center>
      <table>
	  <tr>
	  <td><b>Appoinment ID</b></td>
	  <td><input type="text" name="slb_appoinment_id" readonly="readonly" id="slb_appoinment_id" value="<?php echo $var_id; ?>"> </td>
	  </tr>
	    <tr>
          <td><b>Patient Name</b></td>
       <td><input type="text" name="txt_Patient" readonly="readonly" id="txt_Patient" value="<?php echo $result[2]; ?>"> </td>
          </td>
          </tr>
		  <tr>
          <td><b>Date</b></td>
       <td><input type="text" name="txt_date" readonly="readonly" id="txt_date" value="<?php echo $result[1]; ?>"> </td>
          </td>
          </tr>
          <tr>
          <td><b>Present Illness</b></td>
          <td><textarea name="txt_present_illness"   id="txt_present_illness" rows="3" cols="50"></textarea></td>
          </tr>
          <tr>
          <td><b>Diagnosis</b></td>
		  <td><textarea name="txt_diagnosis"   id="txt_diagnosis" rows="3" cols="50"></textarea></td>
          </tr>
          <tr>
          <td><b>History</b></td>
		  <td><textarea name="txt_history"   id="txt_history" rows="3" cols="50"></textarea></td>
          </tr>
          <tr>
          <td><b>Investigations</b></td>
		  <td><textarea name="txt_investigations"   id="txt_investigations" rows="3" cols="50"></textarea></td>
          
          </tr>
          <tr>
          <td><b>Prescriptions</b></td>
		   <td><textarea name="txt_prescriptions"   id="txt_prescriptions" rows="3" cols="50"></textarea></td>
          </tr>
          <tr>
          <td><b>Remarks</b></td>
		   <td><textarea name="txt_remarks"   id="txt_remarks" rows="3" cols="50"></textarea></td>
          </tr>
		 
          <tr>
          <td></td>
          <td><input type="submit" name="cmd" id="cmd" value="Save"></td>
		   <td><input type="button" name="Cmdback" id="Cmdback" value="Back" onClick="history.back(-1)"></td>
          </tr>
</table>
</center>
</body>
</html>
      <?php include 'footer.php'; ?>
