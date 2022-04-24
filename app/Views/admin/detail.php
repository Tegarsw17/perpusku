<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid ">
    <h1>Biodata <?= ucfirst($user['username']); ?></h1>
    <div class="d-flex">
        <div class="p-2 flex-fill">
            <table class="table table-striped col-12">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <th class="font-weight-normal"><?= $user['nama']; ?></th>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Username</td>
                        <td><?= $user['username']; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">email</td>
                        <td><?= $user['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Jenis Kelamin</td>
                        <td><?= ucfirst($user['jenis_kelamin_']); ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Alamat</td>
                        <td><?= ucfirst($user['alamat']); ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Tempat/Tanggal Lahir</td>
                        <td><?= ucfirst($user['tempat_lahir']); ?>, <?= $user['tanggal_lahir']; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Telepon</td>
                        <td><?= $user['telepon']; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="" class="btn btn-warning btn-lg mr-2">Edit</a>
                            <a href="/user/" class="btn btn-danger btn-lg">Back</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-2 flex-fill text-center">
            <img src="/img/<?= $user['avatar']; ?>" class="img-fluid center" width="300px">
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>