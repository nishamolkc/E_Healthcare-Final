<?php 
include 'dbconnect.php';
      $db=new dbconnect();
		$id=$_POST['id'];
		$cast="select voucher_no from voucher_master where  consumer_no='$id'";
		$res=mysql_query($cast);
		$data=mysql_fetch_array($res);
		echo $data['voucher_no'];
?>