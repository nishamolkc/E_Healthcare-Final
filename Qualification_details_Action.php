<?php
$var_id=$_POST['txt_id'];
$var_doctor_id=$_POST['slb_doctor_id'];
$var_quali_id=$_POST['slb_quali_id'];
$var_college=$_POST['txt_college'];
$var_uni=$_POST['txt_uni'];
$var_year=$_POST['txt_year'];
 $var_certificate_path=$_POST['txt_certificate_path'];
include 'dbconnect.php';
$db=new dbconnect();
echo $var3="insert into qualification_details (doctor_id,qualification_id,college,university,year,certificate_path)values('$var_doctor_id','$var_quali_id','$var_college','$var_uni','$var_year','$var_certificate_path')";
$var4=mysql_query($var3)or die(mysql_error());
 $doc_max="SELECT max(id) AS max FROM  qualification_details";
      		 $doc_result=mysql_query($doc_max);
    		 $doc_row=mysql_fetch_array($doc_result);
    		 $docmax_id=$doc_row['max'];
   			 $info=pathinfo($_FILES['txt_certificate_path']['name']);
			$ext=$info['extension'];
			$docname="certificate".$docmax_id;
			$var_file_path=$docname.".".$ext;
   			 $target='upload/'.$var_file_path;
			move_uploaded_file($_FILES['txt_certificate_path']['tmp_name'], $target);
			mysql_query("update qualification_details set certificate_path='$target' where id='$docmax_id'");
			
			
header("location:qualification_details_select.php");
?>