<html>

<head>
    <title>
        Jumble Maker!
    </title>
</head>

<body>
    <style type="text/css">
        #welcome{
            font-size: 20px;
            padding: 20px;
            margin: auto;
            text-align: center;
        }
        
        input{
            padding: 6px;
            font-size: 15px;
        }
        input[type=text]{
            width: 350px;
        }

        #container{
            width: 960px;
            margin: auto;
        }

        form{
            width: 420px;
            margin: auto;
        }
    </style>

<div id="container">
    <div id="welcome">
        Welcome to the Jumble Maker!
    </div>


    <form method="get" action="jumble.php">
        <input type="text" name="word" placeholder="Type your final answer here." />
        <input type="submit" value="Go!" />
    </form>
</div>
</body>

</html>
