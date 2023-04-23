<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header">
                    <h5>Import Excel Karyawan</h5>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload File</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="karyawan" type="file">
                                    <div class="mt-3">
                                        <p>* file yang bisa di import adalah .xls | .csv | .xlsx.</p>
                                        <p>* download contoh file excel <a class="text-success" href="<?= base_url('assets/contoh-file.xlsx') ?>">Download</a></p>
                                        <p class="text-danger">* Jangan lupa hapus header di file excel setelah mengedit / input data, kemudian disave dan diimport.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a href="<?= site_url('admin/karyawan') ?>" class="btn btn-light">Cancel</a>
                </div>
                </form>
            </div>
        </div>
        <!-- Complex headers (rowspan and colspan) Ends-->