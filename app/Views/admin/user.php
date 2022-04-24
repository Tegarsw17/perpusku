<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid ">
    <h1>Users</h1>
    <form action="" method="post">
        <div class="input-group mb-3 col-3">
            <input type="text" class="form-control" placeholder="Masukkan Id/Nama/Alamat..." name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Find</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Avatar</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + (5 * ($currentpage - 1));
            foreach ($list as $l) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><img src="/img/<?= $l['avatar']; ?>" alt="" class="avatar"></td>
                    <td><?= $l['nama']; ?></td>
                    <td><?= $l['email']; ?></td>
                    <td><a class="btn btn-success" href="/user/<?= $l['id']; ?>">Detail</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links('user', 'user_pagination'); ?>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>