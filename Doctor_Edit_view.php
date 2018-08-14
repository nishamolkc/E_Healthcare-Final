      <?php include 'aheader.php'; ?>
  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
     $dt=date('Y-m-d');
	  $varsql="Select doctor.*, city.city_name,district.district_name,specialization.specialization_name from doctor,city,district,specialization where doctor.city_id=city.id and doctor.district_id=district.id and  doctor.specialization_id=specialization.id and doctor.id='$var_id'";
      $varupdate=mysql_query($varsql)or die(mysql_error());
	  $tbrow=mysql_fetch_array($varupdate);
 	  $doctor_pic=$tbrow['image_path'];
      $sql_leave="select doctor_id from leave_master where leave_date='$dt' and doctor_id='$var_id'";
	  $sql_leave1=mysql_query($sql_leave);
	 // $sql_leave2=mysql_fetch_array($sql_leave1);
	  $cn1=mysql_num_rows($sql_leave1);
	if($cn1>=1)
	{
		$leave="Today Doctor on Leave";
	}
	if($cn1==0)
	{
	$leave="Today Available";
	}
      ?>
<html>
<head><center>
<h2><b>Doctor Details</h2>
</center></head>
	<form name="Doctor_Edit.php" action=""  method="post" >	  
	<body>
<div class="home-page-container column">
				<div class="left-container">
					<div class="profile-photo">
						<a id="profile-photo" href="<?php echo $doctor_pic; ?>">
							<img src="<?php echo $doctor_pic; ?>" />
						</a>
					</div>
					</div>


<h1 style="color:#FF0000"><b><?php echo $leave; ?></h1>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"></h3>
</div>
</div>
<input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>">
   <div class="col-md-3">
     <div class="form-group">
        <label for="exampleInputEmail1"><b>Doctor Name</b></label>
		  <input type="text" name="txt_doctor_name" id="txt_doctor_name"  class="form-control" readonly="readonly" value="<?php echo $tbrow[1]; ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
        <label for="exampleInputEmail1"><b>House</b></label>
		  <input type="text" name="txt_house_name" id="txt_house_name" readonly="readonly" class="form-control" value="<?php echo $tbrow['house_name']; ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
        <label for="exampleInputEmail1"><b>District</b></label>
		  <input type="text" name="slb_district_id" id="slb_district_id" class="form-control" readonly="readonly" value="<?php echo $tbrow['district_name']; ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
        <label for="exampleInputEmail1"><b>City</b></label>
		  <input type="text" name="slb_city_id" id="slb_city_id" readonly="readonly"  class="form-control" value="<?php echo $tbrow['city_name']; ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
        <label for="exampleInputEmail1"><b>Mobile No.</b></label>
		  <input type="text" name="txt_mobile_number" id="txt_mobile_number"  class="form-control" readonly="readonly" value="<?php echo $tbrow['mobile_number']; ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
        <label for="exampleInputEmail1"><b>Email</b></label>
		  <input type="text" name="txt_email" id="txt_email" readonly="readonly" class="form-control" value="<?php echo $tbrow['email']; ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
        <label for="exampleInputEmail1"><b>Specialization</b></label>
		  <input type="text" name="slb_specialization_id" id="slb_specialization_id"  class="form-control" readonly="readonly" value="<?php echo $tbrow['specialization_name']; ?>">
</div>
</div>

   <div class="col-md-3">
     <div class="form-group" align="center">
        
   <div class="col-md-12">
          
</div>
</div>
</div>
</body>
</form>
</html>



<?php /*?><center>
<h1 style="color:#FF0000"><b><?php echo $leave; ?></h1>
      <table>
          <tr>
          <td><input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tbrow['id']; ?>"></td>
          </tr>
          <tr>
          <td><b>Doctor Name</b></td>
          <td><input type="text" name="txt_doctor_name" id="txt_doctor_name" readonly="readonly" value="<?php echo $tbrow[1]; ?>"></td>
          <td><b>House Name</b></td>
          <td><input type="text" name="txt_house_name" id="txt_house_name" readonly="readonly" value="<?php echo $tbrow['house_name']; ?>"></td>
          </tr>
          <tr>
          <td><b>District</b></td>
		   <td><input type="text" name="slb_district_id" id="slb_district_id" readonly="readonly" value="<?php echo $tbrow['district_name']; ?>"></td>
          <td><b>City</b></td>
		  <td><input type="text" name="slb_city_id" id="slb_city_id" readonly="readonly" value="<?php echo $tbrow['City_name']; ?>"></td>
           
          </tr>
          <tr>
          <td><b>Mobile Number</b></td>
          <td><input type="text" name="txt_mobile_number" id="txt_mobile_number" readonly="readonly" value="<?php echo $tbrow['mobile_number']; ?>"></td>
         
          <td><b>Email</b></td>
          <td><input type="text" name="txt_email" id="txt_email" readonly="readonly" value="<?php echo $tbrow['email']; ?>"></td>
          </tr>
          <tr>
         
         
          <td><b>Specialization</b></td>
		   <td><input type="text" name="slb_specialization_id" id="slb_specialization_id" readonly="readonly" value="<?php echo $tbrow['specialization_name']; ?>"></td>
		    
         
          <td></td>
          <td><input type="button" name="Cmdback" id="Cmdback" value="Back" onClick="history.back(-1)"></td>
          </tr>
</table>
</center><?php */?>
