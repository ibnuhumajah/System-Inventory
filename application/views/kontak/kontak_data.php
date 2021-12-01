<div id="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kontak Pelanggan</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow  mb-4">
            <div class="card-header py-3 text-right">
                <a href="<?= site_url('kontak/add') ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Kontak</a>
                <a href="<?= site_url('kontak/excel') ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-file-excel fa-md text-white-50"></i> Export Excel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Whatsapp</th>
                                <th>Alamat/Perusahaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= ucwords($data->nama_kontak) ?></td>
                                    <td><?= $data->nomor_kontak ?></td>
                                    <td><?= $data->whatsapp ?></td>
                                    <td><?= ucwords($data->address) ?></td>
                                    <td class="text-center" widht="160px">
                                        <a href="<?= site_url('kontak/edit/' . $data->kontak_id) ?>" class="btn btn-warning shadow-sm">Ubah</a>
                                        <a id="btn-hapus" href="<?= site_url('kontak/del/' . $data->kontak_id) ?>" class="btn btn-danger shadow-sm">Hapus</a>
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