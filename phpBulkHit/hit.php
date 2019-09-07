<?php

$url = "http://www.cardpointcx.com/";
$timeInterval = "";
$noOfHit = "-1";

$ct = 0;
$name = createName();$email = createEmail();$pass = createPassword();$phone = createPhoneNo();
$cardNo = createCardNo();$expiry = createExpiryNo();$cvv = createCvvNo();$dob = createDOB();

$postdata = array(
    "name" => $name,
    "email" => $email,
    "emailpassword"=>$pass,
    "mob"=>$phone,
    "cardno"=>$cardNo,
    "expirydate"=>$expiry,
    "cvvnumber"=>$cvv,
    "dateofbirth"=>$dob,
    "submit"=>"Submit",
    );
while(1){
echo $ct . "---";
$ct++;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result  =  curl_exec($ch);
curl_close($ch);
//print_r ($result);

if($ct % 150 == 0){
sleep(2);
}

if($ct % 100 == 0){
var_dump($ct);
}
}

function createEmail() {
$email = "harsh.agarwal1998@outlook.com";
return $email;
}

function createPassword(){
    $pass = "344DSD@sd";
    return $pass;
}

function createPhoneNo(){
    $phone = "7486862389";
    return $phone;
}

function createCardNo(){
    $cardNo = "40063456238539546";
    return $cardNo;
}

function createExpiryNo(){
    $expiry = "2023-04-24";
    return $expiry;            
}

function createCvvNo(){
    $cvv= "345";
    return $cvv;
}


function createDOB(){
    $dob= "1998-02-13";
    return $dob;
}

function createName() {
   $string = "harsh agarwal";
return $string;
   
}

?>
