      <?php include 'aheader.php'; 
	                 include 'dbconnect.php';
      			  $db=new dbconnect();
	  	 	     $doc_max1="SELECT max(id) AS max FROM  doctor";
      		 $doc_result1=mysql_query($doc_max1);
    		 $doc_row1=mysql_fetch_array($doc_result1);?>
	

<html>
<head>
<h2><b>     Doctor Qualification Details</b></h2>
</head>
<script type="text/javascript">
function validate()
{
 
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

}
</script>

<form name="Doctor_Add1.php" action="Doctor_Action.php" method="post" enctype="multipart/form-data" onSubmit="return validate()">
<body>
<center>
      <table>
	  <tr>
	  <td> <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $doc_row1 ;?> "></td>
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
          
          <tr>
         
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
