
<?php
$arr = [4, 2, 5, 19, 13, 0, 10];

//Не зрозумів умову - С помощью цикла foreach и оператора if
//проверьте есть ли в массиве элемент со значением $e, равном 2, 3 или 4.
//Для чого саме потрібно створювати цю змінну $e ?

foreach ($arr as $value){
    if($value==2 | $value==3 | $value==4) {
        echo 'PRESENT!';
        echo PHP_EOL;
    }
    else{
        echo 'UPSENT!';
        echo PHP_EOL;
    }
};

?>

