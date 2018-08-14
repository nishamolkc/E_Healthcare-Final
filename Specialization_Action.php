  <?php
          $var_specialization_name=ucwords($_POST['txt_specialization_name']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into specialization (specialization_name) values('$var_specialization_name')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Specialization_Select.php";</script>';
      ?>
