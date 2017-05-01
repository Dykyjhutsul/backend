
<?php
$arr = [1, 2, 3, 4, 5, 6, 7];
$day=1;
foreach ($arr as $value){
    if($value==$day){
        echo "\033[4m$value\033[0m";// незнайшов як вивести курсивом
        echo PHP_EOL;    }
    else {
        echo $value;
        echo PHP_EOL;
    }
}

?>

