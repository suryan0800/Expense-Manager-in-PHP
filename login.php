<html>
    <head>
        <link rel = "stylesheet"
              type = "text/css"
              href = "css/style1.css" />
    <head>
    <body>
       <h3>Expense Manager</h3><br>
       <p>Login to enjoy benefits of Expense Manager</p>
       <div  style = " margin : 100px auto; text-align : center;">	
            <form action="login.php" method="post">
                 <input type="text" name="name" placeholder="User Name"><br><br>
                 <input type="password" name="pass" placeholder="Password"><br><br><br>
                <input style="text-align: center" type="submit" value="Login">
            </form>

            <?php
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                if($name == null || $pass == null)
                {
                   echo "<p>Enter User Name and Password to login</p>";
                }
                else
                {
                    $con = new mysqli('localhost','root','root','examples');
                    if($con->connect_error)
                    {
                        die("Database Connection failed: ".$con->connect_error);
                    }
                   
                    $sql = "select * from expenseuser where name='".$name."'";
                    $result = $con->query($sql);
                    if($result->num_rows >0)
                    {
                        $row=$result->fetch_assoc();
                        if($row["pass"] == $pass)
                        {
                           header("Location: welcomepage.php");
                           exit();

                        }
                    }
                    else
                    {
                     echo "<p>invalid User Name or Password</p>";
                    }
                }
               
            ?>
        </div>

    </body>
</html> 




