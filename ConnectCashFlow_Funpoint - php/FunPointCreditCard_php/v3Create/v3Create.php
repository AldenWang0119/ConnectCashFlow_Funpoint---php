<?php
//設定參數
$stage = "0";
$ClientBackURL = "";
$MerchantTradeNo = time();
$MerchantTradeDate = date('Y/m/d H:i:s');
$ClientRedirectURL = "http://localhost:8080/funPointCreditCard%20-%20php/v3Create/v3CreateGet.php";
$ServerReplyURL = "http://localhost:8080/funPointCreditCard%20-%20php/v3Create/v3CreateGet.php";
$tradePostUrl = "https://payment-stage.funpoint.com.tw/MerchantMember/TradeWithBindingCardID";




//取得postData

if(isset($_POST["PlatformID"])){
    $PlatformID = $_POST["PlatformID"];
}else{
    $PlatformID = "";
}
;
$postData = [
    "ClientRedirectURL" => $ClientRedirectURL,
    "MerchantID" => $_POST["MerchantID"],
    "MerchantMemberID" => $_POST["MerchantMemberID"],
    "MerchantTradeDate" => $MerchantTradeDate,
    "MerchantTradeNo" => $MerchantTradeNo,
    "PlatformID" => $PlatformID,
    "ServerReplyURL" => $ServerReplyURL,
    "stage" => $stage,
    "TotalAmount" => $_POST["TotalAmount"],
    "TradeDesc" => $_POST["TradeDesc"],
];


// 產生檢查碼CheckMacValue
$HashKey = $_POST["HashKey"];
$HashIV = $_POST["HashIV"];
$CheckMacValue = '';
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
echo $CheckMacValue;


//連接curl
$url = $tradePostUrl;
$data_array = array(
"MerchantID"=>$_POST["MerchantID"],
"MerchantMemberID"=>$_POST["MerchantMemberID"],
"MerchantTradeNo"=>$MerchantTradeNo,
"MerchantTradeDate"=>$MerchantTradeDate,
"TotalAmount"=>$_POST["TotalAmount"],
"TradeDesc"=>$_POST["TradeDesc"],
"stage"=>$stage,
"ClientRedirectURL"=>$ClientRedirectURL,
"ServerReplyURL"=>$ServerReplyURL,
"CheckMacValue"=> $CheckMacValue,
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data_array));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
curl_close($ch);
echo $output;


// $ch = curl_init($api);
//   curl_setopt($ch, CURLOPT_POST, 1);
//   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//   curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//       'Content-Type: application/json',
//       'Content-Length: ' . strlen($data_string))
//   );
//   $result = curl_exec($ch);
//   curl_close($ch);

//處理資料
$outputArr = explode("&",$output);
foreach ($outputArr as $value){
$valueArr = explode("=",$value);
$newOutPutArr[$valueArr[0]] = $valueArr[1];
};


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $ServerReplyURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);