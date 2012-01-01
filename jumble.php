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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script type="text/javascript" src="LetterContainer.js"></script>
    <script type="text/javascript" src="WordContainer.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        new LetterContainer({
            word: '<?php echo $cleaned; ?>'
        });


        new WordContainer({
            id: '#container1'
        });
        new WordContainer({
            id: '#container2'
        });
        new WordContainer({
            id: '#container3'
        });
        new WordContainer({
            id: '#container4'
        });
    });
    </script>

    <link href="style.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <div id="container">
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
                <div id="container1" class="word_container">
                    <div class="title">5 letter</div> 
                    <div class="letter_holder"></div>
                    <div class="word_list"></div>
                </div>
                <div id="container2" class="word_container">
                    <div class="title">5 letter</div> 
                    <div class="letter_holder"></div>
                    <div class="word_list"></div>
                </div>
                <div id="container3" class="word_container">
                    <div class="title">6 letter</div> 
                    <div class="letter_holder"></div>
                    <div class="word_list"></div>
                </div>
                <div id="container4" class="word_container">
                    <div class="title">6 letter</div> 
                    <div class="letter_holder"></div>
                    <div class="word_list"></div>
                </div>
            </div>
        </div>
    </body>
</html>
