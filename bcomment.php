<?php


      include 'Database/dbconnect.php';
      $connection =new createConnection();
      $connection->connectToDatabase();
      $connection->selectDatabase();


session_start();


$id=$_POST['id'];
$cmnt=$_POST['cmnt'];
$cdate=date('Y-m-d');
$email=$_SESSION['username'];
 $aa="insert into blogcommunication(blog_id,email,comment,date) values('$id','$email','$cmnt','$cdate')";
mysql_query($aa);
header('Location:blogs.php?id='.$id);
?>