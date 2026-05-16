<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
    <div class="text-secondary small">
        Total data: <strong><?= (int) ($total_rows ?? 0); ?></strong>
    </div>
    <form class="d-flex flex-wrap gap-2" method="get" action="<?= current_url(); ?>">
        <div class="input-group">
            <button class="btn btn-outline-secondary bg-white" type="submit" aria-label="Cari">
                <i class="bi bi-search"></i>
            </button>
            <input type="text" class="form-control" name="q" value="<?= html_escape($keyword ?? ''); ?>" placeholder="Cari data...">
        </div>
        <?php if (!empty($keyword)): ?>
            <a href="<?= current_url(); ?>" class="btn btn-outline-secondary">Reset</a>
        <?php endif; ?>
    </form>
</div>
