<div id="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hasil Penjualan</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow  mb-4">
            <div class="card-header py-3 text-right">
                <a href="<?= site_url('penjualan') ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Input Penjualan</a>
                <a href="<?= site_url('penjualan/excel') ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-file-excel fa-md text-white-50"></i> Export Excel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Penjual</th>
                                <th>Tanggal Penjual</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td><?= ucwords($data->nama_penjual) ?></td>
                                    <td><?= indo_date($data->tanggal_penjual) ?></td>
                                    <td><?= indo_currency($data->harga_total_penjual) ?> </td>
                                    <td class="text-center">
                                        <a href="<?= site_url('penjualan/view/' . $data->id_penjual) ?>" class="btn btn-info shadow-sm">Detail</a>
                                        <a href="<?= site_url('penjualan/ubah/' . $data->id_penjual) ?>" class="btn btn-warning shadow-sm">Ubah</a>
                                        <a id="btn-hapus" href="<?= site_url('penjualan/del_penjual/' . $data->id_penjual) ?>" class="btn btn-danger shadow-sm">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>