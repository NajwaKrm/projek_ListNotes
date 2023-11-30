<?php
// Koneksi ke database (gantilah dengan informasi koneksi Anda)
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $kritikSaran = $_POST["kritikSaran"];

    // Query SQL untuk menyimpan saran dan kritik ke dalam tabel
    $sql = "INSERT INTO saran_kritik (kritik_saran) VALUES ('$kritikSaran')";

    if ($conn->query($sql) === TRUE) {
        // Menggunakan alert JavaScript atau pemberitahuan
        echo '<script>alert("Saran dan kritik berhasil disimpan.");</script>';
        
        // Redirect ke halaman lain jika perlu
        header("Location: saran.php");
    } else {
        // Ada kesalahan dalam penyimpanan saran dan kritik
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi ke database
    $conn->close();
}
?>
