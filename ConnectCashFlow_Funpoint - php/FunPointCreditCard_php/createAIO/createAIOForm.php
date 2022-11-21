<!doctype html>
<html lang="en">

<head>
    <title>CreateAIO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<scrīpt language='javascrīpt' type='text/javascrīpt'></scrīpt>
<?php
//參數設定
//自動產生訂單時間
date_default_timezone_set('Asia/Taipei');
$MerchantTradeDate = date("Y/m/d H:i:s");
//自動產生訂單編號
$MerchantTradeNo = "Jerry".microtime(true);
$MerchantTradeNo = str_replace('.', '1', $MerchantTradeNo);
?>

<body>
    <header>

    </header>
    <main>
        <h2>產生AIO訂單</h2>
        <form action="createAIO.php" method="POST">
            <!-- 特店資訊 -->
            <label for="">特店編號 MerchantID:</label>
            <input id="" type="text" name="MerchantID" value="1000006">
            <br>


            <label for="">HashKey:</label>
            <input id="" type="text" name="HashKey" value="0oRnN21qXFAc1N3q">
            <br>


            <label for="">HashIV:</label>
            <input id="" type="text" name="HashIV" value="1ZgjVNoljPpKcS1t">
            <br>


            <label for="">AIOUrl:</label>
            <input id="" type="text" name="AIOUrl" value="https://payment-stage.funpoint.com.tw/Cashier/AioCheckOut/V5">
            <br>
            <hr>

            <!-- 交易資訊 -->
            <!-- 特店交易編號 -->
            <label for="">特店交易編號 MerchantTradeNo:</label>
            <input id="" type="text" name="MerchantTradeNo" value="<?php echo $MerchantTradeNo ?>">
            <br>

            <!-- 特店交易時間 -->
            <label for="">特店交易時間 MerchantTradeDate:</label>
            <input id="" type="text" name="MerchantTradeDate" value="<?php echo $MerchantTradeDate ?>">
            <br>

            <!-- 交易金額 -->
            <label for="">交易金額 TotalAmount:</label>
            <input id="" type="text" name="TotalAmount" value="30">
            <br>

            <!-- 交易描述 -->
            <label for="">交易描述 TradeDesc:</label>
            <input id="" type="text" name="TradeDesc" value="測試交易描述">
            <br>

            <!-- 商品名稱 -->
            <label for="">商品名稱 ItemName:</label>
            <input id="" type="text" name="ItemName" value="測試商品名稱">
            <br>

            <!-- 付款完成通知回傳網址 -->
            <label for="">*付款完成通知回傳網址 ReturnURL:</label>
            <input id="" type="text" name="ReturnURL"
                value="http://funpointcreditcard.local:1420/API/AIOServerReturn.ashx">
            <br>

            <p>(要開通防火牆.ReturnURL才能接收到大特店回傳資料)</p>

            <!-- 選擇預設付款方式 -->
            <label for="">選擇預設付款方式 (Credit/WebATM/ATM/ALL) ChoosePayment:</label>
            <input id="" type="text" name="ChoosePayment" value="ALL">
            <br>

            <!-- Client端回傳付款結果網址 -->
            <label for="">Client端回傳付款結果網址 OrderResultURL:</label>
            <input id="" type="text" name="OrderResultURL" value="">
            <br>

            <!-- Client端返回特店的按鈕連結 -->
            <label for="">Client端返回特店的按鈕連結 ClientBackURL:</label>
            <input id="" type="text" name="ClientBackURL" value="">
            <br>

            <!-- 商品銷售網址 -->
            <label for="">商品銷售網址 ItemURL:</label>
            <input id="" type="text" name="ItemURL" value="">
            <br>

            <!-- Server端回傳付款相關資訊PaymentInfoURL -->
            <label for="">Server端回傳付款相關資訊PaymentInfoURL:</label>
            <input id="" type="text" name="PaymentInfoURL" value="">
            <br>

            <p>(非付款成功通知) (for ATM) (要開通防火牆.PaymentInfoURL才能接收到大特店回傳資料)</p>

            <!-- 備註欄位 -->
            <label for="">備註欄位 Remark:</label>
            <input id="" type="text" name="Remark" value="">
            <br>

            <!-- 付款子項目 -->
            <label for="">付款子項目 ChooseSubPayment:</label>
            <input id="" type="text" name="ChooseSubPayment" value="">
            <br>

            <!-- 是否需要額外的付款資訊 -->
            <label for="">是否需要額外的付款資訊 NeedExtraPaidInfo:</label>
            <input id="" type="text" name="NeedExtraPaidInfo" value="N">
            <br>

            <!-- 裝置來源 -->
            <label for="">裝置來源 DeviceSource:</label>
            <input id="" type="text" name="DeviceSource" value="">
            <br>

            <!-- 隱藏付款方式 -->
            <label for="">隱藏付款方式 IgnorePayment:</label>
            <input id="" type="text" name="IgnorePayment" value="">
            <br>

            <!-- 電子發票開立註記 -->
            <label for="">電子發票開立註記 InvoiceMark:</label>
            <input id="" type="text" name="InvoiceMark" value="N">
            <br>

            <!-- 特店旗下店舖代號 -->
            <label for="">特店旗下店舖代號 StoreID:</label>
            <input id="" type="text" name="StoreID" value="">
            <br>

            <!-- 自訂名稱欄位 -->
            <label for="">自訂名稱欄位 CustomField1:</label>
            <input id="" type="text" name="CustomField1" value="">
            <br>

            <!-- 自訂名稱欄位 -->
            <label for="">自訂名稱欄位 CustomField2:</label>
            <input id="" type="text" name="CustomField2" value="">
            <br>

            <!-- 自訂名稱欄位 -->
            <label for="">自訂名稱欄位 CustomField3:</label>
            <input id="" type="text" name="CustomField3" value="">
            <br>

            <!-- 自訂名稱欄位 -->
            <label for="">自訂名稱欄位 CustomField4:</label>
            <input id="" type="text" name="CustomField4" value="">
            <br>

            <hr />
            <!-- 語系 -->
            語系 (ENG/KOR/JPN/CHI) Language:<input id="txtLanguage" name="Language" type="text" value="ENG" />
            <hr />

            <!-- 記憶卡號 -->
            記憶卡號 BindingCard:<input id="txtBindingCard" name="BindingCard" type="text" value="1" />

            <!-- 記憶卡號識別碼 -->
            記憶卡號識別碼 MerchantMemberID:<input id="txtMerchantMemberID" name="MerchantMemberID" type="text"
                value="10000062156" />

            <!-- 信用卡分期期數 -->
            信用卡分期期數 CreditInstallment:<input id="txtCreditInstallment" name="CreditInstallment" type="text" value="" />


            <!-------------------------- 暫定參數 ---------------------------->

            <!-- PlatformID -->
            <label for="">PlatformID</label>
            <input id="" type="text" name="PlatformID" value=" ">
            <br>

            <!----------------------- 清空、送出按鈕 -------------------------->
            <input type="reset" value="Reset">
            <input type="submit" name="">
        </form>
    </main>
</body>

</html>