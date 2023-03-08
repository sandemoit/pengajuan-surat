<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Tambah</h5>
                </div>
                <?php echo form_open_multipart(); ?>
                <input type="hidden" name="id_surat_masuk">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Nama Surat</label>
                                <input class="form-control" id="nama_surat" name="nama_surat" type="text" value="<?= $sm['nama_surat_masuk'] ?>">
                                <?= form_error('nama_surat', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">Tanggal Surat</label>
                                <input class="form-control digits" id="tanggal_surat" name="tanggal_surat" type="date" value="<?= $sm['tanggal_surat_masuk'] ?>">
                                <?= form_error('tanggal_surat', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div>
                                    <label class="form-label" for="exampleFormControlTextarea4">Keterangan</label>
                                    <textarea class="form-control" id="keterangan_surat" name="keterangan_surat" rows="3"><?= $sm['keterangan_surat_masuk'] ?></textarea>
                                    <?= form_error('keterangan_surat', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="form-label" for="exampleFormControlTextarea4">File Surat</label>
                                <input class="form-control" id="file_surat" name="file_surat" type="file">
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