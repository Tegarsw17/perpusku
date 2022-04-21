<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid ">
    <h1>Users</h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/<?= $user['avatar']; ?>" width="200px" mr-3>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?= $user['username']; ?></h3>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="" class="btn btn-success">Edit</a>
                    <a href="/user" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>