function toggleTheme() {
    const temaGelapRadio = document.getElementById('temaGelap');
    const temaTerangRadio = document.getElementById('temaTerang');
    const navbar = document.getElementById('navbar'); // Ambil navbar berdasarkan ID

    if (temaTerangRadio.checked) {
        document.body.classList.remove('dark-mode'); // Nonaktifkan tema gelap pada body
        navbar.style.backgroundColor = '#ccc'; // Ganti warna latar belakang navbar ke tema terang
        localStorage.setItem('theme', 'terang'); // Simpan tema terang ke local storage
    } else {
        document.body.classList.add('dark-mode'); // Aktifkan tema gelap pada body
        navbar.style.backgroundColor = '#555'; // Ganti warna latar belakang navbar ke tema gelap
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

        // Fungsi untuk mengganti tema
function toggleTheme() {
    const body = document.body;
    const currentTheme = body.classList.contains('dark-mode') ? 'gelap' : 'terang';

    if (currentTheme === 'terang') {
        body.classList.add('dark-mode'); // Aktifkan tema gelap
    } else {
        body.classList.remove('dark-mode'); // Aktifkan tema terang
    }

    // Simpan preferensi tema ke localStorage
    localStorage.setItem('theme', currentTheme);
}


    //    // Fungsi untuk menginisiasi proses otentikasi dengan Google
    //    function sambungkanAkunGoogle() {
    //     // Gantilah 'YOUR_CLIENT_ID' dengan ID klien OAuth yang Anda dapatkan dari Console Pengembang Google
    //     const clientId = '752677298302-tppv8fn4hp981qmdcv1eec0r9r1jfoes.apps.googleusercontent.com';
        
    //     // Gantilah 'YOUR_REDIRECT_URI' dengan URI balik pengalihan yang telah Anda konfigurasi
    //     const redirectUri = 'http://localhost:8080/pengaturan.html';
        
    //     // URL untuk memulai proses otentikasi
    //     const authUrl = `https://accounts.google.com/o/oauth2/auth?client_id=${clientId}&redirect_uri=${redirectUri}&response_type=token&scope=email`;
    
    //     // Buka jendela baru atau tab untuk otentikasi Google
    //     window.open(authUrl, '_blank');
    // }
    
    // // Tambahkan event listener pada tombol "Sambungkan Akun Google"
    // const sambungkanButton = document.getElementById('sambungkanAkunGoogle');
    // sambungkanButton.addEventListener('click', sambungkanAkunGoogle);
   