<?php
$postData = [
"CreditAmount" => $_POST["CreditAmount"],
"CreditCheckCode" => $_POST["CreditCheckCode"],
"CreditRefundId" => $_POST["CreditRefundId"],
"MerchantID" => $_POST["MerchantID"],
];

// 產生檢查碼CheckMacValue
$HashKey = $_POST["HashKey"];
$HashIV = $_POST["HashIV"];

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
    "CreditAmount"=>$_POST["CreditAmount"],
    "CreditCheckCode"=>$_POST["CreditCheckCode"],
    "CreditRefundId"=>$_POST["CreditRefundId"],
    "MerchantID"=>$_POST["MerchantID"],
    "CheckMacValue"=> $CheckMacValue,
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data_array));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
curl_close($ch);

var_dump ($output);
//處理資料
$outputArr = explode("&",$output);
$newOutPutArr = array();
foreach ($outputArr as $value){
$valueArr = explode("=",$value);
$newOutPutArr[$valueArr[0]] = $valueArr[1];
};

//顯示html(請於正式環境帶入各值)
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
    <h2 style="background-color:aqua">查詢單筆信用卡資訊</h2>
    <p>
        1.RtnMsg 回應訊息:
        <?php
    if(isset($newOutPutArr["TradeStatus"])){
        echo $newOutPutArr["TradeStatus"];
    }
    ?>
    </p>
    <p>2.RtnValue 回應內容:<?php
    if(isset($newOutPutArr["MerchantTradeNo"])){
        echo $newOutPutArr["MerchantTradeNo"];
    }
    ?></p>
    <p>3.TradeID 授權單號:<?php
    if(isset($newOutPutArr["StoreID"])){
        echo $newOutPutArr["StoreID"];
    }
    ?></p>
    <p>4.amount 交易金額:<?php
    if(isset($newOutPutArr["TradeNo"])){
        echo $newOutPutArr["TradeNo"];
    }
    ?></p>
    <p>5.clsamt 已關帳金額:<?php
    if(isset($newOutPutArr["TradeAmt"])){
        echo $newOutPutArr["TradeAmt"];
    }
    ?></p>
    <p>6.authtime 訂單成立時間:<?php
    if(isset($newOutPutArr["PaymentDate"])){
        echo $newOutPutArr["PaymentDate"];
    }
    ?></p>
    <p>7.status 交易狀態:<?php
    if(isset($newOutPutArr["PaymentType"])){
        echo $newOutPutArr["PaymentType"];
    }
    ?></p>
    <p>8.close_data 關帳資料:<?php
    if(isset($newOutPutArr["HandlingCharge"])){
        echo $newOutPutArr["HandlingCharge"];
    }
    ?></p>
    <p>9.PaymentTypeChargeFee 通路費:<?php
    if(isset($newOutPutArr["PaymentTypeChargeFee"])){
        echo $newOutPutArr["PaymentTypeChargeFee"];
    }
    ?></p>
    <button type="text" onclick="history.back()">回到上一頁</button>
</body>

</html>