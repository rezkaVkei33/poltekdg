<script>
document.addEventListener('DOMContentLoaded', function () {
    var modalElement = document.getElementById('dataModal');
    var dataModal = new bootstrap.Modal(modalElement);
    var isSubmitting = false;

    document.getElementById('dataForm').addEventListener('submit', function () {
        isSubmitting = true;
    });

    modalElement.addEventListener('hidden.bs.modal', function () {
        if (!isSubmitting) window.location.href = modalElement.dataset.returnUrl;
    });

    dataModal.show();
});
</script>
