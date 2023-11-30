<?php
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Ambil ID tugas yang akan dihapus dari parameter URL
    $taskId = $_GET["id"];

   include "koneksi.php";

    // Query SQL untuk menghapus tugas
    $sql = "DELETE FROM tasks WHERE id = $taskId";

    if ($conn->query($sql) === TRUE) {
        $response = ["success" => true];
    } else {
        $response = ["success" => false];
    }

    // Tutup koneksi ke database
    $conn->close();

    // Mengembalikan respons dalam format JSON
    header("Content-type: application/json");
    echo json_encode($response);
}
?>
