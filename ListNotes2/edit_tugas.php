<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Notes | Edit Tugas</title>
    <style>
	@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Gabarito&family=Josefin+Sans:wght@300;400&family=Outfit&family=Quicksand:wght@400;500;600;700&family=Raleway&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #D2FBA4;
            width: 100%;
            height:40px;
            color: #000000;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        
        }


        .btn-back {
             background-color: #A7F46B; /* Warna hijau untuk tombol kembali */
            color: #000; /* Warna teks tombol kembali */
            border: none;
            cursor: pointer;
            padding:10px;
            margin:10px;
            margin-left: 20px;
            width: 100px;
        }

         .btn-back:hover {
           background-color: #ccc;
        }

        h2 {
            margin-top: -40px;
            padding-left: 150px;
        }

        .task-list {
            list-style: none;
            padding-left:200px;
        }

        .task-list li {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-list li:last-child {
            border-bottom: none;
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

        .id{
            padding-left: 40px;
        }

        .btn {
            padding: 5px 10px;
            background-color:  #D2FBA4;
            color: black;
            border: none;
            cursor: pointer;
        }
        .btn2 {
            margin-top: 100px;
        }

        .btn:hover {
            background-color: #ccc;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        button[type="submit"] {
            background-color: #D2FBA4;
            margin: 5px 40px; /* Memberikan jarak atas dan bawah yang lebih besar */
            width: 1300px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
        }

        #taskForm {
            margin-top:40px;
        }
        /* CSS untuk tema gelap */
body.dark-mode {
    background-color: #333; /* Warna latar belakang gelap */
    color: #fff; /* Warna teks putih */
}

.dark-mode .header {
    background-color: #444; /* Warna latar belakang container gelap */
}

.dark-mode .container {
    background-color: #555; /* Warna latar belakang container gelap */
    color: #fff; /* Warna teks putih */
}

/* Gaya untuk daftar tugas dalam tema gelap */
.dark-mode .task-list {
    background-color: #666; /* Warna latar belakang daftar tugas gelap */
}

.dark-mode .task-list li {
    background-color: #777; /* Warna latar belakang item tugas gelap */
    color: #fff; /* Warna teks item tugas putih */
}

.dark-mode .task-list li .button-group button {
    background-color: #888; /* Warna tombol gelap */
    color: #fff; /* Warna teks tombol putih */
}

/* Gaya untuk formulir tambah tugas dalam tema gelap */
.dark-mode #taskForm {
    background-color: #666; /* Warna latar belakang formulir gelap */
}

.dark-mode #taskForm label {
    color: #fff; /* Warna teks label putih */
}

.dark-mode #taskForm input[type="text"],
.dark-mode #taskForm input[type="date"],
.dark-mode #taskForm input[type="time"] {
    background-color: #777; /* Warna latar belakang input gelap */
    color: #fff; /* Warna teks input putih */
}

.dark-mode #taskForm button[type="submit"] {
    background-color: #888; /* Warna tombol gelap */
    color: #fff; /* Warna teks tombol putih */
}
    </style>
</head>
<body>
<div class="header">

<!--tombol kembali ke halaman utama-->
<button class="btn-back" onclick="goBack()">Kembali</button>
<h2>Edit Tugas</h2>
</div>
<div class="container">
    <div>
        <div>
        <?php
// Koneksi ke database (gantilah dengan informasi koneksi Anda)
include "koneksi.php";

// Periksa apakah ada parameter "id" di URL
if (isset($_GET["id"])) {
    $taskId = $_GET["id"];

    // Query SQL untuk mengambil data tugas berdasarkan ID
    $sql = "SELECT id, nama_tugas, tanggal, waktu FROM tasks WHERE id = $taskId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $taskName = $row["nama_tugas"];
        $taskDate = $row["tanggal"];
        $taskTime = $row["waktu"];
    } else {
        echo "Tugas tidak ditemukan.";
        exit; // Keluar dari skrip jika tugas tidak ditemukan
    }
}

// Tutup koneksi ke database
$conn->close();
?>
            <h2>Tugas Yang Dilakukan</h2>
            <!-- Formulir untuk mengedit tugas -->
            <form method="POST" action="update_tugas.php">
                <input type="hidden" name="taskId" value="<?php echo $taskId; ?>">
                <label for="taskName" class="id">Nama Tugas:</label>
                <input type="text" id="taskName" name="taskName" value="<?php echo $taskName; ?>" required>
                <label for="taskDate" class="id">Tanggal:</label>
                <input type="date" id="taskDate" name="taskDate" value="<?php echo $taskDate; ?>" required>
                <label for="taskTime" class="id">Waktu:</label>
                <input type="time" id="taskTime" name="taskTime" value="<?php echo $taskTime; ?>" required>
                <button type="submit" id="submit" class="btn">Simpan Tugas</button>
            </form>
        </div>
    </div>
    <script>
function goBack() {
    window.history.back();
}

// Fungsi untuk mengatur tema berdasarkan preferensi pengguna
function setTheme() {
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const header = document.querySelector('.header'); // Menambahkan selektor header
    const container = document.querySelector('.container'); // Menambahkan selektor container
    const dropdownMenu = document.getElementById('menu');

    if (savedTheme === 'gelap') {
        body.classList.add('dark-mode'); // Aktifkan tema gelap
        header.classList.add('dark-mode'); // Aktifkan tema gelap pada header
        container.classList.add('dark-mode'); // Aktifkan tema gelap pada container
        dropdownMenu.classList.add('dark-mode'); // Terapkan tema gelap pada dropdown
    } else {
        body.classList.remove('dark-mode'); // Aktifkan tema terang (default)
        header.classList.remove('dark-mode'); // Hapus tema gelap dari header
        container.classList.remove('dark-mode'); // Hapus tema gelap dari container
        dropdownMenu.classList.remove('dark-mode'); // Hapus tema gelap dari dropdown
    }
}

// Panggil setTheme() saat halaman dimuat
setTheme();

</script>
</body>
</html>