<?php
include('koneksi.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>PERPUSTAKAANKU</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        .judul {
            margin-left: 190px;
        }

        .responsive {
            padding-top: 20px;
        }

        h1 {
            text-transform: uppercase;
            color: green;
        }

        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
            background-color: white;
        }

        table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
            text-decoration: none;
        }

        table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }

        a {
            background-color: green;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
        }

        .button a {
            position: relative;
            margin-left: 10px;
            left: 20px;
        }

        @media screen and (max-width: 520px) {

            .judul {
                margin-left: 0px;
            }

            th {
                font-size: 11px;
            }

            td {
                font-size: 11px;
            }

            a {
                font-size: 11px;
                position: relative;
            }

            .button a {
                display: block;
                position: relative;
                margin-bottom: 10px;
                left: -2px;
            }



        }
    </style>
</head>

<body>

    <center>
        <h1>Data Buku</h1>
    </center>
    <div class="judul">
        <left><a href="tambahbuku.php">+ &nbsp; Tambah Buku</a>
        </left>
    </div>
    <br />
    <div class="responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tanggal Masuk</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tbperpustakaan ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo $row['pengarang']; ?></td>
                        <td><?php echo $row['penerbit']; ?></td>
                        <td><?php echo $row['tanggal_masuk']; ?></td>
                        <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
                        <td>
                            <div class="button">

                                <a href="editbuku.php?id=<?php echo $row['id']; ?>" <center>Edit</center>
                                </a>
                                <a href="proseshapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                            </div>
                        </td>
                    </tr>

                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>