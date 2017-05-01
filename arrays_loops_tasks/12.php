
    <?php
    $n=1000;
    for($i=0;;$i++){
        if($n<50){
            $num=$i;
            break;
        }
        $n/=2;

    }
    echo "Остримане число -  $n, Кідькість ітерацій - $num";
    echo PHP_EOL

    ?>

