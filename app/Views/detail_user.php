<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-primary text-white rounded-top-4">
                <h4 class="mb-0"><i class="bi bi-person-lines-fill"></i> Detail Pengguna</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Nama:</strong> <?= esc($user['name']) ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Email:</strong> <?= esc($user['email']) ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Gender:</strong> <?= esc($user['gender']) ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Negara:</strong> <?= esc($user['country']) ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <span class="badge <?= $user['status'] ? 'bg-success' : 'bg-secondary' ?>">
                            <?= $user['status'] ? 'Aktif' : 'Tidak Aktif' ?>
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>Hobi:</strong>
                        <?php 
                            $hobbies = json_decode($user['hobbies'], true);
                            if ($hobbies && is_array($hobbies)) {
                                foreach ($hobbies as $hobby) {
                                    echo '<span class="badge bg-info text-dark me-1">' . esc($hobby) . '</span>';
                                }
                            } else {
                                echo '-';
                            }
                        ?>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a class="btn btn-outline-primary" href="<?= base_url('/user') ?>">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
