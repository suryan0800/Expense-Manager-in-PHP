<?php
        include "checklogin.php";
?>



<html>
    <head>
        <title> View Expense</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel = "stylesheet"
              type = "text/css"
              href = "css/style1.css" /> 

    </head>
    <body>
         <div class = "top" style="text-align: center ">
                 <a href = "welcomepage.php"><button style="width:100px; float:left; font-size: 15px;" type = "button" >Home</button></a>
                 
                 <a href = "logout.php"><button style="width:100px; float:right; font-size: 15px;" type = "button" >Logout</button></a>
                 <h3> Expense Manager</h3>
         </div>

         <div class = "container" style = " margin :  auto; text-align : center;">	
                <h1>View Expense</h1>
                <form action="expenselist.php" method="post">
                  From Date :  <input type="date" name="date1"><br><br>
                  To Date :    <input type="date" name="date2"><br><br>
                    <input style="text-align: center" type="submit" value="Search">
                </form>
                
                <?php
                    if(!empty($_POST["date1"]) && !empty($_POST["date2"]))
                    {
                        $item=array();
                        $total = 0;
                        $date1 = strtotime($_POST["date1"]);
                        $date2 = strtotime($_POST["date2"]);
                        echo "<h3>Expense Table for the Dates : "
                            .date('d-m-Y',$date1)." To "
                            .date('d-m-Y',$date2)."</h3>";
                        echo "<table border=1 width = '1000'>";
                        echo "<tr><td>Date</td><td>Time</td><td>Product</td><td>Amount (Rs.)</td></tr>";

                       
                                            
                       $con = new mysqli('localhost','root','root','examples');
                        if($con->connect_error)
                        {
                            die("Database Connection failed: ".$con->connect_error);
                        }

                         $sql = "select * from ".$_SESSION["user"].";";
                       
                         $result = $con->query($sql);
                        if($result->num_rows >0)
                        {
                           while( $row=$result->fetch_assoc())
                           {
                                $date3 = strtotime($row["datee"]);
                                if($date3 >= $date1 && $date3 <= $date2)
                                {
                                    $datee = $row["datee"];
                                    $timee = $row["timee"];
                                    $purpose = $row["purpose"];
                                    $amount = $row["amount"];
                                    $total = $total + $amount;
                                    echo "<tr><td>$datee</td><td>$timee</td><td>$purpose</td><td>$amount</td></tr>";

                                    if(array_key_exists($purpose,$item))
                                    {
                                         $item["$purpose"] += $amount;
                                    }
                                    else
                                    {
                                        $item["$purpose"] = 0;
                                        $item["$purpose"] += $amount;
                                    }
                                }
                            }
                        }
                        echo "</table>";
                        echo "<p>Total Spendings : ".$total."</p>";
                        echo "<br><br>";
                        echo "<h3>Itemwise Spending Table for the Dates : "
                            .date('d-m-Y',$date1)." To "
                            .date('d-m-Y',$date2)."</h3>";
                        echo "<table border=1 width = '1000'>";
                        echo "<tr><td>Item</td><td>Spendings (Rs.)</td></tr>";

                        foreach($item as $key=>$val)
                        {
                             echo "<tr><td>$key</td><td>$val</td></tr>";
                        }
                        echo "</table>";
                    }
                ?>
         </div>
         <?php 
       
        echo "<p>Logged in as ".$_SESSION["user"]."</p>";
        echo "<p>on ".$_SESSION["date"]."</p>";
        echo "<p>at ".$_SESSION["time"]."</p>";
    
        ?>
    </body>
<html>

