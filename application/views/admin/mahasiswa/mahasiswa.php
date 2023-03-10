<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 project-list">
            <div class="card">
                <div class="row">
                    <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="<?= site_url('admin/mahasiswa/tambah') ?>"> <i data-feather="plus-square"> </i>Mahasiswa</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 project-list">
            <div class="card">
                <div class="row">
                    <div class="form-group mb-0 me-0"></div><a class="btn btn-success" href="<?= site_url('admin/mahasiswa/import_excel') ?>"> <i data-feather="plus-square"> </i>Import Excel</a>
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
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>RT/RW</th>
                                <th>No WA</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($mahasiswa as $key) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key['nama']; ?></td>
                                        <td><?= $key['nim']; ?></td>
                                        <td><?= $key['tmpt_lhr']; ?></td>
                                        <td><?= $key['tgl_lhr']; ?></td>
                                        <td><?= $key['alamat']; ?></td>
                                        <td><?= $key['rt']; ?>/<?= $key['rw']; ?></td>
                                        <td><?= $key['nowa']; ?></td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="<?= site_url('admin/mahasiswa/edit/' . $key['nim']) ?>"><i class="icon-pencil-alt"></i></a></li>
                                                <li class=" delete"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#hapus<?= $key['nim'] ?>"><i class="icon-trash"></i></a></li>
                                                <div class="modal fade" id="hapus<?= $key['nim'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true">
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
                                                                <a class="btn btn-primary" href="<?= base_url('admin/mahasiswa/delete/') . $key['nim'] ?>">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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