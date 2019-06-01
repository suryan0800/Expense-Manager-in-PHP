<?php
       
          session_start();
          function logout1()
          {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
         }
         if(empty($_SESSION["user"]))
         {
            logout1();
         }
        elseif($_SESSION["date"] != date("d-m-Y"))
        {           
            logout1();
        }
        elseif(strtotime('+10 minutes',strtotime($_SESSION["time"])) < strtotime(date("h:i:s A")))
        {             
           logout1();
        }
        
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
                  Expense Manager
                   <a href = "logout.php"><button style="width:100px; float:right; font-size: 15px;" type = "button" >Logout</button></a>
               
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
                        $total = 0;
                        $date1 = strtotime($_POST["date1"]);
                        $date2 = strtotime($_POST["date2"]);
                        echo "<h3>Expense Table for the Dates : "
                            .date('d-m-Y',$date1)." To "
                            .date('d-m-Y',$date2)."</h3>";
                        echo "<table border=1 width = '1000'>";
                        echo "<tr><td>Date</td><td>Time</td><td>Product</td><td>Amount</td></tr>";

                       
                                            
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
                                }
                            }
                        }
                        echo "</table>";
                        echo "<p>Total Spendings : ".$total."</p>";
                    }
                ?>
         </div>
    </body>
<html>

<!--

    
     
    
     my @req ;
     for($x=0; $x < @list4 ; $x++)
     {
     
      $req[$x]= $list4[$x][1] ;
     
     }

     my %unique = ();
     foreach my $item (@req)
     {
        $unique{$item} =1;
     }
     my @myuniquearray = keys %unique;

     my @sumunique ;
     my $y = 0;

     foreach my $item (@myuniquearray)
     {
        my $sm=0;
        for($x=0; $x < @list4 ; $x++)
        {
            if ($item eq $list4[$x][1])
            {
             $sm = $sm + $list4[$x][0];
            }
        }
        $sumunique[$y]= $sm ;
        $y ++;
     }

     print br();
     print CGI::center(h3(" Itemwise Spendings "));

     print "<font size='6'><center><table border=1 width='1000' >";
     print "<tr><td>Product</td><td>Amount</td></tr>";

    

      for($x=0; $x < @myuniquearray ; $x++)
      {
        print "<tr><td>$myuniquearray[$x]</td><td>$sumunique[$x]</td></tr>";
      }

     print "</table></center></font>";
	
}

print "</div>";
print end_html();


-->




















