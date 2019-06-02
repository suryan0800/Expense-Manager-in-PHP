<?php
        function logout()
        {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        }
         session_start();
         if(empty($_SESSION["user"]))
         {
            logout();
         }
        elseif($_SESSION["date"] != date("d-m-Y"))
        {           
            logout();
        }
        elseif(strtotime('+10 minutes',strtotime($_SESSION["time"])) < strtotime(date("h:i:s A")))
        {             
           logout();
        }
        
        ?>
