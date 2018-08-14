  <?php
          $var_appoinment_id=$_POST['slb_appoinment_id'];
          $var_token_number=$_POST['txt_token_number'];
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into token (appoinment_id,token_number) values('$var_appoinment_id','$var_token_number')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Token_Select.php";</script>';
      ?>
