<?php $this->load->view('adminweb/partials/header'); ?>

<main class="admin-landing container my-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;">UBAH BROSUR</h2>
            <p class="text-muted" style="color: #b68b40 !important;">Perbarui data brosur sesuai kebutuhan.</p>
        </div>
        <button type="button" class="btn btn-poltek" data-bs-toggle="modal" data-bs-target="#dataModal"><i class="bi bi-pencil-square me-2"></i>Buka Form</button>
    </div>
</main>

<div class="modal fade" id="dataModal" tabindex="-1" data-bs-backdrop="static" data-return-url="<?= base_url('brosur'); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="color: #7a561f;">UBAH BROSUR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body p-4">
                <form id="dataForm" method="post" action="<?= base_url('brosur/update/' . $brosur->id_brousur); ?>" enctype="multipart/form-data">
                    <?php $this->load->view('adminweb/tentang/brosur/_form', ['brosur' => $brosur]); ?>
                </form>
            </div>
            <div class="modal-footer border-0 pt-0 pb-4">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-primary" form="dataForm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('adminweb/tentang/brosur/_modal_script'); ?>
<?php $this->load->view('adminweb/partials/footer'); ?>
