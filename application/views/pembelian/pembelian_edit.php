<div id="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">EDIT DATA PEMBELIAN</h1>
        </div>
        <div class="col-md-12">
            <div id="notif"></div>
        </div>
        <div class="card shadow  mb-6">
            <div class="card-body">
                <div class="container col-lg-12">
                    <form name="cart" method="post" action="<?= site_url('pembelian/ubahdata') ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    foreach ($row as $data) {
                                    } ?>
                                    <label for="nama"> Pembelian dari</label>
                                    <input type="hidden" name="id_pembeli" value="<?= $data->id_pembeli ?>">
                                    <input type="text" name="nama" id="" value="<?= $data->nama_pembeli ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal"> Tanggal Pembelian</label>
                                    <input type="date" name="tanggal" id="" value="<?= $data->tanggal_pembeli ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered" id="data_table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Barang</th>
                                    <th>Total Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Satuan Barang</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row as $data) { ?>
                                    <tr name="line_items">
                                        <input type="hidden" name="id_pembelian[]" value="<?= $data->id_pembelian ?>">
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td><input type="text" name="nama_barang[]" value="<?= $data->beli_barang ?>" class="form-control nama_barang"></td>
                                        <td><input type="text" name="total_satuan[]" value="<?= $data->beli_total ?>" class="form-control total_satuan"></td>
                                        <td><input type="text" name="harga_satuan[]" value="<?= $data->beli_satuan ?>" class="form-control harga_satuan"></td>
                                        <td style="width: 150px;"><select type="text" name="jenis_satuan[]" class="form-control jenis_satuan">
                                                <option value="<?= $data->beli_jenis ?>"><?= $data->beli_jenis ?></option>
                                                <option value="Botol">Botol</option>
                                                <option value="Karung">Karung</option>
                                                <option value="Kardus">Kardus</option>
                                        </td>
                                        <td><input type="text" name="total_harga[]" value="<?= $data->beli_harga ?>" class="form-control total_harga" jAutoCalc="{.total_satuan} * {.harga_satuan}"></td>
                                        <td class="text-center"><a id="btn-hapus" href="<?= site_url('pembelian/del_pembelian/' . $data->id_pembelian) ?>" class="btn btn-danger btn-sm ">Hapus</a></td>
                                    </tr>
                                <?php
                                } ?>
                                <tr>
                                    <td colspan="4" class="text-center" style="font-weight: bold;">TOTAL PEMBAYARAN</td>
                                    <td colspan="2"><input type="text" name="harga_total" value="<?= $data->harga_total_pembeli ?>" class="form-control" jAutoCalc="SUM({.total_harga})"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="box-footer">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-flat shadow-sm ">Simpan</button>
                                <a href="<?= site_url('pembelian/hasil') ?>" class="btn btn-flat shadow-sm">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>