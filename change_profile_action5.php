  <?php
		 // $var_id=$_POST['txt_id'];
        //  $var_image_path=ucwords($_POST['txt_image_path']);
		               include 'dbconnect.php';
     		 $db=new dbconnect();
		session_start();
		$username=$_SESSION['username'];
    $var_id="select id,email from medical_store where email='$username'";
  $var_id1=mysql_query($var_id);
  $var_id2=mysql_fetch_array($var_id1);
  $var_id3=$var_id2['id'];
       $docmax_id=$var_id3;
    $info=pathinfo($_FILES['txt_image_path']['name']);
	$ext=$info['extension'];
	$docname="store".$docmax_id;
	$var_file_path=$docname.".".$ext;
    $target='upload/'.$var_file_path;
	move_uploaded_file($_FILES['txt_image_path']['tmp_name'], $target);
	 
	
       echo '<script>window.location = "home.php";</script>';
      ?>
