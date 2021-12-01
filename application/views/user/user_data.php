<div id="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow  mb-4">
            <div class="card-header py-3 text-right">
                <a href="<?= site_url('user/add') ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= ucwords($data->nama_user) ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->level == 1 ? "Admin" : "Karyawan" ?> </td>
                                    <td class="text-center" widht="160px">
                                        <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-warning shadow-sm">Ubah</a>
                                        <a id="btn-hapus" href="<?= site_url('user/del/' . $data->user_id) ?>" class="btn btn-danger shadow-sm">Hapus</a>
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