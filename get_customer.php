<?php
		
	  include 'dbconnect.php';
      $db=new dbconnect();
		$id=$_POST['id'];
		$cast="select customer_name from customer where id=(select customer_id from connection_master where consumer_no='$id')";
		$res=mysql_query($cast);
		$data=mysql_fetch_array($res);
		echo $data['customer_name'];
?>
