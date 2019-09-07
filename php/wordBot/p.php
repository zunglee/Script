<?php


$servername = "localhost";
$username = "root";
$password = "root";
$database = "wordbot";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$notEnded = true;
$wordId = $argv[1];
$level = $argv[2];


while($notEnded){
getData($wordId);
}
function getData($wordId =  1456, $next = 15 , $wb_lw=19940){


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.greedge.com/wordbot/manager.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "word_id=$wordId&next=$next");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$cookieString = "PHPSESSID=a4vnc95sevtu80gpmenhl08hc1;wordbotauth=MzA3MjE5NTg4Ljky%7C403222890906192042743913331758655039212;wb_lt=allwords; wb_lw=19058";
$cookieString = "DRUPAL_UID=723858; PHPSESSID=a4vnc95sevtu80gpmenhl08hc1; _pk_id.2.755b=7400087d2a5d9628.1567879309.1.1567879314.1567879309.; wordbotauth=MzA3MjE5NTg4Ljky%7C403222890906192042743913331758655039212; wb_lt=allwords; wb_lw=$wb_lw";

curl_setopt($ch,CURLOPT_COOKIE, $cookieString);
$json = curl_exec($ch);

insertIntoDb($json);

curl_close ($ch);
}


function insertIntoDb($json){
global $conn , $level , $wordId;
$jsonArr = json_decode($json, true);
print_R($jsonArr);
if(count($jsonArr) < 15){
$notEnded = false;
}else{
 $wordId =  $jsonArr[14]["Id"];
}
foreach($jsonArr as $data){
$WordText = addslashes($data["WordText"]);
$partofspeech = addslashes($data["partofspeech"]);
$definition = addslashes($data["definition"]);
$Synonym = addslashes($data["Synonym"]);
$Antonym  = addslashes($data["Antonym"]);
$imageTag = addslashes($data["imageTag"]);
$root_present = addslashes($data["root_present"]);


$sql = "INSERT INTO WORD_BOT(WordText,partofspeech,definition,Synonym,Antonym,imageTag,root_present , level) VALUE ('$WordText','$partofspeech','$definition','$Synonym','$Antonym','$imageTag','$root_present' , $level)";


try{
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo  $conn->error;
}
}catch(Exception $ex){
echo $ex;
continue;
}
}
//print_R($jsonArr);
}



?>
