<?php
$str="Hello WOrld, It's a beautifull day";
$array=explode(" ",$str,2);
echo  "<pre>";
print_r($array);
echo "</pre>";

#implode
$array=array("Hello","WOrld", "It's", "a", "beautifull", "day");
$str=implode(" ",$array);
echo $str;
#implode and join have the same functionality.
echo "join";
$str=join(" ",$array);
echo $str;
?>