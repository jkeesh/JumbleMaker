<?php

/* Get the final answer and 'clean' it, meaning remove all spaces,
 * special characters, and also convert it to uppercase.
 */
$answer = $_GET['word'];
$cleaned = preg_replace('/[^a-zA-Z]/', '', $answer);
$cleaned = strtoupper($cleaned);



?>


<html>
    <head>
        <title>
            Jumble Maker!
        </title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="LetterContainer.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        new LetterContainer({
            word: '<?php echo $cleaned; ?>'
        });
    });
    </script>

    <link href="style.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="letter_container">
            <?php 

            for($i = 0; $i < strlen($cleaned); $i++){
            ?>
                <span class="letter">
                <?php echo $cleaned[$i]; ?> 
                </span>
            <?php
            } ?>
        </div>

        <div id="bottom_container">
            <div id="container1">

            </div>
            <div id="container2">

            </div>
            <div id="container3">

            </div>
            <div id="container4">

            </div>
        </div>
    </body>
</html>
