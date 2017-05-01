<?php

$numb=[];
for($i=0;$i<20;$i++){
    $numb[$i]=mt_rand(1,100);
    echo "$numb[$i]  ";
}
echo PHP_EOL;

$multiple=1;
for($i=0;$i<20;$i++){
    if($numb[$i]%2==0){
        $multiple*=$numb[$i];
    }
    else{
        echo "$numb[$i]  ";
    }
}

echo PHP_EOL;
echo $multiple;
?>