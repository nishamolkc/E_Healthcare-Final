  <?php
      include 'dbconnect.php';
      $db=new dbconnect();
          $var_id=$_GET['mvarid'];
      $varsql="delete from qualification where id='$var_id'";
      $varresult=mysql_query($varsql)or die(mysql_error());
      echo '<script>window.location = "Qualification_Select.php?pp=2";</script>';
  ?>
