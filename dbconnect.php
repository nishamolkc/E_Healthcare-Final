  <?php
           class dbconnect
               {
                 function dbconnect()
                  {
                    mysql_connect('localhost','root','') or die(" Cannot Connect to Database Server ");
                    mysql_select_db('e_healthcare_mangalore') or die(" Cannot Select Database  ");
                  }
               }
      ?>
