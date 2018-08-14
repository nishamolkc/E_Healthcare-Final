  <?php
          $var_card_type=$_POST['txt_card_type'];
      include 'dbconnect.php';
      $db=new dbconnect();
      $varsql="insert into identity_card (card_type) values('$var_card_type')";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Identity_card_Select.php";</script>';
      ?>
