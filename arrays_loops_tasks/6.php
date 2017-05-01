
<?php

$arr = array(
    'green'=>'зеленый',
    'red'=>'красный',
    'blue'=>'голубой'
);

$en= array();
$ru= array();

foreach ($arr as $key=>$value){
    $en[]=$key;
    $ru[]=$value;
}

foreach ($en as $value){
    echo $value;
    echo PHP_EOL;
}

foreach ($ru as $value){
    echo $value;
    echo PHP_EOL;
}
?>


