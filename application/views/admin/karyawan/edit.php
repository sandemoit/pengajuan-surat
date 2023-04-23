<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5>Form Edit Karyawan</h5>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <input class="form-control" id="id" name="id" type="hidden" value="<?= $karyawan['id'] ?>">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">No Surat</label>
                                <input disabled class="form-control" id="nosurat" name="nosurat" type="text" value="<?= $karyawan['nosurat'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Nama</label>
                                <input class="form-control" id="nama" name="nama" type="text" value="<?= $karyawan['nama'] ?>">
                                <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">No WA</label>
                                <input class="form-control digits" id="nowa" name="nowa" type="number" value="<?= $karyawan['nowa'] ?>">
                                <?= form_error('nowa', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="btn btn-light" href="<?= site_url('admin/karyawan') ?>">Back</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>