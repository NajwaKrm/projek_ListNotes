<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Gabarito&family=Josefin+Sans:wght@300;400&family=Outfit&family=Poppins&family=Quicksand:wght@400;500;600;700&family=Raleway&display=swap" rel="stylesheet">
    <!-- Tambahkan link ke Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Tambahkan link ke Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <style>
        body.dark-mode {
            background-color: #333; /* Warna latar belakang gelap */
            color: #fff; /* Warna teks putih */
        }

        .dark-mode .container {
            background-color: #444; /* Warna latar belakang container gelap */
        }

        .dark-mode .card {
            background-color: #555; /* Warna latar belakang card gelap */
            color: #fff; /* Warna teks card putih */
        }
        .dark-mode .nav {
            background-color: #555; /* Warna latar belakang card gelap */
            color: #fff; /* Warna teks card putih */
        }

         .go-back {
         background-color: #A7F46B; /* Warna hijau untuk tombol kembali */
            color: #000; /* Warna teks tombol kembali */
            border: none;
            cursor: pointer;
            padding:10px;
            margin:10px;
            margin-left: 20px;
            width: 100px;
    }
    .go-back:hover {
        background-color: #ccc;
    }
        
    </style>
</head>
<body>
<!-- Navbar Header -->
<nav class="navbar navbar-expand-lg" style="background-color: #D2FBA4; width: 100%;
            height:60px;">
    <a class="go-back" href="index.php" style="padding-left: 20px;">
        Kembali 
    </a><a class="navbar-brand" href="pengaturan.php">
        Pengaturan
    </a>
</nav>
    <!-- Konten Utama -->
    <div class="container">
        <!-- Sambungkan Akun Google -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Sambungkan Akun Google</h5>
                <p class="card-text">Klik tombol di bawah untuk menyambungkan akun Google Anda.</p>
                <!-- Tombol untuk mengaitkan akun Google -->
                <button id="sambungkanAkunGoogle" class="btn btn-dark">Sambungkan Akun Google</button>
            </div>
        </div>

        <!-- Setel Ringtone -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Setel Ringtone</h5>
                <p class="card-text">Pilih ringtone yang Anda inginkan dari daftar berikut.</p>
                <select class="form-select">
                    <option value="ringtone1">Ringtone 1</option>
                    <option value="ringtone2">Ringtone 2</option>
                    <option value="ringtone3">Ringtone 3</option>
                </select>
            </div>
        </div>

        <!-- Pilih Tema Gelap/Terang -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Pilih Tema</h5>
                <p class="card-text">Pilih tema yang Anda inginkan untuk tampilan.</p>
                <form method="post">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tema" id="temaGelap" value="gelap">
                        <label class="form-check-label" for="temaGelap">
                            Tema Gelap
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tema" id="temaTerang" value="terang">
                        <label class="form-check-label" for="temaTerang">
                            Tema Terang
                        </label>
                    </div>
                    <button type="submit" class="btn btn-dark" id="simpanButton">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
 function toggleTheme() {
    const temaGelapRadio = document.getElementById('temaGelap');
    const temaTerangRadio = document.getElementById('temaTerang');
    const navbar = document.querySelector('.navbar');

    if (temaTerangRadio.checked) {
        document.body.classList.remove('dark-mode'); // Nonaktifkan tema gelap
        navbar.style.backgroundColor = '#ccc'; // Ganti warna latar belakang navbar
        localStorage.setItem('theme', 'terang'); // Simpan tema terang ke local storage
    } else {
        document.body.classList.add('dark-mode'); // Aktifkan tema gelap
        navbar.style.backgroundColor = '#555'; // Ganti warna latar belakang navbar
        localStorage.setItem('theme', 'gelap'); // Simpan tema gelap ke local storage
    }
}

        // Ambil nilai tema dari local storage jika tersedia
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'gelap') {
            toggleTheme(); // Aktifkan tema gelap jika sudah disimpan sebelumnya
        }

        // Tambahkan event listener pada tombol "Simpan" untuk beralih tema saat diklik
        const simpanButton = document.querySelector('button[type="submit"]');
        simpanButton.addEventListener('click', function (event) {
            event.preventDefault(); // Menghentikan aksi default formulir
            toggleTheme(); // Beralih tema ketika tombol "Simpan" diklik
        });


        // Fungsi untuk menginisiasi proses otentikasi dengan Google
function sambungkanAkunGoogle() {
    // Gantilah 'YOUR_CLIENT_ID' dengan ID klien OAuth yang Anda dapatkan dari Console Pengembang Google
    const clientId = '151202592226-u6fmmmuo4n18v4uf53l8taba0idckg01.apps.googleusercontent.com';
    
    // Gantilah 'YOUR_REDIRECT_URI' dengan URI balik pengalihan yang telah Anda konfigurasi
    const redirectUri = 'http://localhost/ListNotes/pengaturan.php';
    
    // URL untuk memulai proses otentikasi
    const authUrl = `https://accounts.google.com/o/oauth2/auth?client_id=${clientId}&redirect_uri=${redirectUri}&response_type=token&scope=email`;

    // Buka jendela baru atau tab untuk otentikasi Google
    window.open(authUrl, '_blank');
}

// Tambahkan event listener pada tombol "Sambungkan Akun Google"
const sambungkanButton = document.getElementById('sambungkanAkunGoogle');
sambungkanButton.addEventListener('click', sambungkanAkunGoogle);

    </script>
</body>
</html>
