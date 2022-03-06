<?php
$str="Hello WOrld, It's a beautifull day";
$array=str_split($str,5);
echo  "<pre>";
print_r($array);
echo "</pre>";

$str="Hello WOrld,";
$newstr=chunk_split($str,2,"..");
echo $newstr;
?>