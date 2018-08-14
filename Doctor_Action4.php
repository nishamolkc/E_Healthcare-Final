


       <?php
               include 'dbconnect.php';
      			$db=new dbconnect();
         $doc_max1="SELECT max(id) AS max FROM  doctor";
      		 $doc_result1=mysql_query($doc_max1);
    		 $doc_row1=mysql_fetch_array($doc_result1);
			 $doctor_id=$doc_row1['max'];
			
          $var_designation_id=$_POST['slb_designation_id'];
          $var_department_id=$_POST['slb_department_id'];
          $var_specialization_id=$_POST['slb_specialization_id'];
          $var_status=0;


      $varsql="insert into doctor (designation_id,department_id,specialization_id,status ) values('$var_designation_id','$var_department_id','$var_specialization_id','$var_status')";
      $varresult=mysql_query($varsql)or die(mysql_error());
	   echo '<script>window.location = "index.php";</script>';
      ?>
	   

