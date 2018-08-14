  <?php
          $var_test_name=ucwords($_POST['txt_test_name']);
          $var_normal_value=ucwords($_POST['txt_normal_value']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into lab_test (test_name,normal_value) values('$var_test_name','$var_normal_value')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Lab_test_Select.php";</script>';
      ?>
