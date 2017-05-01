
<?php
$numb=[];
for($i=0;$i<20;$i++){
    $numb[$i]=mt_rand(0,100);
    echo "$numb[$i]  ";
}
echo PHP_EOL;
$min=100;
$i_min;
$max=0;
$i_max;
for($i=0;$i<20;$i++){
    if($numb[$i]>$max){
        $max=$numb[$i];
        $i_max=$i;
    }
    if($numb[$i]<$min){
        $min=$numb[$i];
        $i_min=$i;
    }
}

$value=$numb[$i_min];
$numb[$i_min]=$numb[$i_max];
$numb[$i_max]=$value;
for($i=0;$i<20;$i++){
    echo "$numb[$i]  ";
}

?>

