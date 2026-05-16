<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #023c5e;" id="pageTitle"><?= $subtitle ?></h2>
        </div>
        <div>
            <a class="btn btn-primary bg-gradient-info" href="<?= base_url('sambutan/tambah_sambutan'); ?>">
        <i class="bi bi-plus-circle me-2"></i>
        Tambah Data
      </a>
        </div>
    </div>

    <!-- Message -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Table Card -->
    <div class="card-vanilla p-4">
        <div class="table-responsive-custom">
            <table id="dataTable" class="table table-hover align-middle" style="width:100%">
                  <thead style="background-color: #fef8ef; color: #7a561f;">
                    <tr>
                      <th>No</th>
                      <th>Teks Sambutan</th>
                      <th>Tempat</th>
                      <th>Tanda Tangan</th>
                      <th>Gambar</th>
                      <th>Tanggal Update</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php if (!empty($sambutan)) : ?>
                    <?php foreach ($sambutan as $data) : ?>
                  <tr>
                        <td class="text-center" data-label="No"><?= $no++; ?></td>
                        <td class="trim-text" data-label="Teks Sambutan"><?= $data->teks_sambutan; ?></td>
                        <td data-label="Tempat"><?= $data->tempat; ?></td>
                        <td data-label="Tanda Tangan"><?= $data->tanda_tangan; ?></td>
                        <td data-label="Gambar">
                          <?php if ($data->gambar): ?>
                          <img src="<?= base_url('uploads/sambutan/' . $data->gambar) ?>" width="100">
                          <?php else: ?>
                            <small>Tidak ada gambar.</small>
                          <?php endif; ?>
                        </td>
                        <td data-label="Tanggal Update">
                          <?php
                            $tanggal = new DateTime($data->tanggal_update);
                            echo $tanggal->format('d F Y');
                          ?>
                        </td>
                        <td data-label="Aksi"> 
                          <a href="<?= base_url('sambutan/ubah_sambutan/' . $data->id_sambutan); ?>" class="btn btn-warning btn-sm text-white">
                            <i class="bi bi-pencil-square me-1"></i>
                            Ubah
                          </a>
                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $data->id_sambutan ?>">
                            <i class="bi bi-trash me-1"></i>
                            Hapus
                          </button>
                          <!-- Modal Hapus Sambutan -->
                            <!-- Modal konfirmasi -->
                            <div class="modal fade" id="hapusModal<?= $data->id_sambutan ?>" tabindex="-1" aria-labelledby="modalLabel<?= $data->id_sambutan ?>" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title text-white" id="modalLabel<?= $data->id_sambutan ?>">HAPUS SAMBUTAN</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                  </div>
                                  <div class="modal-body text-center">
                                    <p>Apakah Anda yakin ingin <br>
                                    Menghapus Sambutan dari <strong><?= $data->tanda_tangan ?></strong>?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="<?= base_url('sambutan/hapus_sambutan/' . $data->id_sambutan) ?>" class="btn btn-danger">Ya, Hapus</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <!-- End Modal Hapus Sambutan -->
                        </td>
                        <?php endforeach; ?>
                        <?php else : ?>
                          <tr>
                            <td colspan="7" class="text-center text-danger ">Tidak ada data sambutan.</td>
                          </tr>
                        </tr>
                        <?php endif; ?>
                </tbody>
              </table>
        </div>
    </div>
</main>

<script>
  document.querySelectorAll('.trim-text').forEach(cell => {
    const maxLength = 20;
    const text = cell.textContent.trim();
    if (text.length > maxLength) {
      cell.textContent = text.substring(0, maxLength) + '...';
    }
  });
</script>

<script>
  document.querySelectorAll('.modal').forEach(function(modal) {
    new bootstrap.Modal(modal);
  });
</script>

<?php $this->load->view('adminweb/partials/footer'); ?>
