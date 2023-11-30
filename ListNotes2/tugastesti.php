<!DOCTYPE html>
<html>
<head>
    <title>Countdown Hitung Mundur</title>
    <script type="text/javascript">
        // Tanggal akhir countdown (format: Tahun, Bulan, Tanggal, Jam, Menit, Detik)
        var countDownDate = new Date("Oct 31, 2023 00:00:00").getTime();

        var x = setInterval(function() {
            // Tanggal saat ini
            var now = new Date().getTime();

            // Selisih waktu antara tanggal akhir dan tanggal saat ini
            var distance = countDownDate - now;

            // Menghitung waktu dalam hari, jam, menit, dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Menampilkan waktu dalam elemen dengan id "countdown"
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // Jika waktu habis, tampilkan pesan
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Waktu sudah habis!";
            }
        }, 1000);
    </script>
</head>
<body>

<h1>Countdown Hitung Mundur</h1>

<p>Waktu tersisa: <span id="countdown"></span></p>

</body>
</html>
