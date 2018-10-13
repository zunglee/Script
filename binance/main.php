<?php
require 'vendor/autoload.php';
$buy='0.00011200';
$flag = -1;

while(1)
{
$api = new Binance\API("lcIyi2SzVSweqX2Dg5qO1s28WiLzoILBhKWBN9ZBd8Cj4y6Axwuxi8Iq1EWQyZrx","IV4hMaAv2Y5RlqKN2a6dRS7J9rfS9uLU9VMwsnBVYpZYZOxLULlgUTrtd6ZQgDfr");
$ticker = $api->prices();
echo "Ripple XRP current Price ={$ticker['XRPBTC']}".PHP_EOL ;
if($ticker['XRPBTC'] <= $buy){
$buy =  $ticker['XRPBTC'];
$flag = 0;
//passthru('echo "add /home/ankitesh/Videos/muvi/Justice_League.MP4" | tee vlcfifo');
}

if($ticker['XRPBTC'] > $buy && $flag == 0){
  $flag = 1;
}

if($flag == 1){
passthru('echo "add /home/ankitesh/Videos/muvi/Justice_League.MP4" | tee vlcfifo');

}


echo "NOT yet"  .PHP_EOL;
sleep(30);
}


//echo "Price of BNB: {$ticker['BNBBTC']} BTC.".PHP_EOL;

?>
