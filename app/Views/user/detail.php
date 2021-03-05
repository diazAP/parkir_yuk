<div class="card mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h2 class="text-dark"> Detail Pengguna</h2>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-4" style="margin:auto;text-align:center;">
                        <div class="row justify-content-center">
                            <img id="previewImg" src="<?= $user->photo ?? base_url('assets/img/default.png') ?>" alt="Profile Photo" style="max-height:200px;max-width:100%;" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="font-weight-bold text-dark">Nama</label>
                        <p class="text-dark"><?= $user->name ?? '-'; ?></p>
                        <label class="font-weight-bold text-dark">Email</label>
                        <p class="text-dark"><?= $user->email ?? '-'; ?></p>
                        <label class="font-weight-bold text-dark">Total Parkir</label>
                        <p class="text-dark"><?= $user->total_parking ?? '-'; ?></p>
                        <label class="font-weight-bold text-dark">Total Biaya Parkir</label>
                        <p class="text-dark"><?= $user->total_cost ?? '-'; ?></p>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="font-weight-bold text-dark">Role</label>
                        <p class="text-dark"><?= ucfirst($user->role) ?? '-'; ?></p>
                        <label class="font-weight-bold text-dark">Tanggal Dibuat</label>
                        <p class="text-dark"><?= datetime_conversion($user->date_created) ?? '-'; ?></p>
                        <label class="font-weight-bold text-dark">Tanggal Diedit</label>
                        <p class="text-dark"><?= datetime_conversion($user->date_edited) ?? '-'; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col text-center">
                        <a type="button" class="btn btn-secondary" href='<?= base_url('user') ?>'>Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>