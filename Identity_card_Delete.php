  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="delete from identity_card where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Identity_card_Select.php?pp=2";</script>';
  ?>