<?php
define('WIDTH',mt_rand(1,20));
define('HIGTH', mt_rand(1,20));


$color = array(
'gray'     => 30,
'black'     => 30,
'red'      => 31,
'green'     => 32,
'yellow'    => 33,
'blue'     => 34,
'magenta'    => 35,
'cyan'     => 36,
'white'     => 37,
'default'    => 39
);
$bgcolor = array(
'gray'    => 40,
'black'   => 40,
'red'    => 41,
'green'   => 42,
'yellow'   => 43,
'blue'    => 44,
'magenta'  => 45,
'cyan'    => 46,
'white'   => 47,
'default'  => 49,
);

$colors=$bgcolor;

for($column=1;$column<WIDTH;$column++){
    for($raw=1;$raw<HIGTH;$raw++){
        $value=mt_rand(100,999);
        $color= array_rand($bgcolor);
        echo sprintf("\033[%sm %a \033[0m",$colors[$color],$value);
     }
    echo PHP_EOL;
}

?>