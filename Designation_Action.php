  <?php
          $var_designation_name=ucwords($_POST['txt_designation_name']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into designation (designation_name) values('$var_designation_name')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Designation_Select.php";</script>';
      ?>
