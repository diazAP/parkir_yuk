<div class="modal fade" id="del<?= str_replace('/','',$menu . $id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apakah anda yakin ingin menghapus <?= $menu_text . ' ' . $name; ?>?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Hapus" untuk menghapus <?= $menu_text . ' ' . $name; ?>.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url($menu . '/delete/' . $id); ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>