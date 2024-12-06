<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan.xls");
?>


<html>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan->getResultArray() as $laporan) : ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $laporan['tanggal'] ?></td>
                <td>Rp<?= number_format($laporan['total_pemasukan']);?>,-</td>
                <td>Rp<?= number_format($laporan['total_pengeluaran']);?>,-</td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>

</html>