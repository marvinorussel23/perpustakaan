<?php
include 'koneksi.php';

$id               = $_POST['id'];
$judul            = $_POST['judul'];
$pengarang        = $_POST['pengarang'];
$penerbit         = $_POST['penerbit'];
$tanggal_masuk    = $_POST['tanggal_masuk'];
$gambar           = $_FILES['gambar']['name'];

if ($gambar != "") {
    $ekstensi_gambar = array('png', 'jpg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $gambar_baru = $angka_acak . '-' . $gambar;
    if (in_array($ekstensi, $ekstensi_gambar) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $gambar_baru);

        $query  = "UPDATE tbperpustakaan SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tanggal_masuk = '$tanggal_masuk', gambar = '$gambar_baru'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambahbuku.php';</script>";
    }
} else {
    $query  = "UPDATE tbperpustakaan SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tanggal_masuk = '$tanggal_masuk'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
