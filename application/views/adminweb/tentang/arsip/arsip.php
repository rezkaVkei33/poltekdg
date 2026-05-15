<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">DATA ARSIP</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Kelola, tambah, edit, dan hapus data dengan mudah</p>
        </div>
        <div>
            <a class="btn btn-primary bg-gradient-info" href="<?= base_url('arsip/tambah_arsip'); ?>">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
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

    <div class="card-vanilla p-4">
        <div class="table-responsive-custom">
            <table id="dataTable" class="table table-hover align-middle" style="width:100%">
                <thead style="background-color: #fef8ef; color: #7a561f;">
                    <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Keterangan</th>
                        <th>File</th>
                        <th>Tanggal Update</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                 <tbody>
                <?php $no=1; ?>
                <?php if(!empty($arsip)) : ?>
                    <?php foreach($arsip as $data): ?>
                        <tr>
                        <td class="text-center" data-label="No"><?= $no++; ?></td>
                        <td data-label="Nama Dokumen"><?= $data->nama_dokumen; ?></td>
                        <td class="trim-text" data-label="Keterangan"><?= $data->keterangan; ?></td>
                        <td data-label="File">
                          <?php if (!empty($data->file_upload)): ?>
                            <a href="<?= base_url('uploads/arsip/' . $data->file_upload); ?>" class="btn btn-info" target="_blank">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Lihat
                            </a>
                            <br>
                            <a href="<?= base_url('uploads/arsip/' . $data->file_upload); ?>" download class="btn btn-success">
                                <i class="bi bi-download me-1"></i> Unduh
                            </a>
                        <?php else: ?>
                            <span class="text-danger">Tidak ada dokumen.</span>
                        <?php endif; ?>
                        </td>
                        <td data-label="Tanggal Update"><?= date('d-m-Y', strtotime($data->tanggal_upload)); ?></td>
                        <td class="text-center" data-label="Aksi">
                            <a href="<?= base_url('arsip/ubah_arsip/' . $data->id_arsip); ?>" class="btn btn-warning btn-sm"> 
                            <i class="bi bi-pencil-square me-1"></i>
                            Ubah
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus_arsip-<?= $data->id_arsip; ?>"> 
                            <i class="bi bi-trash me-1"></i>
                            Hapus
                            </button>

                          <!-- Modal Hapus Sambutan -->
                        <div class="modal fade" id="hapus_arsip-<?= $data->id_arsip; ?>" tabindex="-1" aria-labelledby="modalLabel>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title text-white" id="modalLabel">HAPUS ARSIP</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                  </div>
                                  <div class="modal-body text-center">
                                    <p>Apakah Anda yakin ingin <br>
                                    menghapus File Arsip dari <strong><?= $data->nama_dokumen; ?></strong>?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="<?= base_url('arsip/hapus_arsip/' . $data->id_arsip); ?>" class="btn btn-danger">Ya, Hapus</a> 
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <!-- End Modal Hapus Arsip -->
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger ">Tidak ada data Arsip.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

    <script>
        document.querySelectorAll('.trim-text').forEach(cell => {
          const maxLength = 20; // Panjang maksimal teks
          const text = cell.textContent;
          if (text.length > maxLength) {
            cell.textContent = text.substring(0, maxLength) + '...';
          }
        });
      </script>

    <script>
      // Inisialisasi semua modal
      var myModal = document.querySelectorAll('.modal');
      myModal.forEach(function(modal) {
        new bootstrap.Modal(modal);
      });
    </script>

<?php $this->load->view('adminweb/partials/footer'); ?>
