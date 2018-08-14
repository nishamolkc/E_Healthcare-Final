      <?php include 'aheader.php'; 
	  	  $userlevel=$_SESSION['userlevel'];
	  $username=$_SESSION['username']; ?>
<html>
<head><center>
<h2><b>     Doctor Details</h2>
</center></head>
<script type="text/javascript">
function validate()
{
 var  dvar1 = document.getElementById("txt_doctor_name");
if(dvar1.value=="")
{
 alert("Enter doctor_name...");
dvar1.focus();
return false;
}
 
 var  dvar3 = document.getElementById("slb_city_id");
if(dvar3.value=="")
{
 alert("Select City Name ...");
dvar3.focus();
return false;
}
 var  dvar4 = document.getElementById("slb_district_id");
if(dvar4.value=="")
{
 alert("Select District Name ...");
dvar4.focus();
return false;
}
 
 var  dvar7 = document.getElementById("slb_designation_id");
if(dvar7.value=="")
{
 alert("Select Designation Name ...");
dvar7.focus();
return false;
}
 var  dvar8 = document.getElementById("slb_department_id");
if(dvar8.value=="")
{
 alert("Select Department Name ...");
dvar8.focus();
return false;
}
 var  dvar9 = document.getElementById("slb_specialization_id");
if(dvar9.value=="")
{
 alert("Select Specialization Name ...");
dvar9.focus();
return false;
}
 var  dvar10 = document.getElementById("txt_status");
if(dvar10.value=="")
{
 alert("Enter status...");
dvar10.focus();
return false;
}
  else 
{
   var exp=/^[0-9]+$/;
    if(dvar10.value.match(exp))
{
}
    else 
{
 alert("Enter Valid status...");
dvar10.focus();
return false;
}
}
 var  dvar11 = document.getElementById("txt_image_path");
if(dvar11.value=="")

}
</script>
<script type="text/javascript">
  $(document).ready(function()
{
 $("#slb_district_id").change(function (){

    //alert($(this).val());
  //var dataString = 'relid='+ $(this).val(); 
    $.post('get_district.php' ,{id:$(this).val()} , function(data) {      
       //alert(data);
        $("#slb_city_id").empty().append(data);
    }, 'html'); 
 });
 });
</script>
<form name="Doctor_report2.php" action="Doctor_select_report.php" method="post" onSubmit="return validate()">
<body>
<center>
      <table>
	  <tr>
	  <td> <input type="hidden" name="txt_id" id="txt_id" value=""></td>
	  </tr>
          <tr>
          <td><b>Doctor Name</b></td>
          <td><input type="text" name="txt_doctor_name" id="txt_doctor_name" value=""></td>
          </tr>
         
          <tr>
          <td><b>District</b></td>
          <td><select  name="slb_district_id"  id="slb_district_id">
          <option value="0">Select</option>
     <?php
	 include 'dbconnect.php';
      $db=new dbconnect();
      $varslbsqldistrict_id="select * from district";
      $varresultdistrict_id=mysql_query($varslbsqldistrict_id)or die(mysql_error());
        while($rowdistrict_id =mysql_fetch_array($varresultdistrict_id))
          { ?>
           <option value="<?php echo $rowdistrict_id[0]; ?>"><?php echo $rowdistrict_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
          </tr>
          <tr>
          <td><b>City</b></td>
          <td><select  name="slb_city_id"  id="slb_city_id">
		  <option value="0">Select</option>
      <?php
      $varslbsqldesignation_id="select * from city";
      $varresultdesignation_id=mysql_query($varslbsqldesignation_id)or die(mysql_error());
        while($rowdesignation_id =mysql_fetch_array($varresultdesignation_id))
          { ?>
           <option value="<?php echo $rowdesignation_id[0]; ?>"><?php echo $rowdesignation_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
          </tr>
    
          <tr>
          <td><b>Designation</b></td>
          <td><select  name="slb_designation_id"  id="slb_designation_id">
     <?php
      $varslbsqldesignation_id="select * from designation";
      $varresultdesignation_id=mysql_query($varslbsqldesignation_id)or die(mysql_error());
        while($rowdesignation_id =mysql_fetch_array($varresultdesignation_id))
          { ?>
           <option value="<?php echo $rowdesignation_id[0]; ?>"><?php echo $rowdesignation_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
          </tr>
          <tr>
          <td><b>Department</b></td>
          <td><select  name="slb_department_id"  id="slb_department_id">
     <?php
      $varslbsqldepartment_id="select * from department";
      $varresultdepartment_id=mysql_query($varslbsqldepartment_id)or die(mysql_error());
        while($rowdepartment_id =mysql_fetch_array($varresultdepartment_id))
          { ?>
           <option value="<?php echo $rowdepartment_id[0]; ?>"><?php echo $rowdepartment_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
          </tr>
          <tr>
          <td><b>Specialization</b></td>
          <td><select  name="slb_specialization_id"  id="slb_specialization_id">
     <?php
      $varslbsqlspecialization_id="select * from specialization";
      $varresultspecialization_id=mysql_query($varslbsqlspecialization_id)or die(mysql_error());
        while($rowspecialization_id =mysql_fetch_array($varresultspecialization_id))
          { ?>
           <option value="<?php echo $rowspecialization_id[0]; ?>"><?php echo $rowspecialization_id[1]; ?></option>
          <?php } ?>
          </select>
          </td>
          </tr>
		  <?php
		  if($userlevel==4)
		  {
		  ?>
		  <tr>
          <td><b>Status</b></td>
          <td><select  name="txt_status"  id="txt_status">
           
           <option value="1">Approved</option>
           
          </select>
          </td>
          </tr>
		  <?php
		  }
		  else
		  {
		  ?>
           <tr>
          <td><b>Status</b></td>
          <td><select  name="txt_status"  id="txt_status">
           <option value="">Select</option>
           <option value="1">Approved</option>
           <option value="0">Pending</option>
          </select>
          </td>
          </tr>
             <?php
		  
		    }
		  ?>
          <tr>
          <td></td>
          <td><input type="submit" name="cmd" id="cmd" value="Show"></td>
		    <td><input type="button" name="Cmdback" id="Cmdback" value="Back" onClick="history.back(-1)"></td>
          </tr>
</table>
</center>
</body>
</html>
      <?php include 'footer.php'; ?>
