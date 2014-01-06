<?php
$stringTRC = file_get_contents("https://btc-e.com/api/2/trc_btc/ticker");
$json_trc=json_decode($stringTRC,true);
$TRCBuy =  $json_trc['ticker']['buy'];
$diff=1;
$TRCRATE = $TRCBuy*$diff;
echo "{";
echo "\"trcRate\":".$TRCRATE;
echo "}";

?>