<!doctype html>
<html lang="en">

<head>
    <title>V3 Query</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <?php
    //default params:
    $MerchantID = "1000006";
    $MerchantMemberID = "1000006A0001";
    $PlatformID = "1000006";
    $TotalAmount = "100";
    $TradeDesc = "測試";
    $Culture = "en-US";
    $HashKey = "0oRnN21qXFAc1N3q";
    $HashIV = "1ZgjVNoljPpKcS1t";
    ?>
</head>

<body>
    <header>

    </header>
    <main>
        <!-- form表單 -->
        <h2 style="background-color:aqua">V3新增綁卡</h2>
        <form action="v3Create.php" method="POST">
            <!-- 特店資訊 -->
            <label for="">MerchantID 特店代碼:</label>
            <input id="txtMerchantID" type="text" name="MerchantID" value=<?php echo $MerchantID ?>>
            <br>
            <label for="">MerchantMemberID 會員識別碼:</label>
            <input id="txtMerchantMemberID" type="text" name="MerchantMemberID" value=<?php echo $MerchantMemberID ?>>
            <br>
            <label for="">PlatformID 特約合作平台商代號:</label>
            <input id="txtPlatformID" type="text" name="PlatformID" value=<?php echo $PlatformID ?>>
            <br>
            <label for="">TotalAmount 交易金額:</label>
            <input id="txtTotalAmount" type="text" name="TotalAmount" value=<?php echo $TotalAmount ?>>
            <br>
            <label for="">TradeDesc 交易描述:</label>
            <input id="txtTradeDesc" type="text" name="TradeDesc" value=<?php echo $TradeDesc ?>>
            <br>
            <label for="">Culture 語系:</label>
            <input id="txtCulture" type="text" name="Culture" value=<?php echo $Culture ?>>
            <br>
            <label for="">HashKey:</label>
            <input id="txtHashKey" type="text" name="HashKey" value=<?php echo $HashKey ?>>
            <br>
            <label for="">HashIV:</label>
            <input id="txtHashIV" type="text" name="HashIV" value=<?php echo $HashIV ?>>
            <br>
            <!-- 送出按鈕 -->
            <input id="btnQuery" type="submit" value="前往新增">
        </form>
    </main>
</body>

</html>