<?php $this->load->view('adminweb/partials/header'); ?>

<main class="admin-landing container my-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold" style="color: #023c5e;" id="pageTitle"><?= html_escape($subtitle); ?></h2>
        <a class="btn btn-primary bg-gradient-info" href="<?= base_url($brosur ? 'brosur/ubah_brosur' : 'brosur/tambah_brosur'); ?>">
            <i class="bi <?= $brosur ? 'bi-pencil-square' : 'bi-plus-circle'; ?> me-2"></i><?= $brosur ? 'Ubah Brosur' : 'Tambah Brosur'; ?>
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
        <div class="table-responsive-custom">
            <table class="table table-hover align-middle" style="width: 100%">
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
                    <?php if ($brosur): ?>
                            <tr>
                                <td class="text-center" data-label="No">1</td>
                                <td data-label="Judul"><?= html_escape($brosur->judul); ?></td>
                                <td class="trim-text" data-label="Deskripsi"><?= html_escape($brosur->deskripsi); ?></td>
                                <td data-label="Judul (EN)"><?= html_escape($brosur->judul_en); ?></td>
                                <td data-label="Gambar">
                                    <?php foreach (['img_1', 'img_2', 'img_3'] as $field): ?>
                                        <?php if (!empty($brosur->{$field})): ?>
                                            <a href="<?= base_url('uploads/brosur/' . rawurlencode($brosur->{$field})); ?>" target="_blank" class="d-inline-block me-1 mb-1">
                                                <img src="<?= base_url('uploads/brosur/' . rawurlencode($brosur->{$field})); ?>" alt="<?= html_escape($brosur->judul); ?>" class="img-thumbnail" style="width: 70px; height: 70px; object-fit: cover;" loading="lazy" decoding="async">
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php if (empty($brosur->img_1) && empty($brosur->img_2) && empty($brosur->img_3)): ?>
                                        <span class="text-muted">Tidak ada gambar</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center" data-label="Aksi">
                                    <a href="<?= base_url('brosur/ubah_brosur'); ?>" class="btn btn-warning btn-sm text-white">
                                        <i class="bi bi-pencil-square me-1"></i>Ubah
                                    </a>
                                </td>
                            </tr>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">Belum ada data brosur.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
document.querySelectorAll('.trim-text').forEach(function (cell) {
    var text = cell.textContent.trim();
    if (text.length > 80) cell.textContent = text.substring(0, 80) + '...';
});
</script>

<?php $this->load->view('adminweb/partials/footer'); ?>
