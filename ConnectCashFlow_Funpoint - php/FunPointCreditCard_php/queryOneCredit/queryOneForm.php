<!doctype html>
<html lang="en">

<head>
    <title>QueryOneCreditForm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <?php
    //default params:
    $MerchantID = "1000048";
    $CreditAmount = 30;
    $CreditCheckCode = 36374463;
    $HashKey = "yHS1jcx1evVmxeDf";
    $HashIV = "dzibLsaNr5qUWeny";
    $QueryUrl = "https://payment.funpoint.com.tw/CreditDetail/QueryTrade/V2";
    ?>
</head>

<body>
    <header>

    </header>
    <main>
        <!-- form表單 -->
        <h2 style="background-color:aqua">訂單內容</h2>
        <form action="queryOne.php" method="POST">
            <!-- 特店資訊 -->
            <label for="">MerchantID 特店代碼:</label>
            <input id="txtMerchantID" type="text" name="MerchantID" value=<?php echo $MerchantID ?>>
            <br>
            <label for="">CreditRefundId 信用卡授權單號 :</label>
            <input id="txtCreditRefundId" type="text" name="CreditRefundId" value="">
            <br>
            <label for="">CreditAmount 金額 :</label>
            <input id="txtCreditAmount" type="text" name="CreditAmount" value=<?php echo $CreditAmount ?>>
            <br>
            <label for="">CreditCheckCode 商家檢查碼 :</label>
            <input id="txtCreditCheckCode" type="text" name="CreditCheckCode" value=<?php echo $CreditCheckCode ?>>
            <br>
            <label for="">HashKey:</label>
            <input id="txtHashKey" type="text" name="HashKey" value=<?php echo $HashKey ?>>
            <br>
            <label for="">HashIV:</label>
            <input id="txtHashIV" type="text" name="HashIV" value=<?php echo $HashIV ?>>
            <br>
            <label for="">QueryUrl:</label>
            <input id="txtQueryOneUrl" type="text" name="AIOUrl" value=<?php echo $QueryUrl ?>>
            <br>
            <!-- 送出按鈕 -->
            <input id="btnQuery" type="submit" value="查詢">
        </form>
    </main>
</body>

</html>