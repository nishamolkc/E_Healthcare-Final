<?php
include 'dbconnect.php';
$db= new dbconnect();
$id=$_POST['id'];
$var="select left(connection_name,1) from connection_type where id='$id'";
$ans=mysql_query($var);
$row=mysql_fetch_array($ans);
$c1="5.0";
$c2="19.0";
$c3="47.5";
$d1="14.2";
if($row[0]=="C")
{
$val="";
$a="<option value=".$val.">---select---</option>";
$a=$a."<option value=".$c1.">".$c1."</option>";
$a=$a."<option value=".$c2.">".$c2."</option>";
$a=$a."<option value=".$c3.">".$c3."</option>";
}
elseif($row[0]=="D")
{
$val="";
$a="<option value=".$val.">---select---</option>";
$a=$a."<option value=".$d1.">".$d1."</option>";
$a=$a."<option value=".$c1.">".$c1."</option>";
}
echo $a;
?>