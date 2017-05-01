
<?php
$arr = [1, 2, 3, 4, 5, 6, 7];
foreach ($arr as $value){
    if($value==6 | $value==7){
        echo "\033[1m$value\033[0m";
        echo PHP_EOL;
    }
    else {
        echo $value;
        echo PHP_EOL;
    }
}
?>

