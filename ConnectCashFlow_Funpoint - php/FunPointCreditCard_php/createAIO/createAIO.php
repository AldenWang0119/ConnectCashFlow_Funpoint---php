<?php
//取得postData------------------------------------------------------------
$postData = [
    "MerchantID" => $_POST["MerchantID"],
    "MerchantTradeNo" => $_POST["MerchantTradeNo"],
    "MerchantTradeDate" => $_POST["MerchantTradeDate"],
    "PaymentType" => "aio",
    "TotalAmount" => $_POST["TotalAmount"],
    "TradeDesc" => $_POST["TradeDesc"],
    "ItemName" => $_POST["ItemName"],
    "ReturnURL" => $_POST["ReturnURL"],
    "OrderResultURL" => $_POST["OrderResultURL"],
    "ClientBackURL" => $_POST["ClientBackURL"],
    "PaymentInfoURL" => $_POST["PaymentInfoURL"],
    "ItemURL" => $_POST["ItemURL"],
    "ChoosePayment" => $_POST["ChoosePayment"],
    "EncryptType" => "1",
    "Remark" => $_POST["Remark"],
    // "ChooseSubPayment" => $_POST["ChooseSubPayment"],
    "NeedExtraPaidInfo" => $_POST["NeedExtraPaidInfo"],
    // "DeviceSource" => $_POST["DeviceSource"],
    // "IgnorePayment" => $_POST["IgnorePayment"],
    // "InvoiceMark" => $_POST["InvoiceMark"],
    // "StoreID" => $_POST["StoreID"],
    // "CustomField1" => $_POST["CustomField1"],
    // "CustomField2" => $_POST["CustomField2"],
    // "CustomField3" => $_POST["CustomField3"],
    // "CustomField4" => $_POST["CustomField4"],
    "Language" => $_POST["Language"],
    //銀聯
    //0: 消費者於交易頁面可選擇是否使用銀聯交易。 
    //1: 只使用銀聯卡交易，且歐買尬會將交易頁面直接導到銀聯網站。 
    //2: 不可使用銀聯卡，歐買尬會將交易頁面隱藏銀聯選項。
    "UnionPay" => "",
    "CreditInstallment" => $_POST["CreditInstallment"],
    "BindingCard" => $_POST["BindingCard"],
    "MerchantMemberID" => $_POST["MerchantMemberID"],
    ];



    $link = $_POST["AIOUrl"];
    // 產生檢查碼CheckMacValue
    $CheckMacValue = '';
    // echo "<body'>";
    //排序
    unset($postData['CheckMacValue']);
    ksort($postData);
    // echo form
    echo "<body onload='document.form1.submit()'>";
    echo "<form action='${link}' name='form1' method='POST'>";
    foreach($postData as $key => $value){
        echo( "<input type='hidden' name='${key}' value='${value}'><br>");
        $CheckMacValue = $CheckMacValue . '&' . $key . '=' . $value ;
    }

    //組合字串
    $CheckMacValue = 'HashKey=' . $_POST["HashKey"] . $CheckMacValue . '&HashIV='. $_POST["HashIV"];
    // URLEncode
    $CheckMacValue = urlencode($CheckMacValue);
    
    //轉成小寫
    $CheckMacValue = strtolower($CheckMacValue);
    //取代為與dotNet相符的字元
    $CheckMacValue = str_replace('%2d', '-', $CheckMacValue);
    $CheckMacValue = str_replace('%5f', '_', $CheckMacValue);
    $CheckMacValue = str_replace('%2e', '.', $CheckMacValue);
    $CheckMacValue = str_replace('%21', '!', $CheckMacValue);
    $CheckMacValue = str_replace('%2a', '*', $CheckMacValue);
    $CheckMacValue = str_replace('%28', '(', $CheckMacValue);
    $CheckMacValue = str_replace('%29', ')', $CheckMacValue);
    //sha256編碼
    $CheckMacValue = hash('sha256', $CheckMacValue);
    //轉大寫
    $CheckMacValue = strtoupper($CheckMacValue);
    echo "<input type='hidden' name='CheckMacValue' value='${CheckMacValue}'><br>";
    echo '</form>';
    echo '</body>';
    ?>