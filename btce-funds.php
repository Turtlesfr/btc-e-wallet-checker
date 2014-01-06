<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="styles.css">
<script src="jquery-1.9.1.js"></script>
<title>BTCE</title>
</head>

<body>
<div id="content">

</div>
<script type="text/javascript">
var BTCRATE=0; // in usd
var LTCRATE=0; // in usd
var NMCRATE=0; // in usd
var NVCRATE=0; // in usd
var PPCRATE=0; // in usd
var TRCRATE=0; // in btc
var FTCRATE=0; // in btc
var XPMRATE=0; // in btc
	$.getJSON("btce.php",function(data) {
			//console.log(data.return.funds);
			var funds = data.return.funds;
			$.each(funds, function(i,item)
			{
				if(item>0.001)
				{
					switch(i)
					{
						case "usd":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span></div>");
						break;
						case "btc":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
						case "ppc":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
						case "ltc":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
						case "nmc":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
						case "nvc":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
						case "trc":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
						case "ftc":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
						case "xpm":
						$('#content').append("<div id='"+i+"' class='row'><span class='currency'>"+i+" </span><span class='balance'>"+item+" </span><span class='rate'></span><span class='value'> </span></div>");
						break;
					}
				}
				
				
			});
			$('#content').append("<div id='total'></div>");
	});
	
	
function updateValue(currency,rate)
{
	switch(currency) // some currencies are directly in usd. TRC, FTC and XPM are in BTC only. We convert them in USD with " * BTCRATE".
	{
		case "trc":
		var balance = $("div:contains('"+currency+"') > .balance").html();
		$("div:contains('"+currency+"') > .rate").html((rate*BTCRATE).toFixed(5)+" $ ");
		$("div:contains('"+currency+"') > .value").html(rate*balance*BTCRATE+" $ ");
		break;
		case "ftc":
		var balance = $("div:contains('"+currency+"') > .balance").html();
		$("div:contains('"+currency+"') > .rate").html((rate*BTCRATE).toFixed(5)+" $ ");
		$("div:contains('"+currency+"') > .value").html(rate*balance*BTCRATE+" $ ");
		break;
		case "xpm":
		var balance = $("div:contains('"+currency+"') > .balance").html();
		$("div:contains('"+currency+"') > .rate").html((rate*BTCRATE).toFixed(5)+" $ ");
		$("div:contains('"+currency+"') > .value").html(rate*balance*BTCRATE+" $ ");
		break;
		default: // default currencies already in USD. No need to multiply by BTCRATE.
		var balance = $("div:contains('"+currency+"') > .balance").html();
		$("div:contains('"+currency+"') > .rate").html((rate).toFixed(5)+" $ ");
		$("div:contains('"+currency+"') > .value").html(rate*balance+" $ ");
		break;
	}
}
function updateEverything(){
	$.getJSON( "proxy-rate-btc.php", function(data){
		BTCRATE = data.btcRate;
		updateValue("btc",BTCRATE);
	});
	$.getJSON( "proxy-rate-ltc.php", function(data){
		LTCRATE = data.ltcRate;
		updateValue("ltc",LTCRATE);
	});
	$.getJSON( "proxy-rate-ppc.php", function(data){
		PPCRATE = data.ppcRate;
		updateValue("ppc",PPCRATE);
	});
	$.getJSON( "proxy-rate-nmc.php", function(data){
		NMCRATE = data.nmcRate;
		updateValue("nmc",NMCRATE);
	});
	$.getJSON( "proxy-rate-nvc.php", function(data){
		NVCRATE = data.nvcRate;
		updateValue("nvc",NVCRATE);
	});
	$.getJSON( "proxy-rate-trc.php", function(data){
		TRCRATE = data.trcRate;
		updateValue("trc",TRCRATE);
	});
	$.getJSON( "proxy-rate-ftc.php", function(data){
		FTCRATE = data.ftcRate;
		updateValue("ftc",FTCRATE);
	});
	$.getJSON( "proxy-rate-xpm.php", function(data){
		XPMRATE = data.xpmRate;
		updateValue("xpm",XPMRATE);
	});
	var total = 0;
	$(".value").each(function(){
		total += parseFloat($(this).html());
	});
	$("#total").html(total.toFixed(3)+" $ ");
	
}
var timerRefresh = setInterval(updateEverything, 2000);
updateEverything(); //call once for starting
</script>

</body>
</html>