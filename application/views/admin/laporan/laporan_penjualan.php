<!-- Begin Page Content -->
<div class="content">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="intro-y text-lg font-medium mt-10">
            <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('admin/laporan/cetak_laporan_penjualan'); ?>" class="btn btn-primary mb-3"><i
                    class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('admin/laporan/laporan_penjualan_pdf'); ?>" class="btn btn-warning mb-3"><i
                    class="far fa-file-pdf"></i> Download Pdf</a>
            <a href="<?= base_url('admin/laporan/export_excel_penjualan'); ?>" class="btn btn-success mb-3"><i
                    class="far fa-file-excel"></i> Export ke Excel</a>
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Tgl Transaksi</th>
                        <th scope="col">Total Harga</th> <!-- Menambahkan kolom Total Harga -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($laporan as $l) {
                        $total = $l['harga'] * $l['jumlah']; // Menghitung total harga
                    ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $l['nama_user']; ?></td>
                        <td><?= $l['order_id']; ?></td>
                        <td><?= $l['nama_brg']; ?></td>
                        <td><?= $l['transaction_time']; ?></td>
                        <td>Rp <?= number_format($total, 0, ',', '.') ?></td> <!-- Menampilkan total harga -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->