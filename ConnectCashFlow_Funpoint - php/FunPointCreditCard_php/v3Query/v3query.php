<?php

//取得postData
$postData = [
"MerchantID" => $_POST["MerchantID"],
"MerchantMemberID" => $_POST["MerchantMemberID"],
];
if(isset($_POST["PlatformID"])){
    $postData["PlatformID"] = $_POST["PlatformID"];
};
$HashKey = $_POST["HashKey"];
$HashIV = $_POST["HashIV"];
$V3QueryURL = $_POST["V3QueryURL"];

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
$url = $_POST["V3QueryURL"];
$data_array = array(
"MerchantID"=>$_POST["MerchantID"],
"MerchantMemberID"=>$_POST["MerchantMemberID"],
"PlatformID"=>$_POST["PlatformID"],
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
        if(isset($newOutPutArr["MerchantID"])){
            echo $newOutPutArr["MerchantID"];
        }
    ?>
    </p>
    <p>2.MerchantMemberID 會員識別碼:<?php
    if(isset($newOutPutArr["MerchantMemberID"])){
        echo $newOutPutArr["MerchantMemberID"];
    }
    ?></p>
    <p>3.PlatformID 特約合作平台商代號:<?php
    if(isset($newOutPutArr["PlatformID"])){
        echo $newOutPutArr["PlatformID"];
    }
    ?></p>
    <p>4.Count 會員綁定信用卡筆數:<?php
    if(isset($newOutPutArr["Count"])){
        echo $newOutPutArr["Count"];
    }
    ?></p>
    <p>4.JSonData 會員綁定信用卡資料，回傳JSon 格式:<?php
    if(isset($newOutPutArr["JSonData"])){
        echo $newOutPutArr["JSonData"];
    }
    ?></p>
    <button type="text" onclick="history.back()">回到上一頁</button>
</body>

</html>