<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    foreach ($row as $data) {
    } ?>

    <title>Laporan_Pembelian_<?= $data->nama_pembeli ?>_<?= $data->tanggal_pembeli ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        #line {
            border-color: #000;
            border-width: 0.5px;
        }

        .table1 {
            width: 100%;
            border-collapse: collapse;
        }

        .head,
        .body {
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>


<body>
    <table style="width: 100%;">
        <tr>
            <td class="text-left">
                <span style="line-height:1.6; font-weight:bold; font-size:20">CV MUTIARA BOTOL</span><br>
                <span style="line-height:1; font-weight:normal; font-size:14">JUAL - BELI BOTOL KOSONG</span><br>
                <span style="line-height:1; font-weight:normal; font-size:12">Jl. Lapan Suradita Cisauk</span><br>
                <span style="line-height:1; font-weight:normal; font-size:12">Telp: 081807087234/081286767670</span><br>
            </td>
            <td class="text-left">
                <span style="line-height:1; font-weight:normal; font-size:10">Pembelian Tanggal:</span><br>
                <span style="line-height:1; font-weight:bold; font-size:10"><?= indo_date($data->tanggal_pembeli) ?></span><br>
                <span style="line-height:1; font-weight:normal; font-size:10">Pembelian Dari Yth.,</span><br>
                <span style="line-height:1; font-weight:bold; font-size:10"><?= ucwords($data->nama_pembeli) ?></span>
                <br>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <table class="table1">
        <thead>
            <tr>
                <th class="head">No.</th>
                <th class="head">Total Barang</th>
                <th class="head">Nama Barang</th>
                <th class="head">Harga Satuan</th>
                <!-- <th>Satuan Barang</th> -->
                <th class="head">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($row as $data) { ?>
                <tr>
                    <td class="text-center body"><?= $no++ ?>.</td>
                    <td class="body"><?= $data->beli_total ?></td>
                    <td class="body"><?= ucwords($data->beli_barang) ?></td>
                    <td class="body"><?= indo_currency($data->beli_satuan) ?></td>
                    <!-- <td><?= $data->beli_jenis ?></td> -->
                    <td class="body"><?= indo_currency($data->beli_harga) ?></td>
                </tr>
            <?php
            } ?>
            <tr>
                <td colspan="4" class="text-right" style="font-weight: bold;">Total </td>
                <td class="text-center body"><b><?= indo_currency($data->harga_total_pembeli) ?></b></td>
            </tr>

        </tbody>
    </table>
    <table style="width: 100%;">
        <tr>
            <td colspan="2" align="left" style="font-weight: normal; font-size:14">Tanda Terima,</td>
            <td colspan="2" align="right" style="font-weight: normal; font-size:14">Hormat Kami,</td>
        </tr>
    </table>
</body>

</html>