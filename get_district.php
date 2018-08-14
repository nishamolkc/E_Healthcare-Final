<?php
include 'dbconnect.php';
$db= new dbconnect();
 $id=$_POST['id'];
  $sel_location="select * from city where district_id='$id'";
$ans_city=mysql_query($sel_location);
 $val="";
         
   $a="<option value=".$val.">---select---</option>";           

while($data=mysql_fetch_array($ans_city))
                {
                     $a=$a."<option value=".$data['id'].">".$data[1]."</option>";
		    
		    
                }
                 
		echo $a;
?>
