<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKR Paskah - Kebangkitan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Lato:wght@400;700&display=swap');

        body {
            background-color: #EAEDED;
            /* Abu-abu terang */
            font-family: 'Lato', sans-serif;
            color: #2C3E50;
            /* Biru tua */
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #2980B9;
            /* Biru laut */
            color: white;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }

        nav {
            background-color: #1F618D;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            font-family: 'Lato', sans-serif;
        }

        #countdown {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            font-family: 'Poppins', sans-serif;
            background: white;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .container {
            padding: 40px;
        }

        .highlight {
            color: #D35400;
            /* Oranye */
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }

        .cta-button {
            background-color: #2980B9;
            color: white;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s;
            font-family: 'Lato', sans-serif;
        }

        .cta-button:hover {
            background-color: #D35400;
            color: white;
        }

        footer {
            background-color: #2980B9;
            color: white;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-family: 'Lato', sans-serif;
        }
    </style>
    <script>
        window.onload = function() {
            countdown();
        };

        function countdown() {
            const eventDate = new Date("April 26, 2025 18:00:00").getTime();
            const countdownElement = document.getElementById("countdown");

            if (!countdownElement) {
                console.error("Elemen countdown tidak ditemukan");
                return;
            }

            const timer = setInterval(function() {
                const now = new Date().getTime();
                const distance = eventDate - now;

                if (distance < 0) {
                    clearInterval(timer);
                    countdownElement.innerHTML = "Acara telah dimulai!";
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownElement.innerHTML = days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik";
            }, 1000);
        }
    </script>
</head>

<body>
    <header>
        KKR Paskah 2025 - Kebangkitan Kristus
    </header>
    <nav>
        <a href="#">Beranda</a>
        <a href="#">Tentang</a>
        <a href="#">Jadwal</a>
        <a href="#">Kontak</a>
    </nav>
    <div id="countdown">Menghitung mundur...</div>
    <div class="container">
        <h2 style="font-family: 'Poppins', sans-serif;">Selamat Datang di KKR Paskah</h2>
        <p>"<span class="highlight">Kristus telah bangkit</span>, Ia sungguh telah bangkit!"</p>
        <button class="cta-button">Ikut Bergabung</button>
    </div>
    <footer>
        &copy; 2025 KKR Paskah - Semua Hak Dilindungi
    </footer>
</body>

</html>