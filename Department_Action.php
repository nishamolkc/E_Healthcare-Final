  <?php
          $var_department_name=ucwords($_POST['txt_department_name']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into department (department_name) values('$var_department_name')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Department_Select.php";</script>';
      ?>
