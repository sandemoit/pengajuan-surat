<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display dataTable no-footer" id="basic-6">
                            <thead>
                                <th>No</th>
                                <th>ID Pengajuan</th>
                                <th>Nama Pengaju (NIM)</th>
                                <th>File</th>
                                <th>Status Pengajuan</th>
                                <th>No HP</th>
                                <th>Tanggal</th>
                                <th>Jenis Surat</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pengaju as $key) : ?>
                                    <?php if ($key['status'] !== '5') : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $key['id']; ?></td>
                                            <td><?= $key['nama'] . ' (' . $key['NIM'] . ')'; ?></td>
                                            <td class="action"> <a class="pdf" href="<?= base_url('assets/uploads/berkas/') . $key['file']; ?>"><i class="icofont icofont-file-pdf"></i></a></td>
                                            <td class="text-center"> <?= $status[$key['status']]; ?></td>
                                            <td><a target="_blank" href="https://wa.me/62<?= $key['nowa']; ?>">0<?= $key['nowa']; ?></a></td>
                                            <td><?= $key['tanggal']; ?></td>
                                            <td><?= $options[$key['jenis_surat']]; ?></td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="javascript:;"><i class="icon-pencil-alt" data-bs-toggle="modal" data-bs-target=".status<?= $key['id']; ?>"></i></a></li>
                                                    <?php foreach ($pengaju as $key) : ?>
                                                        <div class="modal fade status<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myLargeModalLabel">Update Status Pengajuan ID: <?= $key['id']; ?></h4>
                                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?= base_url('admin/pengajuan/updateStatus/') . $key['id']; ?>" method="POST">
                                                                        <div class="modal-body dark-modal">
                                                                            <div class="text-center large-modal-header">
                                                                                <h6>Pilih Status</h6>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="mb-3 m-t-15 custom-radio-ml">
                                                                                        <div class="form-check radio radio-primary">
                                                                                            <input class="form-check-input" type="radio" id="radio11" name="status" value="1">
                                                                                            <label class="form-check-label" for="radio11">Pending</label>
                                                                                        </div>
                                                                                        <div class="form-check radio radio-primary">
                                                                                            <input class="form-check-input" id="radio22" type="radio" name="status" value="2">
                                                                                            <label class="form-check-label" for="radio22">Syarat Tidak Terpenuhi</label>
                                                                                        </div>
                                                                                        <div class="form-check radio radio-primary">
                                                                                            <input class="form-check-input" id="radio33" type="radio" name="status" value="3">
                                                                                            <label class="form-check-label" for="radio33">Diterima dan Dilanjutkan</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="mb-3 m-t-15 custom-radio-ml">
                                                                                        <div class="form-check radio radio-primary">
                                                                                            <input class="form-check-input" id="radio44" type="radio" name="status" value="4">
                                                                                            <label class="form-check-label" for="radio44">Sudah Diketik dan Diparaf</label>
                                                                                        </div>
                                                                                        <div class="form-check radio radio-primary">
                                                                                            <input class="form-check-input" id="radio55" type="radio" name="status" value="5">
                                                                                            <label class="form-check-label" for="radio55">Ditandatangani Lurah/<b>Selesai</b></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                                                <button class="btn btn-success" type="submit">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <li class="delete"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#hapus<?= $key['id'] ?>"><i class="icon-trash"></i></a></li>
                                                    <?php foreach ($pengaju as $key) : ?>
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
                                                                        <a class="btn btn-primary" href="<?= base_url('admin/pengajuan/delete/') . $key['id'] ?>">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Complex headers (rowspan and colspan) Ends-->