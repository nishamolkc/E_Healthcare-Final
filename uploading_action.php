<?php
session_start(); 
 include 'Database/Login.php';
      $mem_var_con=new Login();
/*
$doc_max="SELECT max(id) AS max FROM image_master";
$doc_result=mysql_query($doc_max);
$doc_row=mysql_fetch_array($doc_result);
$docmax_id=$doc_row['max'];*/
$email=$_SESSION["username"];
     $varsql="select * from agent_master where  email='$email'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      $tbrow=mysql_fetch_array($varresult);
	 $user_id=$tbrow[0];
	$info=pathinfo($_FILES['file']['name']);
	$ext=$info['extension'];
	$docname="Agent".$user_id;
	 $newname=$docname.".".$ext;
	 $target='upload/'.$newname;
	 move_uploaded_file($_FILES['file']['tmp_name'], $target);
	  mysql_query("update agent_master set profile_pic='$newname' where id='$user_id'");
$ans=mysql_query($ins);
header('Location:home.php');
?>
