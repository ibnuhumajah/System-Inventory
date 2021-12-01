<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Penjualan</h1>
        </div>
        <?php
        foreach ($row as $data) {
        } ?>
        <div class="card shadow  mb-6">
            <div class="card-body">
                <div class="container col-lg-12">
                    <table style="width: 100%;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <span style="font-weight:bold; font-size:24px">CV MUTIARA BOTOL</span><br>
                                    <span style="font-weight:normal; font-size:18px">JUAL - BELI BOTOL KOSONG</span><br>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span style="font-weight:normal; font-size:18px">Tanggal Penjualan:</span><br>
                                    <span style="font-weight:bold; font-size:18px"><?= indo_date($data->tanggal_penjual) ?></span><br>
                                    <span style="font-weight:normal; font-size:18px">Penjualan Kepada:</span><br>
                                    <span style="font-weight:bold; font-size:18px"><?= ucwords($data->nama_penjual) ?></span>
                                </div>
                            </div>
                        </div>
                    </table>
                    <hr class="line-cart">
                    <form name="cart">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama Barang</th>
                                    <th>Total Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Satuan Barang</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row as $data) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td><?= ucwords($data->jual_barang) ?></td>
                                        <td><?= $data->jual_total ?></td>
                                        <td><?= indo_currency($data->jual_satuan) ?></td>
                                        <td><?= $data->jual_jenis ?></td>
                                        <td><?= indo_currency($data->jual_harga) ?></td>
                                    </tr>
                                <?php
                                } ?>
                                <tr>
                                    <td colspan="5" class="text-center" style="font-weight: bold;">TOTAL PEMBAYARAN</td>
                                    <td class="text-center"><?= indo_currency($data->harga_total_penjual) ?></td>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <div class="box-footer">
                            <div class="form-group text-right">
                                <a href="<?= base_url('penjualan/pdf/' . $data->id_penjual) ?>" target="_blank" class="btn btn-primary btn-flat shadow-sm "> Cetak Nota 1 <i class="fas fa-print"></i></a>
                                <a href="<?= base_url('penjualan/pdf2/' . $data->id_penjual) ?>" target="_blank" class="btn btn-info btn-flat shadow-sm "> Cetak Nota 2 <i class="fas fa-print"></i></a>
                                <a href="<?= site_url('penjualan/hasil') ?>" class="btn btn-flat shadow-sm">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>