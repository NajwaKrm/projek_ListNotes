<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Note | Hapus Iklan</title>
    <!-- Tambahkan link ke Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Gabarito&family=Josefin+Sans:wght@300;400&family=Outfit&family=Poppins&family=Quicksand:wght@400;500;600;700&family=Raleway&display=swap" rel="stylesheet">
    <!-- Tambahkan link ke Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Menambahkan script jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="thema2.css">
    <style>
        body.dark-mode {
    background-color: #333; /* Warna latar belakang gelap */
    color: #fff; /* Warna teks putih */
}

.dark-mode .container {
    background-color: #444; /* Warna latar belakang container gelap */
}

.dark-mode .row {
    background-color: #555; /* Warna latar belakang card gelap */
    color: #fff; /* Warna teks card putih */
}
.dark-mode .nav {
    background-color: #555; /* Warna latar belakang card gelap */
    color: #fff; /* Warna teks card putih */
}
body {
    font-family: 'Poppins', sans-serif;
}
button:hover {
    background-color: #0056b3;
}
.h1 {
    color: #fff;
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
    </a><a class="navbar-brand" href="hapus_iklan.php">
        Hapus Iklan
    </a>
</nav>
     <!-- Konten Utama -->
     <div class="container mt-5">
        <h2>Silahkan Pilih Metode Pembayaran</h2>
        <br>
        <br>
        <!-- Dropdown untuk Metode Pembayaran -->
        <div class="dropdown dropend">
            <button class="btn btn-dark dropdown-toggle" type="button" id="metodePembayaran" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-cart-shopping"></i> Pilih Metode Pembayaran
            </button>
            <ul class="dropdown-menu" aria-labelledby="metodePembayaran">
                <li><a class="dropdown-item" href="#"><i class="fas fa-wallet"></i> Dana</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-wallet"></i> OVO</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-wallet"></i> GoPay</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-wallet"></i> ShopeePay</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-university"></i> Transfer Bank</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="fab fa-cc-paypal"></i> Paypal</a></li>
            </ul>
        </div>
        <hr>
        <!-- QR Code untuk Metode Pembayaran -->
        <h3>Silahkan Yang Mau Scan All Payment Digital</h3>
            <div class="col-md-8">
                <h5>All Payment Gateaway</h5>
                <img src="payment.jpg" alt="QR Code All Payment" width="350" height="350">
            </div>
    <br>
    <h6>Note : Scan QR code di atas untuk melakukan pembayaran dengan metode All Payment Gateaway.</h6>
        </div>
<script>
    function setTheme() {
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const navbar = document.getElementById('navbar'); // Ambil navbar berdasarkan ID

    if (savedTheme === 'gelap') {
        body.classList.add('dark-mode'); // Aktifkan tema gelap pada body
        navbar.style.backgroundColor = '#555'; // Ganti warna latar belakang navbar ke tema gelap
    } else {
        body.classList.remove('dark-mode'); // Nonaktifkan tema gelap pada body
        navbar.style.backgroundColor = '#ccc'; // Ganti warna latar belakang navbar ke tema terang (default)
    }
}

// Panggil fungsi setTheme untuk mengatur tema saat halaman dimuat
setTheme();

</script>
<script src="themeToggle.js"></script>
</body>
</html>
