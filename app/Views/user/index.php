<form action="<?= base_url('user') ?>" method="GET" accept-charset="utf-8">
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="text-dark"> Pengguna </h2>
            <span class="badge badge-primary">Total : <?= $total ?></span>
            <div class="mt-2 row align-items-center">
                <div class="col-12 col-lg-3 mt-2">
                    <label for="per_page" class="text-dark">Per Halaman</label>
                    <select name="per_page" id="per_page" class="form-control custom-select d-block" title="Per Halaman">
                        <option value="10" <?= !empty($_GET['per_page']) && $_GET['per_page'] == 10 ? 'selected' : '' ?>>10</option>
                        <option value="25" <?= !empty($_GET['per_page']) && $_GET['per_page'] == 25 ? 'selected' : '' ?>>25</option>
                        <option value="50" <?= !empty($_GET['per_page']) && $_GET['per_page'] == 50 ? 'selected' : '' ?>>50</option>
                        <option value="100" <?= !empty($_GET['per_page']) && $_GET['per_page'] == 100 ? 'selected' : '' ?>>100</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3 mt-2">
                    <label for="role" class="text-dark">Role</label>
                    <select name="role" id="role" class="form-control custom-select d-block" title="Role">
                        <option value="">Role</option>
                        <option value="user" <?= !empty($_GET['role']) && $_GET['role'] == 'user' ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?= !empty($_GET['role']) && $_GET['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3 mt-2">
                    <label for="keyword" class="text-dark">Pencarian</label>
                    <input type="text" name="keyword" id="keyword" value="<?= !empty($_GET['keyword']) && $_GET['keyword'] ? $_GET['keyword'] : '' ?>" placeholder="Cari berdasarkan nama atau email" class="form-control" />
                </div>
                <div class="col-12 col-lg-3 mt-2">
                    <label>&nbsp;</label>
                    <div class="btn-group btn-block" role="group" aria-label="Filter button">
                        <button class="btn btn-sm btn-secondary" type="button" onclick="location.href = '<?= base_url('user') ?>'"> Reset</button>
                        <button class="btn btn-sm btn-primary" type="submit" value="Submit"><i class="fa fa-search"></i> Filter</button>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="mt-2 table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($user)) :
                            foreach ($user as $u) :
                        ?>
                                <tr class="text-center">
                                    <td><?= ++$i ?></td>
                                    <td><?= $u->name ?></td>
                                    <td><?= $u->email ?></td>
                                    <td><?= ucfirst($u->role) ?></td>
                                    <td><?= datetime_conversion($u->date_created) ?></td>
                                    <td>
                                        <a type="button" class="btn btn-info btn-sm" href='<?= base_url('user/detail/' . $u->user_id) ?>'><i class="fas fa-fw fa-info"></i></a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        else :
                            ?>
                            <tr>
                                <td colspan="6">
                                    <p class="text-center">
                                        Data tidak tersedia.
                                    </p>
                                </td>
                            </tr>
                        <?php
                        endif;
                        ?>
                    </tbody>
                </table>
                <?php
                if (!empty($user)) :
                    echo
                    view('_partial/pagination', [
                        'page' => $page,
                        'per_page' => $per_page,
                        'total' => $total,
                        'page_text' => 'Pengguna'
                    ]);
                endif;
                ?>
            </div>
        </div>
    </div>
</form>