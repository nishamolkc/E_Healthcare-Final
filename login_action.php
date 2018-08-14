<?php
        include "dbconnect.php";
		$db=new dbconnect();
 	$uname=$_POST['username'];
 	$pwd=$_POST['password'];
	echo $a="select * from login where username='$uname'";
	$b=mysql_query($a);
	$c=mysql_num_rows($b);
	if($c>0)
	{
		echo $aa="select * from login where username='$uname' and  password='$pwd'";
		$bb=mysql_query($aa);
		$cc=mysql_num_rows($bb);
		if($cc!=1)
		{
			header("Location:login.php?id=2");
		}
		else
		{
			$row=mysql_fetch_array($bb);
			session_start();
			$_SESSION['username']=$row['username'];
			$_SESSION['userlevel']=$row['userlevel'];
		
			header("Location:home.php");
			
		}	
		
	}
	else
	{	
		header("Location:login.php?id=1");
	}
?>
