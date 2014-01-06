<?php
$stringBTC = file_get_contents("https://btc-e.com/api/2/btc_usd/ticker");
$json_btc=json_decode($stringBTC,true);
$BTCBuy =  $json_btc['ticker']['buy'];
$diff=1;
$BTCRATE = $BTCBuy*$diff;
echo "{";
echo "\"btcRate\":".$BTCRATE;
echo "}";

?>