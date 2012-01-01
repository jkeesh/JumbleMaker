<?php

print_r($_GET);
echo $_GET['letters'];

$letters = explode(',', $_GET['letters']);
print_r($letters);
?>
