<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
    }

    .header {
        background: #AFDDFF;
        color: white;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header .logo {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .header .jam {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .main-content {
        display: flex;
        height: calc(100vh - 120px);
    }

    .video-section {
        flex: 1.2;
        background: black;
    }

    .video-section video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .queue-section {
        flex: 1.8;
        background: #ecf0f1;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        overflow-y: auto;
    }

    .queue-box {
        background: white;
        border-left: 5px solid #3498db;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .queue-box h4 {
        margin: 0 0 15px 0;
        font-size: 24px;
        font-weight: bold;
    }

    .queue-box .detail {
        display: flex;
        justify-content: space-between;
        font-size: 60px;
        font-weight: bold;
    }

    .footer {
        background: #AFDDFF;
        color: black;
        text-align: center;
        padding: 10px;
        font-size: 18px;
    }

    @keyframes bounceBox {
        0% {
            transform: translateY(0);
        }

        30% {
            transform: translateY(-10px);
        }

        60% {
            transform: translateY(5px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .queue-box.called {
        animation: bounceBox 0.6s ease;
    }



    .updated {
        animation: zoom 0.4s ease-in-out;
    }

    @keyframes zoom {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.3);
        }

        100% {
            transform: scale(1);
        }
    }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="../assets/img/rspklc.png" alt="Logo" height="50" />
            <div>
                <div>Rumah Sakit Permata Keluarga</div>
                <small>Lippo Cikarang</small>
            </div>
        </div>
        <div class="jam" id="jam">--:--:--</div>
    </div>

    <div class="main-content">
        <div class="video-section">
            <video autoplay muted loop>
                <source src="../assets/video/infografis.mp4" type="video/mp4" />
            </video>
        </div>
        <div class="queue-section">
            <div class="queue-box">
                <h4>BPJS</h4>
                <div class="detail">
                    <span id="bpjs-no">-</span>
                    <span id="bpjs-loket">-</span>
                </div>
            </div>
            <div class="queue-box">
                <h4>Asuransi</h4>
                <div class="detail">
                    <span id="pt-no">-</span>
                    <span id="pt-loket">-</span>
                </div>
            </div>
            <div class="queue-box">
                <h4>Umum</h4>
                <div class="detail">
                    <span id="umum-no">-</span>
                    <span id="umum-loket">-</span>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <span id="footer-waktu">Waktu</span> | SELAMAT DATANG DI RS PERMATA KELUARGA LIPPO CIKARANG
    </div>

    <script>
    function updateJam() {
        const now = new Date();
        const waktu = now.toLocaleTimeString('id-ID');
        const tanggal = now.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        document.getElementById("jam").textContent = waktu;
        document.getElementById("footer-waktu").textContent = `${waktu} - ${tanggal}`;
    }
    setInterval(updateJam, 1000);
    updateJam();

    function animateUpdate(id, newText) {
        const el = document.getElementById(id);
        if (el.textContent !== newText) {
            el.textContent = newText;
            el.classList.add('updated');
            setTimeout(() => el.classList.remove('updated'), 400);
        }
    }


    function updateAntrian() {
        fetch('get_display_antrian.php')
            .then(res => res.json())
            .then(data => {
                animateUpdate("bpjs-no", data.bpjs?.no_antrian || '-');
                animateUpdate("bpjs-loket", "Loket " + (data.bpjs?.loket || '-'));

                animateUpdate("pt-no", data.pt?.no_antrian || '-');
                animateUpdate("pt-loket", "Loket " + (data.pt?.loket || '-'));

                animateUpdate("umum-no", data.umum?.no_antrian || '-');
                animateUpdate("umum-loket", "Loket " + (data.umum?.loket || '-'));
            })
            .catch(err => {
                console.error("Gagal fetch antrian:", err);
            });
    }

    setInterval(updateAntrian, 2000);
    updateAntrian();
    </script>
</body>

</html>