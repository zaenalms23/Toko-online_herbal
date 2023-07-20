<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
    .table-data {
        width: 100%;
        border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
        border: 1px solid black;
        font-size: 11pt;
        font-family: Verdana;
        padding: 10px 10px 10px 10px;
    }

    .table-data th {
        background-color: grey;
    }

    h3 {
        font-family: Verdana;
    }
    </style>

    <h3>
        <center>LAPORAN PENJUAALAN</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Order Id</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Tgl Transaksi</th>
                <th scope="col">Total Harga</th>
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
                <td align="center"><?= $l['transaction_time']; ?></td>
                <td>Rp <?= number_format($total, 0, ',', '.') ?></td> <!-- Menampilkan total harga -->
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
    </script>

</body>

</html>