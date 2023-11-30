<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.9.2/toastify.min.css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Gabarito&family=Josefin+Sans:wght@300;400&family=Outfit&family=Poppins&family=Quicksand:wght@400;500;600;700&family=Raleway&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.9.2/toastify.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #D2FBA4;
            width: 100%;
            height:60px;
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
            margin-top: -45px;
            padding-left: 150px;
        }

        .task-list {
            list-style: none;
            padding-left: 200px;
        }

        .task-list li {
            border-bottom: 1px solid #ccc;
            padding: 100px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-list li:last-child {
            border-bottom: none;
        }

        .task-name {
            font-style: bold;
        }

        .task-details {
            margin-top: 100px;
        }

        .task-actions {
            display: flex;
            gap: 5px;
        }

        .id {
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
        <h2 claass="tugas">Tambahkan Tugas Baru</h2>
    </div>
            <form id="taskForm" method="post" action="tambah_tugas.php">
                <label for="taskName" class="id">Nama Tugas:</label>
                <input type="text" id="taskName" name="taskName" required>
                <label for="taskDate" class="id">Tanggal:</label>
                <input type="date" id="taskDate" name="taskDate" required>
                <label for="taskTime" class="id">Waktu:</label>
                <input type="time" id="taskTime" name="taskTime" required>
                <button type="submit" class="btn" class="btn2">Tambah</button>
            </form>
    </div>
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
        history.replaceState({}, document.title, "TambahTugas.php");
    }
});

function hapusTugas(taskId) {
    if (confirm("Apakah Anda yakin ingin menghapus tugas ini?")) {
        // Ajukan permintaan AJAX untuk menghapus tugas
        fetch('hapus_tugas.php?id=' + taskId, {
            method: 'DELETE',
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tampilkan pesan Toastify jika penghapusan berhasil
                Toastify({
                    text: "Tugas berhasil dihapus.",
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
                const taskElement = document.querySelector(`[data-task-id="${taskId}"]`);
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

        
function goBack() {
    window.location.href = "index.php";
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
