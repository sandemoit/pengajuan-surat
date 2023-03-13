<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 project-list">
            <div class="card">
                <div class="row">
                    <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="<?= site_url('admin/manauser/tambah') ?>"> <i data-feather="plus-square"> </i>Tambah User</a>
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Date Created</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($manauser as $key) : ?>
                                    <?php if ($key['role']) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $key['name']; ?></td>
                                            <td><?= $key['email']; ?></td>
                                            <td><?= $role[$key['role']]; ?></span></td>
                                            <td><?= date('d F Y', $key['date_created']); ?></td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="<?= site_url('admin/manauser/edit/' . $key['id']) ?>"><i class="icon-pencil-alt"></i></a></li>
                                                    <li class=" delete"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#hapus<?= $key['id'] ?>"><i class="icon-trash"></i></a></li>
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
                                                                    <a class="btn btn-primary" href="<?= base_url('admin/manauser/delete/') . $key['id'] ?>">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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