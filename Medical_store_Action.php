  <?php
  error_reporting(0);
          $var_store_name=ucwords($_POST['txt_store_name']);
          $var_phone_number=ucwords($_POST['txt_phone_number']);
          $var_email=strtolower($_POST['txt_email']);
		   $var_dis=$_POST['slb_district_id'];
          $var_city_id=$_POST['slb_city_id'];
          $var_status=0;
		  
		  // $var_image_path=ucwords($_POST['txt_image_path']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into medical_store (store_name,phone_number,email,district_id,city_id,status) values('$var_store_name','$var_phone_number','$var_email','$var_dis','$var_city_id','$var_status')";
      $varresult=mysql_query($varsql)or die(mysql_error());
	   
	   $doc_max="SELECT max(id) AS max FROM  medical_store";
      $doc_result=mysql_query($doc_max);
      $doc_row=mysql_fetch_array($doc_result);
     $docmax_id=$doc_row['max'];
    $info=pathinfo($_FILES['file']['name']);
	$ext=$info['extension'];
	$docname="store".$docmax_id;
	$var_file_path=$docname.".".$ext;
     $target='upload/'.$var_file_path;
	move_uploaded_file($_FILES['file']['tmp_name'], $target);
	mysql_query("update medical_store set image_path='$target' where id='$docmax_id'");
	       echo '<script>window.location = "index.php?pp=1";</script>';

      ?>
