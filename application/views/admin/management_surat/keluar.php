<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 project-list">
            <div class="card">
                <div class="row">
                    <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="<?= site_url('admin/surat_keluar/tambah') ?>"> <i data-feather="plus-square"> </i>Surat Keluar</a>
                </div>
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
                                <th>Nama Surat</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($keluar as $key) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key['nama_surat_keluar']; ?></td>
                                        <td><?= $key['tanggal_surat_keluar']; ?></td>
                                        <td><?= $key['keterangan_surat_keluar']; ?></td>
                                        <td class="action"> <a class="pdf" href="<?= base_url('assets/uploads/surat_keluar/') . $key['file_surat_keluar']; ?>"><i class="icofont icofont-file-pdf"></i></a></td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="<?= site_url('admin/surat_keluar/edit/' . $key['id_surat_keluar']) ?>"><i class="icon-pencil-alt"></i></a></li>
                                                <li class=" delete"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#hapus<?= $key['id_surat_keluar'] ?>"><i class="icon-trash"></i></a></li>
                                                <?php foreach ($keluar as $key) : ?>
                                                    <div class="modal fade" id="hapus<?= $key['id_surat_keluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true">
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
                                                                    <a class="btn btn-primary" href="<?= base_url('admin/surat_keluar/delete/') . $key['id_surat_keluar'] ?>">Delete</a>
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