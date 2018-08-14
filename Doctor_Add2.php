      <?php include 'aheader.php'; ?>
	     <?php
               include 'dbconnect.php';
      			$db=new dbconnect();
				 $_SESSION['flag']=0;
    if(isset($_POST['CmdSave']))
      {
	      $_SESSION['flag']=1;
		  $var_doctor_name=ucwords($_POST['txt_doctor_name']);
          $var_house_name=ucwords($_POST['txt_house_name']);
          $var_city_id=$_POST['slb_city_id'];
          $var_district_id=$_POST['slb_district_id'];
		  $var_card=$_POST['card'];
          $var_card_no=$_POST['card_no'];
          $var_mobile_number=ucwords($_POST['txt_mobile_number']);
          $var_email=strtolower($_POST['txt_email']);
           $var_image_path=ucwords($_POST['txt_image_path']);

      $varsql="insert into doctor (doctor_name,house_name,city_id,district_id,card,card_no,mobile_number,email,image_path) values('$var_doctor_name','$var_house_name','$var_city_id','$var_district_id','$var_card','$var_card_no','$var_mobile_number','$var_email','$var_image_path')";
      $varresult=mysql_query($varsql)or die(mysql_error());
	   $doc_max1="SELECT max(id) AS max FROM  doctor";
      $doc_result1=mysql_query($doc_max1);
      $doc_row1=mysql_fetch_array($doc_result1);
	  
	  $doc_max="SELECT max(id) AS max FROM  doctor";
      $doc_result=mysql_query($doc_max);
      $doc_row=mysql_fetch_array($doc_result);
      $docmax_id=$doc_row['max'];
      $info=pathinfo($_FILES['txt_image_path']['name']);
	  $ext=$info['extension'];
	  $docname="doctor".$docmax_id;
	  $var_file_path=$docname.".".$ext;
      $target='upload/'.$var_file_path;
	  move_uploaded_file($_FILES['txt_image_path']['tmp_name'], $target);
	  mysql_query("update doctor set image_path='$target' where id='$docmax_id'");
  }

	  elseif(isset($_POST['cmdqualification']))
	   {
	     echo '<script>window.location = "Doctor_Add1.php";</script>';
	   }
 
     else
	 {
          $var_qualification=$_POST['txt_Qualification'];
          $var_collage=$_POST['txt_Collage'];
          $var_university=$_POST['txt_University'];
          $var_year=$_POST['txt_Year'];
		  $var_certificate_path=ucwords($_POST['txt_certificate_path']);
          
      		$varsql="insert into doctor (qualification,collage,university,year,certificate_path) values('$var_qualification','$var_collage','$var_university','$var_year','$var_certificate_path')";
     		 $varresult=mysql_query($varsql)or die(mysql_error());
			 
	 	     $doc_max="SELECT max(id) AS max FROM  doctor";
      		 $doc_result=mysql_query($doc_max);
    		 $doc_row=mysql_fetch_array($doc_result);
    		 $docmax_id=$doc_row['max'];
   			 $info=pathinfo($_FILES['txt_certificate_path']['name']);
			$ext=$info['extension'];
			$docname="certificate".$docmax_id;
			$var_file_path=$docname.".".$ext;
   			 $target='upload/'.$var_file_path;
			move_uploaded_file($_FILES['txt_certificate_path']['tmp_name'], $target);
			mysql_query("update doctor set certificate_path='$target' where id='$docmax_id'");
			
						 
	 	     $doc_max1="SELECT max(id) AS max FROM  doctor";
      		 $doc_result1=mysql_query($doc_max1);
    		 $doc_row1=mysql_fetch_array($doc_result1);
	}
      ?>
<html>
<head>
<h2><b>  Doctor Profasional Details</b></h2>
</head>
<script type="text/javascript">
function validate()
{
 
 var  dvar7 = document.getElementById("txt_Qualification");
if(dvar7.value=="")
{
 alert("Enter Qualification Name ...");
dvar7.focus();
return false;
}
 var  dvar8 = document.getElementById("txt_Collage");
if(dvar8.value=="")
{
 alert("Enter Collage Name ...");
dvar8.focus();
return false;
}
 var  dvar9 = document.getElementById("txt_University");
if(dvar9.value=="")
{
 alert("Enter University Name ...");
dvar9.focus();
return false;
}
 var  dvar10 = document.getElementById("txt_Year");
if(dvar10.value=="")
{
 alert("Enter  Year   ...");
dvar10.focus();
return false;
}
}
</script>

<form name="Doctor_Add2.php" action="Doctor_Add2.php" method="post" enctype="multipart/form-data" onSubmit="return validate()">
<body>
<center>
      <table>
	  <tr>
	  <td> <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $doc_row1 ;?>"></td>
	  </tr>
          
          <tr>
          <td><b>Qualification</b></td>
          <td><input type="text" name="txt_Qualification" id="txt_Qualification" value=""></td>
          </tr>
          <tr>
          <td><b>College</b></td>
          <td><input type="text" name="txt_Collage" id="txt_Collage" value=""></td>
          </tr>
		   <tr>
          <td><b>University</b></td>
          <td><input type="text" name="txt_University" id="txt_University" value=""></td>
          </tr>
          <tr>
          <td><b>Year</b></td>
          <td><input type="text" name="txt_Year" id="txt_Year" value=""></td>
          </tr>
		   <tr>
          <td><b>Upload the certificate</b></td>
          <td><input type="file" name="txt_certicate_path" id="txt_certicate_path" value=""></td>
          </tr>
		  
          <tr>
          <td></td>
          <td><input type="submit" name="cmd" id="cmd" value="Save"></td>
           <?php
		   if($flag==1)
		   {
		   ?>
          <td><input type="button" name="cmdqualification" id="cmdqualification" value="qualification"></td>
		  <?php
		  }
		  ?>
		  <td><input type="button" name="Cmdback" id="Cmdback" value="Back" onClick="history.back(-1)"></td>
          </tr>
</table>
</center>
</body>
</html>
      <?php include 'footer.php'; ?>
