<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Penjualan</h1>
        </div>
        <div class="col-md-12">
            <div id="notif"></div>
        </div>
        <div class="card shadow  mb-6">
            <div class="card-body">
                <div class="container col-lg-12">
                    <form name="cart" method="post" action="<?= site_url('penjualan/add') ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nama"> Penjualan untuk</label>
                                    <input type="text" name="nama" id="" value="" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal"> Tanggal Penjualan</label>
                                    <input type="date" name="tanggal" id="" value="" class="form-control" required>
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
                                    <th class="text-center"><button class="btn btn-primary btn-flat shadow-sm" name="add">Tambah</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr name="line_items">
                                    <td></td>
                                    <td><input type="text" name="nama_barang[]" class="form-control nama_barang" required></td>
                                    <td><input type="text" name="total_satuan[]" class="form-control total_satuan" required></td>
                                    <td><input type="text" name="harga_satuan[]" class="form-control harga_satuan" required></td>
                                    <td style="width: 150px;"><select type="text" name="jenis_satuan[]" class="form-control jenis_satuan" required>
                                            <option value="Botol">Botol</option>
                                            <option value="Karung">Karung</option>
                                            <option value="Kardus">Kardus</option>
                                    </td>
                                    <td><input type="text" name="total_harga[]" class="form-control total_harga" jAutoCalc="{.total_satuan} * {.harga_satuan}" readonly></td>
                                    <td class="text-center"><button name="remove" class="btn btn-danger btn-sm ">Remove</button></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-center" style="font-weight: bold;">TOTAL PEMBAYARAN</td>
                                    <td colspan="2"><input type="text" name="harga_total" class="form-control" jAutoCalc="SUM({.total_harga})" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="box-footer">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-flat shadow-sm ">Simpan</button>
                                <a href="<?= site_url('penjualan/hasil') ?>" class="btn btn-info btn-flat shadow-sm">HASIL PENJUALAN</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>