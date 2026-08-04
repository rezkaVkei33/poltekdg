<!DOCTYPE html>
<html lang="<?= is_english() ? 'en' : 'id'; ?>">
<head>
    <title><?= html_escape($title); ?></title>
    <?php $this->load->view('partials/header'); ?>
</head>
<body class="bg-gray-50">
<?php $this->load->view('partials/kontak'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php
$judul_berita = trans($berita, 'judul');
$isi_berita = trans($berita, 'isi');
$tanggal_berita = !empty($berita->tanggal_terbit) ? $berita->tanggal_terbit : $berita->tanggal_update;
?>
<main class="mobile-content py-12 sm:py-16">
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="<?= site_url('base'); ?>#berita" class="inline-flex items-center text-amber-700 hover:text-amber-800 font-semibold mb-6">← <?= is_english() ? 'Back to home' : 'Kembali ke beranda'; ?></a>
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
            <?php if (!empty($berita->gambar)): ?>
                <img src="<?= base_url('uploads/berita/' . rawurlencode($berita->gambar)); ?>" alt="<?= html_escape($judul_berita); ?>" class="w-full max-h-[32rem] object-cover" loading="lazy" decoding="async">
            <?php endif; ?>
            <div class="p-6 sm:p-10">
                <p class="text-sm text-amber-700 font-semibold mb-3"><?= date('d F Y', strtotime($tanggal_berita)); ?><?php if (!empty($berita->penulis)): ?> · <?= html_escape($berita->penulis); ?><?php endif; ?></p>
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 leading-tight mb-7"><?= html_escape($judul_berita); ?></h1>
                <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-line"><?= nl2br(html_escape($isi_berita)); ?></div>
            </div>
        </div>
    </article>
</main>
<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/scripts'); ?>
</body>
</html>
