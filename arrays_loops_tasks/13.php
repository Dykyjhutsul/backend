
<?php
define('MIN_NUMBER', 1);
define('MAX_NUMBER', 9);

for ($column = MIN_NUMBER; $column<=MAX_NUMBER ;$column++){
    for($raw = MIN_NUMBER; $raw<=MAX_NUMBER ;$raw++){
        $result=$column*$raw;
        echo vsprintf("%d * %d = %d\r\n",[$column,$raw,$result]);
    }
    echo PHP_EOL;
}

?>

