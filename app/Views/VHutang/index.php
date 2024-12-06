<?= $this->extend('layout') ?>
<?php $this->section('styles') ?>
<!-- Custom styles for this page -->
<link href="<?= base_url('/assets/vendor/datatables/dataTables.bootstrap4.min.css') ?> " rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Yang Menghutang</h1>
    <?php
        if(session()->getFlashData('success')){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }
    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Add Hutang
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vhutang as $key => $hutang) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $hutang['nama'] ?></td>
                            <td><?= $hutang['tanggal'] ?></td>
                            <td>Rp<?= number_format($hutang['jumlah']);?>,-</td>
                            <td><?= $hutang['keterangan'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editModal-<?= $hutang['id_hutang'] ?>">
                                    Edit
                                </button>
                                <a href="<?= base_url('hutang/delete/'.$hutang['id_hutang']) ?>" class="btn btn-danger"
                                    onclick="return confirm('Are you sure ?')">Delete</a>
                            </td>
                        </tr>
                        <!-- Edit Hutang Modal -->
                        <div class="modal fade" id="editModal-<?= $hutang['id_hutang'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit hutang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('hutang/edit/'.$hutang['id_hutang']) ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="nama"
                                                    value="<?= $hutang['nama'] ?>" placeholder="hutang nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" id="tanggal"
                                                    value="<?= $hutang['tanggal'] ?>" placeholder="hutang tanggal"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jumlah</label>
                                                <input type="number" name="jumlah" class="form-control" id="jumlah"
                                                    value="<?= $hutang['jumlah'] ?>" placeholder="hutang jumlah"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control"
                                                    id="keterangan" value="<?= $hutang['keterangan'] ?>"
                                                    placeholder="hutang keterangan" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add Hutang Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add hutang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('hutang') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="hutang tanggal"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="hutang jumlah"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan"
                            placeholder="hutang Keterangan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?php $this->section('scripts')?>
<!-- Page level plugins -->
<script src="<?= base_url('/assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('/assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Page level custom scripts -->
<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>
<?php $this->endSection()?>