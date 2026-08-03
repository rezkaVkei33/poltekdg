<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<title><?= isset($title) ? $title : 'POLITEKNIK DARMA GANESHA' ?></title>
<body>
<?php $this->load->view('partials/kontak') ?>
<?php $this->load->view('partials/navbar'); ?>

<!-- Main Content -->
        <main class="mobile-content">
            <!-- Sambutan Section -->

    <section class="sambutan-section py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
        <div class="col-md-10 text-center"> <div class="text-center mb-12">
              <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Arsip Dokumen
              </h2>
              <div class="flex justify-center mb-6">
                  <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
              </div>
            <p> <strong>Sifat :</strong><i>Public</i></p>
        </div>
        </div>

        <?php if (!empty($data_arsip)): ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Dokumen</th>
                <th>Keterangan</th>
                <th>Tanggal Upload</th>
            </tr>
            </thead>
            <tbody>
            <?php $no = 1; foreach ($data_arsip as $arsip): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                <a href="<?= base_url('uploads/arsip/' . $arsip->file_upload) ?>" 
                    target="_blank" 
                    class="btn btn-link text-decoration-none">
                    <?= htmlspecialchars($arsip->nama_dokumen) ?>
                </a>
                </td>
                <td><?= nl2br(htmlspecialchars($arsip->keterangan)) ?></td>
                <td><?= date('d-m-Y', strtotime($arsip->tanggal_upload)) ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php else: ?>
        <div class="alert alert-info text-center">Belum ada arsip dokumen.</div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="<?= base_url('base') ?>" class="btn" style="background: linear-gradient(90deg, #007BFF 0%, #00BFFF 100%); color: #fff; border: 0; padding: .5rem 1rem; border-radius: .375rem; box-shadow: 0 6px 18px rgba(0, 123, 255, 0.25); text-decoration: none; display: inline-block;"
            onmouseover="this.style.boxShadow='0 10px 26px rgba(0, 123, 255, 0.35)'; this.style.transform='translateY(-2px)';"
            onmouseout="this.style.boxShadow='0 6px 18px rgba(0, 123, 255, 0.25)'; this.style.transform='translateY(0)';"
            aria-label="Kembali ke Beranda">
            &#8592;<?= lang('back_home'); ?>
            </a>
        </div>
    </div>
    </section>
</main>

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/scripts'); ?>

</body>
</html>

