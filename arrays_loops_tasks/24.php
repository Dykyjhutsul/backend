
<?php
$numb=4;
$number=442158755745;
$str=(string)$number;
$count=0;
for($i=0;$i<strlen($str);$i++){
    if($str[$i]==$numb){
        $count++;
    }
}
echo $count;
?>

