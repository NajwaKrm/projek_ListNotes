// settings.js

document.addEventListener("DOMContentLoaded", function () {
    const themeForm = document.getElementById("themeForm");

    themeForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const selectedTheme = document.querySelector('input[name="tema"]:checked').value;
        
        // Simpan tema yang dipilih ke Local Storage
        localStorage.setItem("theme", selectedTheme);
        
        // Beri tahu pengguna bahwa tema telah disimpan
        Swal.fire("Tema disimpan!", "Tema telah diperbarui.", "success");
    });

    // Ambil tema yang disimpan dalam Local Storage jika ada
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "gelap") {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }
});
