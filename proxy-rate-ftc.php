<?php
$stringFTC = file_get_contents("https://btc-e.com/api/2/ftc_btc/ticker");
$json_ftc=json_decode($stringFTC,true);
$FTCBuy =  $json_ftc['ticker']['buy'];
$diff=1;
$FTCRATE = $FTCBuy*$diff;
echo "{";
echo "\"ftcRate\":".$FTCRATE;
echo "}";

?>