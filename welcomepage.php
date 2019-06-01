  <?php
         session_start();
         if(empty($_SESSION["user"]))
         {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
         }
        elseif($_SESSION["date"] != date("d-m-Y"))
        {           
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        }
        elseif(strtotime('+10 minutes',strtotime($_SESSION["time"])) < strtotime(date("h:i:s A")))
        {             
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        }
        
        ?>


<html>
    <head>
        <title> Expense Manager</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link rel = "stylesheet"
              type = "text/css"
              href = "css/style1.css" />
     
    </head>
    <body>
         <div class = "top" style="text-align: center">
          
            <h3>Expense Manager
               <a href = "logout.php"><button style="width:100px; float:right; font-size: 15px;" type = "button" >Logout</button></a>
           </h3>
         </div>
	    <div class = "container" style = "width : 700px; margin :  auto; text-align : center;">	
            <h1>Welcome to Expense Manager</h1>

            <p>Look everywhere you can to cut a little bit from your expenses. It will all add up to a meaningful sum.</p>
            <p>Beware of little expenses. A small leak will sink a greatship. </p>
            <p>A Penny Saved is a Penny Earned.</p>

            <a href = "register.php"><button type = "button" >Register</button></a>
            <a href = "expenselist.php"><button type = "button" >View Expenses</button></a>

	    </div>
        <?php 
       
        echo "<p>Logged in as ".$_SESSION["user"]."</p>";
        echo "<p>on ".$_SESSION["date"]."</p>";
        echo "<p>at ".$_SESSION["time"]."</p>";
    
        ?>
    </body>
</html>
