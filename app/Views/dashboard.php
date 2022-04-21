<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid ">
    <h1 class="h3 mb-0 text-gray-800 text-center">Hello, <?= $nama; ?></h1>
    <hr class="sidebar-divider d-none d-md-block">
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>