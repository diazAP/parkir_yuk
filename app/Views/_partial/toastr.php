<script>
    var success = '<?= $_SESSION['success'] ?? '' ?>';
    var error = '<?= $_SESSION['error'] ?? '' ?>';
    var warning = '<?= $_SESSION['warning'] ?? '' ?>';
    if (success) {
        toastr.success(success, 'Sukses');
    }
    if (error) {
        toastr.error(error, 'Eror');
    }
    if (warning) {
        toastr.warning(warning, 'Peringatan');
    }
</script>