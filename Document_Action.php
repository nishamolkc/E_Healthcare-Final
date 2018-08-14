  <?php
  error_reporting(0);
          $var_uploaded_date=$_POST['txt_uploaded_date'];
         // $var_patient_master_id=$_POST['slb_patient_master_id'];
          $var_title=ucwords($_POST['txt_title']);
        //$var_file_path=ucwords($_POST['txt_file_path']);
          $var_description=ucwords($_POST['txt_description']);
          $var_investigations=ucwords($_POST['txt_investigations']);
          $var_appoinment_id=$_POST['slb_appoinment_id'];
      include 'dbconnect.php';
      $db=new dbconnect();
    
	  
	    
	
	  $varsql="insert into document (uploaded_date,title,file_path,description,investigations,appoinment_id) values('$var_uploaded_date','$var_title','$var_file_path','$var_description','$var_investigations','$var_appoinment_id')";
	 
      $varresult=mysql_query($varsql)or die(mysql_error());
	  $doc_max="SELECT max(id) AS max FROM  Document";
      $doc_result=mysql_query($doc_max);
      $doc_row=mysql_fetch_array($doc_result);
     $docmax_id=$doc_row['max'];
    $info=pathinfo($_FILES['txt_file_path']['name']);
	$ext=$info['extension'];
	$docname="file".$docmax_id;
	$var_file_path=$docname.".".$ext;
    $target='upload/'.$var_file_path;
	move_uploaded_file($_FILES['txt_file_path']['tmp_name'], $target);
	  mysql_query("update doctor set filename='$var_file_path' where id='$docmax_id'");
     echo '<script>window.location = "Document_Select.php";</script>';
      ?>
