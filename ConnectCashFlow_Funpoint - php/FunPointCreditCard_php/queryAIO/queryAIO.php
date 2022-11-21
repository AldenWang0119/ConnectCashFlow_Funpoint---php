<?php

//產生timestamp
$timestamp = time();

//取得postData
$postData = [
"MerchantID" => $_POST["MerchantID"],
"MerchantTradeNo" => $_POST["MerchantTradeNo"],
"timestamp" => $timestamp,
];
$HashKey = $_POST["HashKey"];
$HashIV = $_POST["HashIV"];
$AIOUrl = $_POST["AIOUrl"];


// 產生檢查碼CheckMacValue
$CheckMacValue = '';
unset($postData['CheckMacValue']);
ksort($postData);
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
$url = $_POST["AIOUrl"];
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

//處理資料
$outputArr = explode("&",$output);
foreach ($outputArr as $value){
$valueArr = explode("=",$value);
$newOutPutArr[$valueArr[0]] = $valueArr[1];
};


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
    <h2 style="background-color:aqua">V3綁定查詢結果</h2>
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
    <p>3.StoreID 特店旗下店舖代號:<?php
    if(isset($newOutPutArr["StoreID"])){
        echo $newOutPutArr["StoreID"];
    }
    ?></p>
    <p>4.TradeNo 歐買尬的交易編號:<?php
    if(isset($newOutPutArr["TradeNo"])){
        echo $newOutPutArr["TradeNo"];
    }
    ?></p>
    <p>5.TradeAmt 交易金額:<?php
    if(isset($newOutPutArr["TradeAmt"])){
        echo $newOutPutArr["TradeAmt"];
    }
    ?></p>
    <p>6.PaymentDate 付款時間:<?php
    if(isset($newOutPutArr["PaymentDate"])){
        echo $newOutPutArr["PaymentDate"];
    }
    ?></p>
    <p>7.PaymentType 特店選擇的付款方式:<?php
    if(isset($newOutPutArr["PaymentType"])){
        echo $newOutPutArr["PaymentType"];
    }
    ?></p>
    <p>8.HandlingCharge 手續費合計:<?php
    if(isset($newOutPutArr["HandlingCharge"])){
        echo $newOutPutArr["HandlingCharge"];
    }
    ?></p>
    <p>9.PaymentTypeChargeFee 通路費:<?php
    if(isset($newOutPutArr["PaymentTypeChargeFee"])){
        echo $newOutPutArr["PaymentTypeChargeFee"];
    }
    ?></p>
    <p>10.TradeDate 訂單成立時間:<?php
    if(isset($newOutPutArr["TradeDate"])){
        echo $newOutPutArr["TradeDate"];
    }
    ?></p>
    <p>11.TradeStatus 交易狀態:<?php
    if(isset($newOutPutArr["TradeStatus"])){
        echo $newOutPutArr["TradeStatus"];
    }
    ?></p>
    <p>12.ItemName 商品名稱:<?php
    if(isset($newOutPutArr["ItemName"])){
        echo $newOutPutArr["ItemName"];
    }
    ?></p>
    <button type="text" onclick="history.back()">回到上一頁</button>
</body>

</html>