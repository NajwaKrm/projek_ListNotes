<?php
// Koneksi ke database (gantilah dengan informasi koneksi Anda)
include "koneksi.php";

// Periksa apakah formulir telah dikirimkan untuk mengedit tugas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $taskId = $_POST["taskId"];
    $taskName = $_POST["taskName"];
    $taskDate = $_POST["taskDate"];
    $taskTime = $_POST["taskTime"];

    // Query SQL untuk mengupdate data tugas
    $sql = "UPDATE tasks SET nama_tugas = '$taskName', tanggal = '$taskDate', waktu = '$taskTime' WHERE id = $taskId";

    if ($conn->query($sql) === TRUE) {
        // Menggunakan alert JavaScript
        echo '<script>alert("Tugas berhasil diubah.");</script>';
        
        // Redirect ke halaman tampilan data setelah 1 detik
        echo '<script>setTimeout(function() { window.location.href = "TambahTugas.php?success=2"; }, 1000);</script>';
    } else {
        // Ada kesalahan dalam pengeditan tugas
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>
