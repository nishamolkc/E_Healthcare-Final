  <?php
          $var_blood_group_name=ucwords($_POST['txt_blood_group_name']);
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into blood_group (blood_group_name) values('$var_blood_group_name')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Blood_group_Select.php";</script>';
      ?>
