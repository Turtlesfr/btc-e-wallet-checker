<?php
$stringXPM = file_get_contents("https://btc-e.com/api/2/xpm_btc/ticker");
$json_xpm=json_decode($stringXPM,true);
$XPMBuy =  $json_xpm['ticker']['buy'];
$diff=1;
$XPMRATE = $XPMBuy*$diff;
echo "{";
echo "\"xpmRate\":".$XPMRATE;
echo "}";

?>