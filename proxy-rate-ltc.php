<?php
$stringLTC = file_get_contents("https://btc-e.com/api/2/ltc_usd/ticker");
$json_ltc=json_decode($stringLTC,true);
$LTCBuy =  $json_ltc['ticker']['buy'];
$diff=1;
$LTCRATE = $LTCBuy*$diff;
echo "{";
echo "\"ltcRate\":".$LTCRATE;
echo "}";

?>