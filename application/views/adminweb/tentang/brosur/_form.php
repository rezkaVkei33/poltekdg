<?php $is_edit = isset($brosur); ?>

<div class="mb-3">
    <label for="judul" class="form-label fw-semibold">Judul</label>
    <input id="judul" type="text" class="form-control" name="judul" value="<?= $is_edit ? html_escape($brosur->judul) : ''; ?>">
</div>
<div class="mb-3">
    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
    <textarea id="deskripsi" class="form-control" name="deskripsi" rows="4"><?= $is_edit ? html_escape($brosur->deskripsi) : ''; ?></textarea>
</div>
<div class="mb-3">
    <label for="judul_en" class="form-label fw-semibold">Judul (Bahasa Inggris)</label>
    <input id="judul_en" type="text" class="form-control" name="judul_en" value="<?= $is_edit ? html_escape($brosur->judul_en) : ''; ?>">
</div>
<div class="mb-3">
    <label for="deskripsi_en" class="form-label fw-semibold">Deskripsi (Bahasa Inggris)</label>
    <textarea id="deskripsi_en" class="form-control" name="deskripsi_en" rows="4"><?= $is_edit ? html_escape($brosur->deskripsi_en) : ''; ?></textarea>
</div>

<div class="row">
    <?php foreach (['img_1' => 'Gambar 1', 'img_2' => 'Gambar 2', 'img_3' => 'Gambar 3'] as $field => $label): ?>
        <div class="col-md-4 mb-3">
            <label for="<?= $field; ?>" class="form-label fw-semibold"><?= $label; ?></label>
            <input id="<?= $field; ?>" type="file" name="<?= $field; ?>" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
            <small class="form-text text-muted">JPG, JPEG, PNG, atau WEBP. Maks. 3 MB.</small>
            <?php if ($is_edit && !empty($brosur->{$field})): ?>
                <a href="<?= base_url('uploads/brosur/' . rawurlencode($brosur->{$field})); ?>" target="_blank" class="d-block mt-2">
                    <img src="<?= base_url('uploads/brosur/' . rawurlencode($brosur->{$field})); ?>" alt="<?= html_escape($label); ?>" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                </a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
