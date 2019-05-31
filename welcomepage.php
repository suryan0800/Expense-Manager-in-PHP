<html>
    <head>
        <title> Expense Manager</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <style>
        button {
          background-color: white;
           border: 2px solid black;
          border-radius: 5px;
          color: black;
          padding: 15px 15px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-weight: bold;
          width: 200px;
          font-size: 20px;
          margin: 4px 2px;
          cursor: pointer;
        }

        h1 
        {
	        color : white;
	        font-family: 'Roboto', sans-serif;
	        padding : 10px;
	        border-bottom : 1px solid white;
	        width : 600px;
	        margin : auto;
        }

        p
        {
            color : white; 
            text-align : center; 
            width : 500px; 
            margin : 20px auto;
        }
        </style>
    </head>
    <body style = "background : #002447; ">
	    
	    <div class = "container" style = "width : 700px; margin : 100px auto; text-align : center;">	
            <h1>Welcome to Expense Manager</h1>

            <p>Look everywhere you can to cut a little bit from your expenses. It will all add up to a meaningful sum.</p>
            <p>Beware of little expenses. A small leak will sink a greatship. </p>
            <p>A Penny Saved is a Penny Earned.</p>

            <a href = "register.cgi"><button type = "button" >Register</button></a>
            <a href = "expenselist.cgi"><button type = "button" >View Expenses</button></a>

	    </div>
    </body>
</html>
