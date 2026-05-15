<style>
    .footer-auto-hide.admin-footer-gradient {
        background: linear-gradient(135deg, #5a3418 0%, #2b160b 52%, #050505 100%) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.14) !important;
        color: #f8eadb !important;
        box-shadow: 0 -10px 28px rgba(0, 0, 0, 0.18);
    }

    .admin-footer-gradient strong,
    .admin-footer-gradient i {
        color: #ffd9a0;
    }
</style>

<!-- Footer auto-hide -->
<footer id="autoHideFooter" class="footer-auto-hide admin-footer-gradient">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-2 mb-md-0">
                <span>© 2025 <strong>Rezka Apriyandi</strong> | Politeknik Darma Ganesha</span>
            </div>
            <div class="col-md-6 text-md-end">
                <span><i class="bi bi-envelope"></i> darmaganeshapoliteknik@gmail.com | <i class="bi bi-telephone"></i> (0411) 123456</span>
            </div>
        </div>
    </div>
</footer>

<?php $this->load->view('adminweb/partials/scripts'); ?>
</body>
</html>
