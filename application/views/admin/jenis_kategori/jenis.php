<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 project-list">
            <div class="card">
                <?php echo form_open_multipart('admin/jenis/save'); ?>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="nama_jenis" id="nama_jenis" placeholder="Jenis Surat">
                        <?= form_error('nama_jenis', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="col">
                        <button type="submit" name="save" class="btn btn-primary"> <i data-feather="save"> </i>Simpan </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display dataTable no-footer" id="basic-6">
                            <thead>
                                <th>No</th>
                                <th>Nama Jenis Surat</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($jenis as $key) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key['nama_jenis']; ?></td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="javascript:void(0);" class="ubah_data" data-id="<?= $key['id']; ?>" data-name="<?= $key['nama_jenis']; ?>"><i class="icon-pencil-alt"></i></a></li>
                                                <li class=" delete"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#hapus<?= $key['id'] ?>"><i class="icon-trash"></i></a></li>
                                                <?php foreach ($jenis as $key) : ?>
                                                    <div class="modal fade" id="hapus<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusTitle">Delete Data</h5>
                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="d-flex mt-3">
                                                                        <div class="flex-grow-1 ms-2">
                                                                            <p>Apakah anda yakin untuk menghapus pengajuan ini?.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                                    <a class="btn btn-primary" href="<?= base_url('admin/jenis/delete/') . $key['id'] ?>">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Complex headers (rowspan and colspan) Ends-->