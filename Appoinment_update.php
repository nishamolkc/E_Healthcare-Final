      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
	  $username=$_SESSION['username'];
          $var_id=$_GET['mvarid'];
       $varsql="select * from appoinment where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
	  
  ?>
 <?php
 if(isset($_POST['CmdSave']))
 {
 
 $var_app_time=$_POST['txt_app_time'];

  $varresult3="select id from patient_master where patient_master.email='$username'";
	  $result3=mysql_query($varresult3)or die(mysql_error());
	  $varout3=mysql_fetch_array($result3);
	  $var_patient_master_id=$varout3['id'];
   $varsql1="update appoinment set app_time='$var_app_time' where id='$var_id'";
  $result=mysql_query($varsql1);
  
  echo '<script>window.location = "Appoinment_Select_bydoctor.php";</script>';
 }
 ?>
<html>
<head>
<h2><b></h2>
</head>
<script type="text/javascript">
function validate()
{
 
 var  dvar4 = document.getElementById("txt_app_time");
if(dvar4.value=="")
{
 alert("Enter app_time...");
dvar4.focus();
return false;
}

}
</script>
 <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet"/>
<script type="text/javascript">

</script>
<form name="Appoinment_Edit.php" action="" method="post" onSubmit="return validate()">
<body>
<?php
		  $varslbsqldoctor_id="select patient_name,appoinment.patient_master_id from patient_master,appoinment where appoinment.patient_master_id=patient_master.id and  appoinment.id='$var_id'";
      $varresultdoctor_id=mysql_query($varslbsqldoctor_id)or die(mysql_error());
	  $result4=mysql_fetch_array($varresultdoctor_id);
		  ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Modify  Appoinment Details</h3>
</div>
</div>

   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Patient Name</b></label>
		  <input type="text" name="slb_doctor_id" id="slb_doctor_id"  class="form-control" readonly="readonly" value="<?php echo $result4['patient_name']; ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Appointment Date</b></label>
		  <input type="text" name="txt_app_date" id="txt_app_date" class="form-control" readonly="readonly" value="<?php echo $tbrow['app_date']; ?>">
</div>
</div>
<div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Appointment Time</b></label>
		  <input type="text" name="txt_app_time" id="txt_app_time" class="form-control" value="<?php echo $tbrow['app_time']; ?>">
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
