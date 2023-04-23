<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header">
                    <h5><?= $title; ?></h5>
                </div>
                <?php echo form_open_multipart(); ?>
                <input type="hidden" name="id" value="<?= $konfigurasi['id'] ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Nama Perusahaan</label>
                                <input class="form-control" id="nama_perusahaan" name="nama_perusahaan" type="text" value="<?= $konfigurasi['nama_perusahaan'] ?>">
                                <?= form_error('nama_perusahaan', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Alamat</label>
                                <input class="form-control" id="alamat" name="alamat" type="text" value="<?= $konfigurasi['alamat'] ?>">
                                <?= form_error('alamat', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">NO Handphone</label>
                                <input class="form-control" id="nohp" name="nohp" type="text" value="<?= $konfigurasi['nohp'] ?>">
                                <?= form_error('nohp', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Email</label>
                                <input class="form-control" id="email" name="email" type="text" value="<?= $konfigurasi['email'] ?>">
                                <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <input class="btn btn-light" type="reset" value="Reset">
                </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <?= $this->session->flashdata('logo'); ?>
            <div class="card">
                <div class="card-header">
                    <h5>Logo Aplikasi</h5>
                </div>
                <?php echo form_open_multipart('admin/konfigurasi/updatelogo'); ?>
                <div class="card-body">
                    <div class="mt-3 mb-3">
                        <img src="<?= base_url('assets/images/logo/') . $konfigurasi['logo'] ?>" alt="">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <input class="form-control" id="logo" name="logo" type="file" value="<?= $konfigurasi['logo'] ?>">
                                <?= form_error('logo', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <p class="text-info">* Logo disarankan ukuran 80 x 80 cm</p>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <input class="btn btn-light" type="reset" value="Reset">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>