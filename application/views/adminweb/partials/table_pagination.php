<?php
$total_rows = (int) ($total_rows ?? 0);
$start_no = (int) ($start_no ?? 1);
$row_count = (int) ($row_count ?? 0);
$end_no = $row_count > 0 ? $start_no + $row_count - 1 : 0;
?>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-3">
    <div class="text-secondary small">
        <?php if ($total_rows > 0): ?>
            Menampilkan <?= $start_no; ?>-<?= $end_no; ?> dari <?= $total_rows; ?> data
        <?php else: ?>
            Tidak ada data yang ditampilkan
        <?php endif; ?>
    </div>
    <div>
        <?= $pagination_links ?? ''; ?>
    </div>
</div>
