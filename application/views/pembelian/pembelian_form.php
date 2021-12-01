<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Pembelian</h1>
        </div>
        <div class="card shadow  mb-6">
            <div class="card-body">
                <div class="container col-lg-12">
                    <form name="cart" method="POST" href="" action="<?= site_url('pembelian/add') ?>">
                        <table class="table table-bordered">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nama">Pembelian dari</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal"> Tanggal Pembelian</label>
                                        <input type="date" name="tanggal" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Total Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Satuan Barang</th>
                                    <th>Total Harga</th>
                                    <th class="text-center"><button class="btn btn-primary btn-flat shadow-sm" name="add">Tambah</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr name="line_items">
                                    <td></td>
                                    <td><input type="text" name="total_satuan[]" id="total_satuan" class="form-control total_satuan" required></td>
                                    <td><input type="text" name="nama_barang[]" class="form-control" required></td>
                                    <td><input type="text" name="harga_satuan[]" id="harga_satuan" class="form-control harga_satuan" required></td>
                                    <td style="width: 150px;"><select type="text" name="jenis_satuan[]" class="form-control jenis_satuan" required>
                                            <option value="Botol">Botol</option>
                                            <option value="Karung">Karung</option>
                                            <option value="Kardus">Kardus</option>
                                    </td>
                                    <td><input type="text" name="total_harga[]" id="total_harga" class="form-control total_harga" jAutoCalc="{.total_satuan} * {.harga_satuan}"></td>
                                    <td class="text-center"><button name="remove" class="btn btn-danger btn-sm ">Remove</button></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="font-weight: bold;" class="text-center">TOTAL PEMBAYARAN</td>
                                    <td colspan="2"><input type="text" name="harga_total" class="form-control" value="" jAutoCalc="SUM({.total_harga})"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="box-footer">
                            <div class="form-group text-right">
                                <button type="submit" name="" class="btn btn-primary btn-flat shadow-sm ">Simpan</button>
                                <a href="<?= site_url('pembelian/hasil') ?>" class="btn btn-info btn-flat shadow-sm">HASIL PEMBELIAN</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>