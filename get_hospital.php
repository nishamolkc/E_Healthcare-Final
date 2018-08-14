<?php
include 'dbconnect.php';
$db= new dbconnect();
 $id=$_POST['id'];
  //$sel_location="select * from doctor where hospital_id='$id'";
  $sel_location="Select id,doctor_name from doctor where id in(select doctor_id from doctor_hospital where status=1 and hospital_id='$id')";
$ans_doct=mysql_query($sel_location);
 $val="";
         
   $a="<option value=".$val.">---select---</option>";           

while($data=mysql_fetch_array($ans_doct))
                {
                     $a=$a."<option value=".$data['id'].">".$data[1]."</option>";
		    
		    
                }
                 
		echo $a;
?>
