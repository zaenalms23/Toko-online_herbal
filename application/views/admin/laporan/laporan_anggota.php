<!-- Begin Page Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Laporan Anggota
    </h2>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="intro-y text-lg font-medium mt-10">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('admin/laporan/cetak_laporan_anggota'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('admin/laporan/laporan_anggota_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
            <a href="<?= base_url('admin/laporan/export_excel_anggota'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
            <table class="table table-report -mt-2">
                <tr>
                    <th>No</th>
                    <th nowrap>Nama</th>
                    <th nowrap>Email</th>
                </tr>
                <?php
                $i = 1;
                foreach ($anggota as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a->nama_user; ?></td>
                        <td><?= $a->email; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</div>