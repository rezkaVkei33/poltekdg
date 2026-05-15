<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #023c5e;" id="pageTitle">DATA SEJARAH</h2>
        </div>
        <div>
            <a class="btn btn-primary bg-gradient-info" href="<?= base_url('sejarah/tambah_sejarah'); ?>">
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
                      <th>Teks Sejarah</th>
                      <th>Nama penulis</th>
                      <th>Gambar</th>
                      <th>Tanggal Update</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php if(!empty($sejarah)) : ?>
                    <?php foreach($sejarah as $data): ?>
                        <tr>
                        <td class="text-center" data-label="No"><?= $no++; ?></td>
                        <td class="trim-text" data-label="Teks Sejarah"><?= $data->teks_sejarah; ?></td>
                        <td data-label="Nama penulis"><?= $data->nama_penulis; ?></td>
                        <td data-label="Gambar">
                            <?php if(!empty($data->gambar)): ?>
                            <img src="<?= base_url('uploads/sejarah/'.$data->gambar); ?>" alt="Gambar Sejarah" class="img-fluid" style="max-width: 100px;">
                            <?php else: ?>
                            Tidak ada gambar
                            <?php endif; ?>
                        </td>
                        <td data-label="Tanggal Update"><?= date('d-m-Y', strtotime($data->tanggal_update)); ?></td>
                        <td class="text-center" data-label="Aksi">
                            <a href=" <?= base_url('sejarah/ubah_sejarah/' . $data->id_sejarah); ?>" class="btn btn-warning btn-sm text-white">
                            <i class="bi bi-pencil-square me-1"></i>
                            Ubah
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusSejarah-<?= $data->id_sejarah; ?>">
                            <i class="bi bi-trash me-1"></i>
                            Hapus
                            </button>
                          <!-- Modal Hapus Sambutan -->
                        <!-- Modal konfirmasi -->
                        <div class="modal fade" id="hapusSejarah-<?= $data->id_sejarah; ?>"> tabindex="-1" aria-labelledby="modalLabel>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title text-white" id="modalLabel">HAPUS SEJARAH</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                  </div>
                                  <div class="modal-body text-center">
                                    <p>Apakah Anda yakin ingin <br>
                                    menghapus Sejarah dari <strong><?= $data->nama_penulis; ?></strong>?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="<?= base_url('sejarah/hapus_sejarah/' . $data->id_sejarah); ?>" class="btn btn-danger">Ya, Hapus</a> 
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <!-- End Modal Hapus Sambutan -->
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger ">Tidak ada data sejarah.</td>
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
