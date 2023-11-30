<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Gabarito&family=Josefin+Sans:wght@300;400&family=Outfit&family=Poppins&family=Quicksand:wght@400;500;600;700&family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="thema1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.9.2/toastify.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.9.2/toastify.min.js"></script>
    <title>List Note</title>
    <style>
        /* Menghilangkan scroll pada halaman */
html, body {
    overflow: hidden;
    height: 100%;
    font-family: 'Poppins', sans-serif;
}
  /* Style header */
.header {
    background-color: #D2FBA4;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}

/* Style konten utama */
.main-content {
    height: calc(100% - 20px); /* Kalkulasi tinggi sesuai dengan tinggi layar - padding header */
    overflow-y: auto; /* Menambahkan scrollbar jika konten lebih panjang dari tinggi layar */
    display: flex;
    flex-direction: column;
    padding-top: 20px; /* Sesuaikan dengan tinggi padding header */
}


h2 {
    text-align: center;
    margin-bottom: 20px;
}

.task-list {
    list-style: none;
    background-color: #D2FBA4;
    margin: 5px 40px; /* Memberikan jarak atas dan bawah yang lebih besar */
    width: 1300px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    outline: none;
}

.task-list li {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.task-name {
    font-weight: bold;
}

.task-details {
    margin-top: 5px;
}

.task-actions {
    display: flex;
    gap: 5px;
}

.btn {
    padding: 5px 10px;
    background-color: #949494;
    color: #fff;
    border: none;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

input[type="text"],
input[type="date"],
input[type="time"],
button[type="submit"] {
    background-color: #D2FBA4;
    margin: 5px 40px; /* Memberikan jarak atas dan bawah yang lebih besar */
    width: 1300px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    outline: none;
}
/* CSS untuk mengatur tombol Edit dan Hapus */
.button-group {
display: flex;
justify-content: flex-end;
gap: 10px; /* Jarak antara tombol Edit dan Hapus */
}
/* Tombol Edit */
.btn-edit {
background-color: yellow;
color: black;
transition: background-color 0.3s, color 0.3s; /* Transisi warna latar belakang dan teks selama 0.3 detik */
}

.btn-edit:hover {
background-color: orange; /* Warna latar belakang saat dihover */
color: white; /* Warna teks saat dihover */
}

/* Tombol Hapus */
.btn-delete {
background-color: red;
color: white;
transition: background-color 0.3s, color 0.3s;
}

.btn-delete:hover {
background-color: darkred;
color: white;
}

.floating-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
}

.rounded-button {
    display: block;
    width: 70px;
    height: 70px;
    background-color: white;
    color : #D2FBA4;
    text-align: center;
    line-height: 70px;
    border-radius: 50%;
    font-size: 40px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.rounded-button:hover {
    background-color: #f2f2ff;
}
    </style>
</head>
<body>
    <header class="header">
        <!--LOgo produk dan nama produk-->
        <div class="logo">

            <!--gambar untuk logo-->
            <img src="logo.jpeg" alt="Logo" class="logo-image">
            <p class="logo-text">List Notes</p>
        </div>

        <!-- menu dropdown-->
        <div class="dropdown">
            <button class="dropdown-toggle" id="menu-toggle">
                <!--dropdown navigasi-->
                <i class="fas fa-bars"></i>
                <span class="menu-text">Menu</span>
            </button>
            <ul class="dropdown-menu" id="menu">
                <!--untuk menghapus periklanan jika masa trial sudah habis-->
                <li><a href="hapus_iklan.php"><i class="fas fa-trash-alt"></i> Hapus Iklan</a></li>
                <!--untuk mengatur sinkron google, ringtone ataupun mode desktopnya-->
                <li><a href="pengaturan.php"><i class="fas fa-cog"></i> Pengaturan</a></li>
                <!--untuk meminta kritik dan saran-->
                <li><a href="saran.php"><i class="fas fa-comments"></i> Kritik & Saran</a></li>

                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
        
    </header>
    <main class="main-content">
        <!-- untuk menambah tugas baru -->
        <div class="container">
            <h2>Daftar List Tugas</h2>
        <ul class="task-list">
           <!-- Loop melalui data tugas dari database -->
           <?php
// Koneksi ke database (gantilah dengan informasi database Anda)
include "koneksi.php";

// Query SQL untuk mengambil data tugas dari database
$sql = "SELECT id, nama_tugas, tanggal, waktu FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tampilkan daftar tugas
    while ($row = $result->fetch_assoc()) {
        $taskId = $row["id"];
        $taskName = $row["nama_tugas"];
        $taskDate = $row["tanggal"];
        $taskTime = $row["waktu"];
        
    
       // Tampilkan tugas
       echo '<li data-task-id="' . $taskId . '" data-task-name="' . $taskName . '">';
       echo '<span>' . $taskName . ' - ' . $taskDate . ' ' . $taskTime . '</span>';
       echo '<div class="button-group">';
       echo '<button onclick="editTugas(' . $taskId . ')" class="btn btn-edit">Edit</button>';
       echo '<button onclick="hapusTugas(' . $taskId . ')" class="btn btn-delete">Hapus</button>';
       echo '</div>';
       echo '</li>';      
    }
} else {
    echo "Tidak ada tugas.";
}

// Tutup koneksi ke database
$conn->close();
?>
      
      
            
      <div class="floating-button">
            <a href="TambahTugas.php" class="rounded-button"><i class="fas fa-plus-circle"></i></a>
        </div>
    </main>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    // Cek apakah URL memiliki parameter success
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get("success");

    if (successParam === "1") {
        // Tampilkan Toastify alert jika parameter success adalah 1
        Toastify({
            text: "Tugas berhasil ditambahkan.",
            duration: 3000, // Durasi alert dalam milidetik (3 detik)
            gravity: "top", // Gravity menentukan posisi alert (top, bottom, center)
            position: "right", // Posisi alert di sebelah kanan
            close: true, // Menampilkan tombol close
            backgroundColor: "green", // Warna latar belakang alert
        }).showToast();

        // Hapus parameter success dari URL agar alert tidak muncul lagi
        history.replaceState({}, document.title, "TambahTugas.php");
    }
});

function editTugas(taskId) {
    // Redirect ke halaman edit dengan mengirimkan ID tugas
    window.location.href = 'edit_tugas.php?id=' + taskId;
}

document.addEventListener("DOMContentLoaded", function () {
    // Cek apakah URL memiliki parameter success
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get("success");

    if (successParam === "2") {
        // Tampilkan Toastify alert jika parameter success adalah 1
        Toastify({
            text: "Tugas berhasil diubah.",
            duration: 3000, // Durasi alert dalam milidetik (3 detik)
            gravity: "top", // Gravity menentukan posisi alert (top, bottom, center)
            position: "right", // Posisi alert di sebelah kanan
            close: true, // Menampilkan tombol close
            backgroundColor: "blue", // Warna latar belakang alert
        }).showToast();

        // Hapus parameter success dari URL agar alert tidak muncul lagi
        history.replaceState({}, document.title, "index.php");
    }
});

function hapusTugas(taskId) {
    // Ambil nama tugas dari atribut data-task-name
    const taskElement = document.querySelector(`[data-task-id="${taskId}"]`);
    const taskName = taskElement.getAttribute('data-task-name');

    if (confirm("Apakah Anda yakin ingin menghapus tugas '" + taskName + "'?")) {
        // Sisanya kode penghapusan yang sama seperti sebelumnya
        fetch('hapus_tugas.php?id=' + taskId, {
            method: 'DELETE',
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tampilkan pesan Toastify jika penghapusan berhasil
                Toastify({
                    text: "Tugas '" + taskName + "' berhasil dihapus.",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    close: true,
                    backgroundColor: "red",
                }).showToast();

                // Set timeout untuk memuat ulang halaman setelah alert muncul
                setTimeout(function () {
                    window.location.reload();
                }, 1000); // 3000 milidetik (3 detik)

                // Hapus elemen dari daftar tugas di halaman
                taskElement.remove();
            } else {
                // Tampilkan pesan kesalahan jika penghapusan gagal
                Toastify({
                    text: "Gagal menghapus tugas.",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    close: true,
                    backgroundColor: "red",
                }).showToast();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}
// Fungsi untuk mengatur tema berdasarkan preferensi pengguna
function setTheme() {
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const dropdownMenu = document.getElementById('menu');

    if (savedTheme === 'gelap') {
        body.classList.add('dark-mode'); // Aktifkan tema gelap
        dropdownMenu.classList.add('dark-mode'); // Terapkan tema gelap pada dropdown
    } else {
        body.classList.remove('dark-mode'); // Aktifkan tema terang (default)
        dropdownMenu.classList.remove('dark-mode'); // Hapus tema gelap dari dropdown
    }
}

// Panggil fungsi setTheme untuk mengatur tema saat halaman dimuat
setTheme();

    </script>
    <script src="main.js"></script>
</body>
</html>