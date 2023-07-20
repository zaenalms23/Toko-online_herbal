<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3>
    <center>Laporan Anggota</center>
</h3>
<br />
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th nowrap>Nama</th>
            <th nowrap>Email</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 1;
        foreach ($anggota as $a) { ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $a->nama_user; ?></td>
                <td><?= $a->email; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>