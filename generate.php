<?php

$info = $_GET['info'];
$full = $_GET['full'];

$arr = explode(',', $info);

$all = array();

// Get the nth (occurence #) occurence of letter in word.
// For example given
// word = hello
// letter = l
// occurence = 2
//
// return 3, b/c the 2nd occurence of l occurs at index 3
// of the word hello
//
function get_nth_occurence($word, $letter, $occurence){
    $cur = 1;
    for($i = 0; $i < strlen($word); $i++){
        $char = $word[$i];
        if($char == $letter){
            if($cur == $occurence){
                return $i;
            }
            $cur++;
        }
    }
}

// Return an array describing the mask over the 
// word which shows where the cirles should go
// For example, if you have the word = 'hello' and
// letters = 'e,l' one possible mask is
//
// hello
// 01010
//
// showing we should use the first e and second l.
// Since we dont want to simply choose the first instance
// of every letter (if there are multiple) we should introduce
// some randomness into this procedure.
//
function get_mask($word, $letters){
    $arr = str_split($letters);

    // fill with 0s
    $mask = array_fill(0, strlen($word), 0);
   
 
    foreach($arr as $letter){
        $count = substr_count($word, $letter);
        while(true){
          $occurence = rand(1, $count);
          $idx = get_nth_occurence($word, $letter, $occurence);
          
          // Make sure we have not set this location yet 
          if($mask[$idx] == 0){
            // Choose this index to set a circle in
            $mask[$idx] = 1;
            break;
          } 
        }
    }
    return $mask;
}


function shuffle_word($word){
    $arr = str_split($word);
    shuffle($arr);
    return implode('', $arr);
}


function draw_circles($mask){
    if(count($mask) == 5){
        $class = 'five-circles';
    }else{
        $class = 'six-circles';
    }
    
    echo "<div class='circles ".$class."'>";

    foreach($mask as $val){
        if($val == 0){
            echo "<span class='circle'>";
        }else{
            echo "<span class='circle on'>";
            echo "<img src='circle.png' />";
        }
        echo "</span>";
    }
    
    echo "</div>";
}


function draw_word($shuffle){
    echo "<div class='shuffle'>";
    echo strtoupper($shuffle);
    echo "</div>";
}

// responsible for displaying one row of a word
function display($info){
    $word = $info['word'];
    $shuffle = $info['shuffle'];
    $mask = $info['mask'];
    $word_arr = str_split($word);

    draw_word($shuffle);
    draw_circles($mask);
}

foreach($arr as $val){
    list($letters, $word) = explode(':', $val);
    $letters = strtolower($letters);
    $mask = get_mask($word, $letters);
    $all []= array('letters'=> $letters,
                   'word'   => $word,
                   'mask'   => $mask,
                   'shuffle'=> shuffle_word($word)           
    );
}

//print_r($all);

echo "<div id='jumble'>";
foreach($all as $key => $info){

    display($info);
}
echo "<div class='clear'></div>";
echo "<div id='final'>";
$answer = str_split($full);
foreach($answer as $char){
    if($char == ' '){
        echo "<span class='space'></span>";
    }else{
        echo "<span class='circle on'>";
        echo "<img src='circle.png' />";
        echo "</span>";
    }
}
echo "<span class='space'></span>";

echo "</div>";
?>

<link href="generate.css" rel="stylesheet" type="text/css">
