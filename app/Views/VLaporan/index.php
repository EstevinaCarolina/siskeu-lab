<?= $this->extend('layout') ?>
<?php $this->section('styles') ?>
<!-- Custom styles for this page -->
<link href="<?= base_url('/assets/vendor/datatables/dataTables.bootstrap4.min.css') ?> " rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
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
                Add Laporan
            </button>
            <button onclick="window.print()" class="btn btn-outline-secondary shadow float-right ml-2">Print<i
                    class="fa fa-print"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Total Pemasukan</th>
                            <th>Total Pengeluaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vlaporan as $key => $laporan) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $laporan['tanggal'] ?></td>
                            <td>Rp<?= number_format($laporan['total_pengeluaran']);?>,-</td>
                            <td>Rp<?= number_format($laporan['total_pemasukan']);?>,-</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editModal-<?= $laporan['id_laporan'] ?>">
                                    Edit
                                </button>
                                <a href="<?= base_url('laporan/delete/'.$laporan['id_laporan']) ?>"
                                    class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</a>
                            </td>
                        </tr>
                        <!-- Edit laporan Modal -->
                        <div class="modal fade" id="editModal-<?= $laporan['id_laporan'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit laporan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('laporan/edit/'.$laporan['id_laporan']) ?>"
                                        method="post">
                                        <?= csrf_field(); ?>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" id="tanggal"
                                                    value="<?= $laporan['tanggal'] ?>" placeholder="laporan tanggal"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Total Pemasukan</label>
                                                <input type="number" name="total_pemasukan" class="form-control"
                                                    id="total_pemasukan" value="<?= $laporan['total_pemasukan'] ?>"
                                                    placeholder="laporan total_pemasukan" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Total Pengeluaran</label>
                                                <input type="number" name="total_pengeluaran" class="form-control"
                                                    id="total_pengeluaran" value="<?= $laporan['total_pengeluaran'] ?>"
                                                    placeholder="laporan total_pengeluaran" required>
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
<!-- Add Laporan Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengeluaran') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="tanggal"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Total Pemasukan</label>
                        <input type="number" name="total_pemasukan" class="form-control" id="total_pemasukan"
                            placeholder="Total Pemasukan" required>
                    </div>
                    <div class="form-group">
                        <label for="">Total Pengeluaran</label>
                        <input type="text" name="total_pengeluaran" class="form-control" id="total_pengeluaran"
                            placeholder="Total Pengeluaran" required>
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