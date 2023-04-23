<section class="page-section">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Tracking Surat Online</h2>
			<h3 class="section-subheading text-muted">Surat <b>Ditemukan</b>, Detail Dibawah:</h3>
		</div>
		<div class="text-justify pl-5 pr-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="col-lg-7">
							<h3>Keterangan:</h3>
							<table class="table">
								<tr>
									<td>Nomor Surat</td>
									<td>:</td>
									<td><?= $row['nosurat'] ?></td>
								</tr>
								<tr>
									<td>Nama Pengaju</td>
									<td>:</td>
									<td><?= $row['nama'] ?></td>
								</tr>
								<tr>
									<td>Hal</td>
									<td>:</td>
									<td><?= $row['hal'] ?></td>
								</tr>
								<tr>
									<td>No Hp/WA</td>
									<td>:</td>
									<td><?= $row['nowa'] ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>:</td>
									<td><?= $options[$row['jenis_surat']] ?></td>
								</tr>
								<tr>
									<td>File Lampiran</td>
									<td>:</td>
									<td>
										<button class="btn btn-outline-info" data-toggle="modal" data-target="#lihatFile<?= $row['nosurat']; ?>"><i class="fa fa-eye"></i></button>
									</td>
								</tr>
								<tr>
									<td>File Jawaban</td>
									<td>:</td>
									<td>
										<button class="btn btn-outline-info" data-toggle="modal" data-target="#lihatFile<?= $row['nosurat']; ?>"><i class="fa fa-eye"></i></button>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div>
						<div class="checkout-wrap">
							<ul class="checkout-bar">
								<?php if ($row['status'] == '1') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li>Dokumen<br>Diterima</li>
									<li>Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li>Sudah Diketik dan<br>Diparaf</li>
									<li>Sudah Ditandatangani<br>Lurah</li>
									<li>Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '2') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li>Dokumen<br>Ditolak</li>
									<h1>MAAF PENGAJUAN ANDA DITOLAK KARENA SYARAT TIDAK TERPENUHI</h1>
								<?php elseif ($row['status'] == '3') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li>Sudah Diketik dan<br>Diparaf</li>
									<li>Sudah Ditandatangani<br>Lurah</li>
									<li>Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '4') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="active">Sudah Diketik dan<br>Diparaf</li>
									<li>Sudah Ditandatangani<br>Lurah</li>
									<li>Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '5') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="active">Sudah Diketik dan<br>Diparaf</li>
									<li class="active">Sudah Ditandatangani<br>Lurah</li>
									<li class="active">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="page-section">
</section>

<!-- Modal berkas user -->
<div class="modal fade" id="lihatFile<?= $row['nosurat']; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="fileLampiran">File ID: <?= $row['nosurat'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('uploads/berkas') ?>/<?= $row['file'] ?>"></embed>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal berkas jawaban -->
<div class="modal fade" id="lihatFile<?= $row['nosurat']; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="fileLampiran">File ID: <?= $row['nosurat'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('uploads/jawaban') ?>/<?= $row['file'] ?>"></embed>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>