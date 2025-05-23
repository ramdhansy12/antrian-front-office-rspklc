<?php
// cetak.php
$jenis = $_GET['jenis'] ?? '';
$nomor = $_GET['nomor'] ?? '';
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Antrian</title>
    <style>
    body {
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .antrian-box {
        margin-top: 100px;
        border: 2px dashed #000;
        padding: 50px;
    }

    h1 {
        font-size: 60px;
        margin: 0;
    }

    h2 {
        margin: 10px 0;
    }
    </style>
</head>

<body onload="window.print(); window.close();">
    <div class="antrian-box">
        <h2>Nomor Antrian</h2>
        <h1><?= strtoupper($jenis) ?> - <?= $nomor ?></h1>
    </div>
</body>

</html>