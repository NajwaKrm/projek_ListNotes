var toggleButton = document.getElementById("menu-toggle");
var menu = document.getElementById("menu");

toggleButton.addEventListener("click", function() {
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");
    } else {
        menu.classList.add("active");
    }
});

// Menutup dropdown saat mengklik di luar dropdown
window.addEventListener("click", function(event) {
    if (!toggleButton.contains(event.target) && !menu.contains(event.target)) {
        menu.classList.remove("active");
    }
});

// Menutup dropdown saat pengguna mengklik di luar dropdown
document.addEventListener("DOMContentLoaded", function() {
    menu.style.display = "none"; // Sembunyikan dropdown saat halaman dimuat
});

toggleButton.addEventListener("click", function() {
    if (menu.style.display === "block") {
        menu.style.display = "none"; // Sembunyikan dropdown jika sudah terbuka
    } else {
        menu.style.display = "block"; // Tampilkan dropdown saat tombol diklik
    }
});


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