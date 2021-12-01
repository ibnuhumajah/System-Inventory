<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
        </div>
        <div class="card shadow  mb-6">

            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-flat shadow-sm">Submit</button>
                        <a href="<?= site_url('user') ?>" class="btn btn-flat shadow-sm"> Kembali</a>
                    </div>
                    <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                        <label for="Name"> Name*</label>
                        <input type="text" name="fullname" class="form-control" value="<?= set_value('fullname') ?>">
                        <span class="help-block"><?= form_error('fullname') ?></span>
                    </div>
                    <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                        <label for="Username"> Username*</label>
                        <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>">
                        <span class="help-block"><?= form_error('username') ?></span>
                    </div>
                    <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                        <label for="Password"> Password*</label>
                        <input type="password" name="password" class="form-control" value="<?= set_value('password') ?>">
                        <span class="help-block"><?= form_error('password') ?></span>
                    </div>
                    <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                        <label for="Password"> Password Confirmation*</label>
                        <input type="password" name="passconf" class="form-control" value="<?= set_value('passconf') ?>">
                        <span class="help-block"><?= form_error('passconf') ?></span>
                    </div>

                    <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                        <label for="level"> Level*</label>
                        <select name="level" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Karyawan</option>
                            <span class="help-block"><?= form_error('level') ?></span>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>