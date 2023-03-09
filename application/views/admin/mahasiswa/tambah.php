<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Tambah Mahasiswa</h5>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">NIM</label>
                                <input class="form-control" id="nim" name="nim" type="number">
                                <?= form_error('nim', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Nama</label>
                                <input class="form-control" id="nama" name="nama" type="text">
                                <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">Tempat Lahir</label>
                                <input class="form-control digits" id="tmpt_lhr" name="tmpt_lhr">
                                <?= form_error('tmpt_lhr', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">Tanggal Lahir</label>
                                <input class="form-control digits" id="tgl_lhr" name="tgl_lhr" type="date">
                                <?= form_error('tgl_lhr', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">Alamat</label>
                                <input class="form-control digits" id="alamat" name="alamat" type="text">
                                <?= form_error('alamat', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">RT</label>
                                <input class="form-control digits" id="rt" name="rt" type="text">
                                <?= form_error('rt', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">RW</label>
                                <input class="form-control digits" id="rw" name="rw" type="text">
                                <?= form_error('rw', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">No WA</label>
                                <input class="form-control digits" id="nowa" name="nowa" type="text">
                                <?= form_error('nowa', '<div class="text-danger">', '</div>'); ?>
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
    </div>
</div>