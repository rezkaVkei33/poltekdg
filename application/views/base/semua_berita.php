<!DOCTYPE html>
<html lang="<?= is_english() ? 'en' : 'id'; ?>">
<head>
    <title><?= html_escape($title); ?></title>
    <?php $this->load->view('partials/header'); ?>
</head>
<body class="bg-gray-50">
<?php $this->load->view('partials/kontak'); ?>
<?php $this->load->view('partials/navbar'); ?>
<main class="mobile-content py-12 sm:py-16">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4"><?= lang('all_news'); ?></h1>
            <div class="flex justify-center"><div class="w-16 h-1 rounded-full bg-amber-500"></div></div>
        </div>

        <?php if (!empty($data_berita)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($data_berita as $news): ?>
                    <?php
                    $judul_berita = trans($news, 'judul');
                    $isi_berita = trans($news, 'isi');
                    $tanggal_berita = !empty($news->tanggal_terbit) ? $news->tanggal_terbit : $news->tanggal_update;
                    $berita_unggulan = in_array((int) $news->id_berita, [6, 7, 8], TRUE);
                    ?>
                    <a href="<?= site_url('base/berita/' . berita_token($news->id_berita)); ?>" class="block bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 card-hover focus:outline-none focus:ring-2 focus:ring-amber-500" aria-label="<?= html_escape($judul_berita); ?>">
                        <div class="relative h-48 overflow-hidden bg-gradient-to-br from-amber-100 to-orange-200">
                            <?php if (!empty($news->gambar)): ?>
                                <img src="<?= base_url('uploads/berita/' . rawurlencode($news->gambar)); ?>" alt="<?= html_escape($judul_berita); ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" decoding="async">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-amber-700"><i class="fas fa-newspaper text-5xl" aria-hidden="true"></i></div>
                            <?php endif; ?>
                            <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1 rounded-full text-sm font-semibold"><?= date('d M', strtotime($tanggal_berita)); ?></div>
                            <?php if ($berita_unggulan): ?>
                                <div class="absolute top-4 left-4 bg-gray-900/80 text-white px-3 py-1 rounded-full text-xs font-semibold"><?= lang('featured_news'); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2"><?= html_escape($judul_berita); ?></h2>
                            <p class="text-gray-600 mb-4 line-clamp-3"><?= html_escape(word_limiter(strip_tags($isi_berita), 24)); ?></p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500"><?= date('d F Y', strtotime($tanggal_berita)); ?></span>
                                <span class="text-amber-600 font-semibold"><?= lang('read_more'); ?> →</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 text-lg py-12"><?= lang('no_news'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/scripts'); ?>
</body>
</html>
