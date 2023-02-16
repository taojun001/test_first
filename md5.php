<?php 

$str=md5('1234567');

echo $str."</br>";



$str2=substr(md5('1234567'),8,16);

echo $str2;
?>