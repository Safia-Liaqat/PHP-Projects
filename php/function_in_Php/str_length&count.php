<?php

$str="Hello WOrld, It's a beautifull day";
echo strlen($str).'<br>';

$aray= str_word_count($str,2);
echo  "<pre>";
print_r($aray);
echo "</pre>";

echo substr_count($str," ");
?>