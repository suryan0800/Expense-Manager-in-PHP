<?php
        include "checklogin.php";
?>

<html>
    <head>
    <title>Register Expense</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link rel = "stylesheet"
                  type = "text/css"
                  href = "css/style1.css" />
    </head>
    <body style = "background : #002447; ">
      <div class = "top" style="text-align: center ">
             <a href = "welcomepage.php"><button style="width:100px; float:left; font-size: 15px;" type = "button" >Home</button></a>
             
             <a href = "logout.php"><button style="width:100px; float:right; font-size: 15px;" type = "button" >Logout</button></a>
             <h3> Expense Manager</h3>
         </div>
   

    <div class = "container" style = "margin : auto; text-align : center;">		
        <h1>Register Expense</h1><br>

        <?php
            echo "<p>Date and Time : ".date("d-m-Y h:i:s A")."</p>";
        ?>

        <form action="register.php" method="post">
              Amount :   <input type="number" name="amount" placeholder="Eg. 100" min="1"><br><br>
              Purpose:   <input type="text" name="purpose" placeholder="Eg. Samosa"><br><br>
                <input style="text-align: center" type="submit" value="Register">
        </form>
        <?php
            if(!empty($_POST["amount"]))
            {
                $con = new mysqli('localhost','root','root','examples');
                if($con->connect_error)
                {
                    die("Database Connection failed: ".$con->connect_error);
                }

                $stmt = $con->prepare("insert into ".$_SESSION["user"]." values(?,?,?,?)");
                $stmt->bind_param("sssi",date("d-m-Y"),date("h:i:s A"),$_POST["purpose"],$_POST["amount"]);
                $stmt->execute();
                $stmt->close();
                $con->close();
                echo "Registered Successfully";
            }
            else
            {
                echo "Enter Amount and Purpose to register";
            }
        ?>
    </div>
     <?php 
       
        echo "<p>Logged in as ".$_SESSION["user"]."</p>";
        echo "<p>on ".$_SESSION["date"]."</p>";
        echo "<p>at ".$_SESSION["time"]."</p>";
    
        ?>
    </body>
</html>





