<?php
 $array=array("Zack", "Anthony", "Ram", "Salim", "Raghav");
 $find=['hello','world'];
 $newaray=array_merge($array,$find);
$array_replace=array_replace($array,$find);
 
 echo  "<pre>";
print_r($newaray);
echo "</pre>";

echo  "<pre>******************************************";
print_r($array_replace);
echo "</pre>";
echo "*************************";
$array=array("a"=>"Zack","b"=> "Anthony","c"=>"Ram", "d"=>"Salim","e"=> "Raghav");
$replace_array=["f"=>"hello","d"=>"world","e"=>"abc"];
$array_replace_recursive=array_replace_recursive($array,$replace_array);
echo  "<pre>";
print_r($array_replace_recursive);
echo "</pre>";
?>