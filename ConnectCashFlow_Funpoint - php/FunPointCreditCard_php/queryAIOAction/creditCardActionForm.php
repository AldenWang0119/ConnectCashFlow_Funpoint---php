<!doctype html>
<html lang="en">

<head>
    <title>QueryAIO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <?php
    //default params:
    $MerchantID = "1000044";
    $HashKey = "rGGLT4hoRkItW3rh";
    $HashIV = "lg8Dz0Lwk2L01Ur8";
    $ActionUrl = "https://payment-stage.funpoint.com.tw/CreditDetail/DoAction";
    $TotalAmount = 30;
    ?>
</head>

<body>
    <header>

    </header>
    <main>
        <!-- form表單 -->
        <h2 style="background-color:aqua">[信用卡關帳/退刷/取消/放棄]</h2>
        <form action="creditCardAction.php" method="POST">
            <!-- 特店資訊 -->
            <label for="">特店編號 MerchantID:</label>
            <input id="txtMerchantID" type="text" name="MerchantID" value=<?php echo $MerchantID ?>>
            <br>
            <label for="">HashKey:</label>
            <input id="txtHashKey" type="text" name="HashKey" value=<?php echo $HashKey ?>>
            <br>
            <label for="">HashIV:</label>
            <input id="txtHashIV" type="text" name="HashIV" value=<?php echo $HashIV ?>>
            <br>
            <label for="">ActionUrl:</label>
            <input id="txtActionUrl" type="text" name="ActionUrl" value=<?php echo $ActionUrl ?>>
            <br>

            <hr>

            <label for="">特店交易編號 MerchantTradeNo:</label>
            <input id="txtMerchantTradeNo" type="text" name="MerchantTradeNo">
            <br>
            <label for="">歐買尬的交易編號 TradeNo:</label>
            <input id="txtTradeNo" type="text" name="TradeNo">
            <br>
            <label for="">金額 TotalAmount:</label>
            <input id="txtTotalAmount" type="text" name="TotalAmount" value=<?php echo  $TotalAmount?>>
            <br>
            <label for="">Action:(關帳:C , 退刷:R , 取消:E , 放棄:N)</label>
            <input id="txtAction" type="text" name="Action">
            <br>
            <!-- 送出按鈕 -->
            <input id="btnQuery" type="submit" value="確定執行">
        </form>
    </main>
</body>

</html>