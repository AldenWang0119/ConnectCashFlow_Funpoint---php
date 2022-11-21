<?php

//產生timestamp
$timestamp = time();

//取得postData
$postData = [
"Action" => $_POST["Action"],
"MerchantID" => $_POST["MerchantID"],
"MerchantTradeNo" => $_POST["MerchantTradeNo"],
"PlatformID" => " ",
"TradeNo" => $_POST["TradeNo"],
];
$postData["TradeNo"] = isset($_POST["TradeNo"]) ? ($_POST["TradeNo"]) : (" ");
$HashKey = $_POST["HashKey"];
$HashIV = $_POST["HashIV"];
$ActionUrl = $_POST["ActionUrl"];
// var_dump($postData)."<br>";


// 產生檢查碼CheckMacValue
$CheckMacValue = '';
if(isset($postData['CheckMacValue'])){
    unset($postData['CheckMacValue']);
}
// ksort($postData);
foreach($postData as $key => $value){
$CheckMacValue = $CheckMacValue . '&' . $key . '=' . $value ;
};
$CheckMacValue = 'HashKey=' . $_POST["HashKey"] . $CheckMacValue . '&HashIV='. $_POST["HashIV"];
$CheckMacValue = urlencode($CheckMacValue);
$CheckMacValue = strtolower($CheckMacValue);
$CheckMacValue = str_replace('%2d', '-', $CheckMacValue);
$CheckMacValue = str_replace('%5f', '_', $CheckMacValue);
$CheckMacValue = str_replace('%2e', '.', $CheckMacValue);
$CheckMacValue = str_replace('%21', '!', $CheckMacValue);
$CheckMacValue = str_replace('%2a', '*', $CheckMacValue);
$CheckMacValue = str_replace('%28', '(', $CheckMacValue);
$CheckMacValue = str_replace('%29', ')', $CheckMacValue);
$CheckMacValue = hash('sha256', $CheckMacValue);
$CheckMacValue = strtoupper($CheckMacValue);


//連接curl
$url = $_POST["ActionUrl"];
$data_array = array(
"MerchantID"=>$_POST["MerchantID"],
"MerchantTradeNo"=>$_POST["MerchantTradeNo"],
"TimeStamp"=>$timestamp,
"CheckMacValue"=> $CheckMacValue,
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data_array));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
curl_close($ch);
// echo "顯示回傳值" . $output . "<br>";

//處理資料
$outputArr = explode("&",$output);
$newOutPutArr0 = array();
foreach ($outputArr as $value){
$valueArr = explode("=",$value);
$newOutPutArr[$valueArr[0]] = $valueArr[1];
};
// var_dump($newOutPutArr);



// //回傳的檢查碼
// $CheckMacValueBack = $newOutPutArr["CheckMacValue"];
// echo "回傳的:".$CheckMacValueBack."<br>";
// //重新計算檢查碼
// unset($newOutPutArr['CheckMacValue']);
// // unset($newOutPutArr['HandlingCharge']);
// // unset($newOutPutArr['PaymentTypeChargeFee']);
// foreach($newOutPutArr as $key => $value ){
//     echo "@" . $key . "=" . $value;
//     echo "<br>";
// }

// ksort($newOutPutArr);
// foreach($newOutPutArr as $key => $value){
//     $CheckMacValueBack = $CheckMacValueBack . '&' . $key . '=' . $value ;
//     };
//     $CheckMacValueBack = 'HashKey=' . $_POST["HashKey"] . $CheckMacValueBack . '&HashIV='. $_POST["HashIV"];
//     $CheckMacValueBack = urlencode($CheckMacValueBack);
//     $CheckMacValueBack = strtolower($CheckMacValueBack);
//     $CheckMacValueBack = str_replace('%2d', '-', $CheckMacValueBack);
//     $CheckMacValueBack = str_replace('%5f', '_', $CheckMacValueBack);
//     $CheckMacValueBack = str_replace('%2e', '.', $CheckMacValueBack);
//     $CheckMacValueBack = str_replace('%21', '!', $CheckMacValueBack);
//     $CheckMacValueBack = str_replace('%2a', '*', $CheckMacValueBack);
//     $CheckMacValueBack = str_replace('%28', '(', $CheckMacValueBack);
//     $CheckMacValueBack = str_replace('%29', ')', $CheckMacValueBack);
//     $CheckMacValueBack = hash('sha256', $CheckMacValueBack);
//     $CheckMacValueBack = strtoupper($CheckMacValueBack);


//顯示html
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QueryAIO</title>
</head>

<body>
    <h2 style="background-color:aqua">執行結果</h2>
    <p>1.MerchantID 特店編號:
        <?php
        echo $AIOUrl = $_POST["MerchantID"];;
    ?>
    </p>
    <p>2.MerchantTradeNo 特店交易編號:<?php
    if(isset($newOutPutArr["MerchantTradeNo"])){
        echo $newOutPutArr["MerchantTradeNo"];
    }
    ?></p>
    <p>3.TradeNo 歐買尬的交易編號:<?php
    if(isset($newOutPutArr["TradeNo"])){
        echo $newOutPutArr["TradeNo"];
    }
    ?></p>
    <p>4.TradeStatus 交易狀態:<?php
    if(isset($newOutPutArr["TradeStatus"])){
        echo $newOutPutArr["TradeStatus"];
    }
    ?></p>
    <p>5.RtnMsg 交易訊息:<?php
    if(isset($newOutPutArr["RtnMsg"])){
        echo $newOutPutArr["RtnMsg"];
    };
    ?></p>
    <button type="text" onclick="history.back()">回到上一頁</button>
</body>

</html>