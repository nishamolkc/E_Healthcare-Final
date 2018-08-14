<?php
include 'dbconnect.php';
$db= new dbconnect();
 $h_id=$_POST['hid'];
 $d_id=$_POST['did'];
  //$sel_location="select * from doctor where hospital_id='$id'";
  $sel_location="Select id,doctor_name from doctor where id in(select doctor_id from doctor_hospital where status=1 and hospital_id='$h_id' and department_id='$d_id')";
$ans_doct=mysql_query($sel_location);
 $val="";
         
   $a="<option value=".$val.">---select---</option>";           

while($data=mysql_fetch_array($ans_doct))
                {
                     $a=$a."<option value=".$data['id'].">".$data[1]."</option>";
		    
		    
                }
                 
		echo $a;
?>
