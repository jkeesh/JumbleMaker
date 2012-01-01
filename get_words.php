<?php

$size = $_GET['size'];
$letters = strtolower($_GET['letters']);


if($size == 5){
    $arr = file("five.txt");
}else{
    $arr = file("six.txt");
}

function get_hist($str){
    $arr = str_split($str);
    $hist = array();
    foreach($arr as $char){
        if(!array_key_exists($char, $hist)){
            $hist[$char] = 0;
        }
        $hist[$char] = $hist[$char] + 1;
    }
    return $hist;
}

/* Compare two histograms. Two words are the same if their
 * histograms are the same. */
function is_valid($main, $other){
    foreach($main as $char => $count){
        // It does not satisfy if it does not have this character
        if(!array_key_exists($char, $other)){
            return false;
        }
        // It does not satisfy if it does nt have *enough* of this character
        if($other[$char] < $count){
            return false;
        }
    }
    return true;
}


function test($main_word, $other_word){
    $main_hist = get_hist($main_word);
    $other_hist = get_hist($other_word);
    if(is_valid($main_hist, $other_hist)){
        echo $other_word. " acceptable for " . $main_word;
    }else{
        echo $other_word. " NOT ACCEPTABLE for " . $main_word;
    }
    echo "\n";
}

$main_hist = get_hist($letters);

foreach($arr as $word){
    if(is_valid($main_hist, get_hist($word))){
        echo $word;
    }
}


/*
test($letters, "hello");
test($letters, "wife");
test($letters, "google");
test($letters, "reed");
test($letters, "rivet");
 */

?>
