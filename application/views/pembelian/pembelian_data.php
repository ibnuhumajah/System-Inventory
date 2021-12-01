<div id="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hasil Pembelian</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow  mb-4">
            <div class="card-header py-3 text-right">
                <a href="<?= site_url('pembelian') ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Input Pembelian</a>
                <a href="<?= site_url('pembelian/excel') ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-file-excel fa-md text-white-50"></i> Export Excel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Pembeli</th>
                                <th>Tanggal</th>
                                <th>Total Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td><?= ucwords($data->nama_pembeli) ?></td>
                                    <td><?= indo_date($data->tanggal_pembeli) ?></td>
                                    <td><?= indo_currency($data->harga_total_pembeli) ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('pembelian/view/' . $data->id_pembeli) ?>" class="btn btn-info shadow-sm">Detail</a>
                                        <a href="<?= site_url('pembelian/ubah/' . $data->id_pembeli) ?>" class="btn btn-warning shadow-sm">Ubah</a>
                                        <a id="btn-hapus" href="<?= site_url('pembelian/del_pembeli/' . $data->id_pembeli) ?>" class="btn btn-danger shadow-sm">Hapus</a>
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