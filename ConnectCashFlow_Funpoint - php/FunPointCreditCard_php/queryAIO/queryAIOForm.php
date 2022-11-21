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
    $QueryUrl = "https://payment-stage.funpoint.com.tw/Cashier/QueryTradeInfo/V5";


    ?>
</head>

<body>
    <header>

    </header>
    <main>
        <!-- form表單 -->
        <h2 style="background-color:aqua">查詢AIO訂單</h2>
        <form action="queryAIO.php" method="POST">
            <!-- 特店資訊 -->
            <label for="">MerchantID 特店代碼:</label>
            <input id="txtMerchantID" type="text" name="MerchantID" value=<?php echo $MerchantID ?>>
            <br>
            <label for="">MerchantTradeNo 特店交易編號 :</label>
            <input id="txtMerchantTradeNo" type="text" name="MerchantTradeNo" value="">
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