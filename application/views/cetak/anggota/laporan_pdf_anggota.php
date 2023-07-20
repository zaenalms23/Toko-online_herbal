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
        <center>Laporan Data Anggota</center>
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
</body>

</html>