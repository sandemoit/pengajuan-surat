<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
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
                                            <td class="action"> <a class="pdf" href="<?= $key['file']; ?>"><i class="icofont icofont-file-pdf"></i></a></td>
                                            <td class="text-center"> <?= $status[$key['status']]; ?></td>
                                            <td><a href="https://wa.me/62<?= $key['nowa']; ?>">0<?= $key['nowa']; ?></a></td>
                                            <td><?= $key['tanggal']; ?></td>
                                            <td><?= $options[$key['jenis_surat']]; ?></td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="#"><i class="icon-pencil-alt" data-bs-toggle="modal" data-bs-target=".status"></i></a></li>
                                                    <div class="modal fade status" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">Update Status Pengajuan ID: SKT-9835650023?</h4>
                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body dark-modal">
                                                                    <div class="large-modal-header"><i data-feather="chevrons-right"></i>
                                                                        <h6>Pilih Status</h6>
                                                                    </div>
                                                                    <p class="modal-padding-space mb-0">No matter how talented you are as a content writer or creator, you will always fail if you don't have a clear set of goals.</p>
                                                                    <p class="modal-padding-space mb-0">First of all, without goals, there is no way to determine your success. Additionally, you lack direction.</p>
                                                                    <p class="modal-padding-space mb-0">Together with your team, respond to the following questions to make sure they are:</p>
                                                                    <div class="large-modal-body"><i data-feather="corner-up-right"></i>
                                                                        <p class="ps-1">What must you achieve, and by when?</p>
                                                                    </div>
                                                                    <div class="large-modal-body"><i data-feather="corner-up-right"></i>
                                                                        <p class="ps-1">How will you evaluate your level of success?</p>
                                                                    </div>
                                                                    <div class="large-modal-body"><i data-feather="corner-up-right"></i>
                                                                        <p class="ps-1">Can you accomplish it with the available resources?</p>
                                                                    </div>
                                                                    <div class="large-modal-body"><i data-feather="corner-up-right"></i>
                                                                        <p class="ps-1">Does it advance your core business aims? </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
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