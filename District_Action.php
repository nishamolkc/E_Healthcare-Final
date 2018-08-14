  <?php
          $var_district_name=ucwords($_POST['txt_district_name']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into district (district_name) values('$var_district_name')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "District_Select.php";</script>';
      ?>
