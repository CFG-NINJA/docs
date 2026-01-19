<?php
header('Content-Type: application/json');
function http_request($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}
$total = http_request("https://api.etherscan.io/api?module=stats&action=tokensupply&contractaddress=0x4Eca7761a516F8300711cbF920C0b85555261993&apikey=8YMZYZ2QH2EKU3S9NV1XAF9P3URTXBXFVN");
$t1 = json_decode($total, true);

$re1total = $t1["result"];
$stotal = $re1total / 1e18;

//print number_format($stotal, 4, '.', '');
//print $s1;  
$ur1 = http_request("https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0x4Eca7761a516F8300711cbF920C0b85555261993&address=0x7ee058420e5937496f5a2096f04caa7721cf70cc&tag=latest&apikey=8YMZYZ2QH2EKU3S9NV1XAF9P3URTXBXFVN");
$ur2 = http_request("https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0x4Eca7761a516F8300711cbF920C0b85555261993&address=0x000000000000000000000000000000000000dead&tag=latest&apikey=8YMZYZ2QH2EKU3S9NV1XAF9P3URTXBXFVN");
$ur3 = http_request("https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0x4Eca7761a516F8300711cbF920C0b85555261993&address=0x407993575c91ce7643a4d4ccacc9a98c36ee1bbe&tag=latest&apikey=8YMZYZ2QH2EKU3S9NV1XAF9P3URTXBXFVN");
$ur4 = http_request("https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0x4Eca7761a516F8300711cbF920C0b85555261993&address=0xca991A67Ee3CAc79EC6c8D5Eb18ED3B50A6970b5&tag=latest&apikey=8YMZYZ2QH2EKU3S9NV1XAF9P3URTXBXFVN");

$j1 = json_decode($ur1, true);
$j2 = json_decode($ur2, true);
$j3 = json_decode($ur3, true);
$j4 = json_decode($ur4, true);

$re1 = $j1["result"];
$re2 = $j2["result"];
$re3 = $j3["result"];
$re4 = $j4["result"];

$s1 =$re1/ 1e18;
$s2 =$re2/ 1e18;
$s3 =$re3/ 1e18;
$s4 =$re4/ 1e18;
$cal = $stotal  - ($s1 + $s2 + $s3 + $s4);
print number_format($cal, 18, '.', '');
//print $cal;
?>