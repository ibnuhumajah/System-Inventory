<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kontak</h1>
        </div>
        <div class="card shadow  mb-6">

            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                        <label for="Nama"> Nama Pelanggan</label>
                        <input type="hidden" name="kontak_id" value="<?= $row->kontak_id ?>">
                        <input type="text" name="fullname" class="form-control" value="<?= $this->input->post('fullname') ?? $row->nama_kontak ?>">
                        <span class="help-block"><?= form_error('fullname') ?></span>
                    </div>
                    <div class="form-group <?= form_error('phone') ? 'has-error' : null ?>">
                        <label for="Telepon"> Telepon</label>
                        <input type="text" name="phone" class="form-control" value="<?= $this->input->post('phone') ?? $row->nomor_kontak ?>">
                        <span class="help-block"><?= form_error('phone') ?></span>
                    </div>
                    <div class="form-group <?= form_error('wa') ? 'has-error' : null ?>">
                        <label for="Wa"> Whatsapp</label>
                        <input type="text" name="wa" class="form-control" value="<?= $this->input->post('wa') ?? $row->whatsapp ?>">
                        <span class="help-block"><?= form_error('wa') ?></span>
                    </div>
                    <div class="form-group <?= form_error('addr') ? 'has-error' : null ?>">
                        <label for="Addr"> Alamat</label>
                        <textarea type="text" name="addr" class="form-control" value="<?= $this->input->post('addr') ?>"><?= $row->address ?></textarea>
                        <span class="help-block"><?= form_error('wa') ?></span>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-flat shadow-sm">Submit</button>
                        <a href="<?= site_url('kontak') ?>" class="btn btn-flat shadow-sm"> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>