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


        h1 {
            text-transform: uppercase;
            color: green;
        }

        button {
            background-color: green;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: green;
        }

        div {
            width: 100%;
            height: auto;
        }

        .base {
            width: 400px;
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background: #ededed;
        }
    </style>
</head>

<body>
    <center>
        <h1>Tambah Buku</h1>
        <center>
            <form method="POST" action="prosestambah.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Judul</label>
                        <input type="text" name="judul" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Penulis</label>
                        <input type="text" name="pengarang" />
                    </div>
                    <div>
                        <label>Penerbit</label>
                        <input type="text" name="penerbit" required="" />
                    </div>
                    <div>
                        <label>Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" required="" />
                    </div>
                    <div>
                        <label>Gambar Buku</label>
                        <input type="file" name="gambar" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Data</button>
                    </div>
                </section>
            </form>
</body>

</html>