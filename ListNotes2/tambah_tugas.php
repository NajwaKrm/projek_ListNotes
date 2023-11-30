<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (gantilah dengan informasi koneksi Anda)
   include "koneksi.php";

   
    // Ambil data dari formulir
    $taskName = $_POST["taskName"];
    $taskDate = $_POST["taskDate"];
    $taskTime = $_POST["taskTime"];

    // Query SQL untuk menyimpan data ke dalam database
    $sql = "INSERT INTO tasks (nama_tugas, tanggal, waktu) VALUES ('$taskName', '$taskDate', '$taskTime')";

    if ($conn->query($sql) === TRUE) {
        // Menggunakan alert JavaScript
        echo '<script>alert("Tugas berhasil ditambahkan.");</script>';
        
        // Redirect ke halaman tampilan data setelah 1 detik
        echo '<script>setTimeout(function() { window.location.href = "TambahTugas.php?success=1"; }, 1000);</script>';
    } else {
        // Ada kesalahan dalam penambahan tugas
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi ke database
    $conn->close();
}
?>