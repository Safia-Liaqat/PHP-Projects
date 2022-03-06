<?php
$str="Hello WOrld, It's a beautifull day";
echo  str_replace("world"," ",$str);
$find=['hello','world'];
$replace=['hi','earth'];
echo str_replace($find,$replace,$strr);
echo str_ireplace($find,$replace,$strr);#not case-sensitive

echo substr_replace($str,"day",6,-5);
echo strstr($str,'eo','ia');

$array=['hello'=>'hi','WOrld'=>'place'];
echo strstr($str,$array);