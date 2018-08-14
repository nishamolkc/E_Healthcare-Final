<?php
include 'dbconnect.php';
$db= new dbconnect();
 $id=$_POST['id'];
 $hospital=$_POST['hospital'];
 $dt=$_POST['dt'];

$dayname=date("D",strtotime($dt));
  $sel_location="Select * from doctor_time where id in(select doctor_time_id from doctor_hospital where hospital_id='$hospital' and day_name='$dayname' and doctor_id='$id')";
$ans_doct=mysql_query($sel_location);
 $val="";
         
   $a="<option value=".$val.">---select---</option>";           

while($data=mysql_fetch_array($ans_doct))
                {
                     $a=$a."<option value=".$data['id'].">".$data[1]."</option>";
		    
		    
                }
                 
		echo $a;
?>
