
<?php
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
$month=5;
foreach ($arr as $value){
    if($value==$month){
        echo "\033[1m$value\033[0m,";
    }
    else {
        echo "$value,";
    }
}


?>

