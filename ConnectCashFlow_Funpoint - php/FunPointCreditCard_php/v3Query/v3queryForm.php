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
    $HashKey = "0oRnN21qXFAc1N3q";
    $HashIV = "1ZgjVNoljPpKcS1t";
    $V3QueryURL = "https://payment-stage.funpoint.com.tw/MerchantMember/QueryMemberBinding";


    ?>
</head>

<body>
    <header>

    </header>
    <main>
        <!-- form表單 -->
        <h2 style="background-color:aqua">V3綁卡查詢</h2>
        <form action="v3query.php" method="POST">
            <!-- 特店資訊 -->
            <label for="">特店代碼:</label>
            <input id="txtMerchantID" type="text" name="MerchantID" value=<?php echo $MerchantID ?>>
            <br>
            <label for="">會員識別碼:</label>
            <input id="txtMerchantMemberID" type="text" name="MerchantMemberID" value=<?php echo $MerchantMemberID ?>>
            <br>
            <label for="">特約合作平台商代號:</label>
            <input id="txtPlatformID" type="text" name="PlatformID" value=<?php echo $PlatformID ?>>
            <br>
            <label for="">HashKey:</label>
            <input id="txtHashKey" type="text" name="HashKey" value=<?php echo $HashKey ?>>
            <br>
            <label for="">HashIV:</label>
            <input id="txtHashIV" type="text" name="HashIV" value=<?php echo $HashIV ?>>
            <br>
            <label for="">URL:</label>
            <input id="txtV3QueryURL" type="text" name="V3QueryURL" value=<?php echo $V3QueryURL ?>>
            <br>
            <!-- 送出按鈕 -->
            <input id="btnQuery" type="submit" value="查詢">
        </form>
    </main>
</body>

</html>