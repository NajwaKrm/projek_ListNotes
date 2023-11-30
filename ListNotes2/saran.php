<!DOCTYPE html>
<html>
<head>   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="thema1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.9.2/toastify.min.css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Gabarito&family=Josefin+Sans:wght@300;400&family=Outfit&family=Poppins&family=Quicksand:wght@400;500;600;700&family=Raleway&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.9.2/toastify.min.js"></script>
    <title>Saran & Kritik</title>
    <style>
        /* Style untuk body (latar belakang hijau) */
        body {
             font-family: 'Poppins', sans-serif;
            margin: auto; /* Menghilangkan margin bawaan browser */
            padding: 0; /* Menghilangkan padding bawaan browser */

        }
        /* Style untuk header */
        .header {
            background-color: #D2FBA4;
            width: 100%;
            height:60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Style untuk tombol Kembali */
        .back-button {
            background-color: #A7F46B; /* Warna hijau untuk tombol kembali */
            color: #000; /* Warna teks tombol kembali */
            border: none;
            cursor: pointer;
            padding:10px;
            margin:10px;
            margin-left: 20px;
            width: 100px;
        }

        /* Style untuk kotak teks besar */
        .text-box {
            width: 40%;
            height: 400px;
            margin-left: 10px;
            padding: 10px;
            background-color: rgb(255, 255,255);
        }

        /* Style untuk tombol Simpan */
        .save-button {
           padding: 5px 10px;
            background-color:  #D2FBA4;
            color: black;
            border: none;
            cursor: pointer;
            width: 1320px;
            height: 40px;
            border-radius: 5px;
        }
        .btn2 {
            margin-top: 100px;
        }

        .save-button:hover {
            background-color: #ccc;
        }

        /* Style untuk footer */
        .footer {
            
            padding: 10px;
        }
        .text1{
            font-size: 20px;
            padding: 20px ;

        }
        

        /* Style untuk popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Animasi untuk muncul popup */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style
</head>
<body>
    <!-- Header dengan tombol Kembali -->
    <div class="header">
        <button class="back-button" onclick="goBack()">Kembali  </button>
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
            </ul>
        </div>
    </div>

    <!-- Kolom teks besar untuk mengisi kriti dan saran-->
    <div class="text1">saran dan kritik</div>
    <textarea class="text-box" id="kritikSaran"></textarea>

    <!-- Tombol Simpan untuk menyimpan ke database -->
    <div class="footer">
        <button class="save-button" onclick="saveText()">Simpan</button>
    </div>

    <!-- Popup jika kritik dan saran telah dimasukkan dan akan masuk ke dalam database-->
    <div id="popup" class="popup">
        Saran dan Kritik sudah di kirim<br>
        Terimakasih Atas Saran Dan Kritik Anda!<br>
        <button class="btn btn-dark" onclick="closePopup()">Tutup</button>
    </div>

    <script>
        // Fungsi untuk tombol "Kembali"
        function goBack() {
            window.history.back();
        }

        // Fungsi untuk tombol "Simpan"
        function saveText() {
            var popup = document.getElementById('popup');
            popup.style.display = 'block';
        }

        // Fungsi untuk menutup popup
        function closePopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'none';
        }
    </script>
    <script src="main.js"></script>
    <script src="themeToggle.js"></script>

</body>
</html>
