<?php $this->load->view('adminweb/partials/header'); ?>

<main class="admin-landing container my-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold" style="color: #023c5e;" id="pageTitle"><?= html_escape($subtitle); ?></h2>
        <a class="btn btn-primary bg-gradient-info" href="<?= base_url('brosur/tambah_brosur'); ?>">
            <i class="bi bi-plus-circle me-2"></i>Tambah Data
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
            <?= html_escape($this->session->flashdata('success')); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= html_escape($this->session->flashdata('error')); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>

    <div class="card-vanilla p-4">
        <?php $this->load->view('adminweb/partials/table_search'); ?>
        <div class="table-responsive-custom">
            <table id="dataTable" class="table table-hover align-middle" style="width: 100%">
                <thead style="background-color: #fef8ef; color: #7a561f;">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Judul (EN)</th>
                        <th>Gambar</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $start_no ?? 1; ?>
                    <?php if (!empty($brosur)): ?>
                        <?php foreach ($brosur as $item): ?>
                            <tr>
                                <td class="text-center" data-label="No"><?= $no++; ?></td>
                                <td data-label="Judul"><?= html_escape($item->judul); ?></td>
                                <td class="trim-text" data-label="Deskripsi"><?= html_escape($item->deskripsi); ?></td>
                                <td data-label="Judul (EN)"><?= html_escape($item->judul_en); ?></td>
                                <td data-label="Gambar">
                                    <?php foreach (['img_1', 'img_2', 'img_3'] as $field): ?>
                                        <?php if (!empty($item->{$field})): ?>
                                            <a href="<?= base_url('uploads/brosur/' . rawurlencode($item->{$field})); ?>" target="_blank" class="d-inline-block me-1 mb-1">
                                                <img src="<?= base_url('uploads/brosur/' . rawurlencode($item->{$field})); ?>" alt="<?= html_escape($item->judul); ?>" class="img-thumbnail" style="width: 70px; height: 70px; object-fit: cover;">
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php if (empty($item->img_1) && empty($item->img_2) && empty($item->img_3)): ?>
                                        <span class="text-muted">Tidak ada gambar</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center" data-label="Aksi">
                                    <a href="<?= base_url('brosur/ubah_brosur/' . $item->id_brousur); ?>" class="btn btn-warning btn-sm text-white">
                                        <i class="bi bi-pencil-square me-1"></i>Ubah
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-brosur-<?= $item->id_brousur; ?>">
                                        <i class="bi bi-trash me-1"></i>Hapus
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="hapus-brosur-<?= $item->id_brousur; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title text-white">HAPUS BROSUR</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body text-center">Yakin ingin menghapus brosur <strong><?= html_escape($item->judul); ?></strong>?</div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url('brosur/hapus_brosur/' . $item->id_brousur); ?>" class="btn btn-danger">Ya, Hapus</a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">Belum ada data brosur.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('adminweb/partials/table_pagination', ['row_count' => count($brosur ?? [])]); ?>
    </div>
</main>

<script>
document.querySelectorAll('.trim-text').forEach(function (cell) {
    var text = cell.textContent.trim();
    if (text.length > 80) cell.textContent = text.substring(0, 80) + '...';
});
</script>

<?php $this->load->view('adminweb/partials/footer'); ?>
