<?php
session_start();
// require_once('../conf/conf.php');
// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-store, no-cache, must-revalidate");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache"); // HTTP/1.0
date_default_timezone_set("Asia/Bangkok");
$tanggal = mktime(date("m"), date("d"), date("Y"));
$idyoutube = "PL4Gr5tOAPttJ247vzkv1ZbUEm_YtKLejH";
$jam = date("H:i");
$nomorblok = '1';
?>
<!doctype html>
<html lang="en">

<head>
    <title>DISPLAY ADMISI</title>
    <link rel="icon" href="assets/img/logorspklc.png" type="image/x-icon">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <!-- <meta http-equiv="refresh" content="3600"> -->
    <meta http-equiv="refresh" content="43200">
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/bootstrap44/css/bootstrap.min.css"> -->
    <link type="text/css" rel="stylesheet" href="assets/css/jquery-ui.css" media="screen,projection" />
    <link rel="stylesheet" href="assets/css/marquee.css" />
    <link rel="stylesheet" href="csscustom/style.css">
    <link rel="stylesheet" href="assets/css/ok.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.css" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
    <script src="assets/js/wow.min.js"></script>
    <!-- <script>
    // List of video files in the 'video' folder
    const videoFiles = [
        'video/mjkn.mp4',
        'video/mjkn2.mp4',
        'video/Cucitangan.mp4',
        'video/Etikabatuk.mp4',
        'video/pipp.mp4',
        'video/Pakaimasker.mp4',
        // video.volume = 0.2; //set volume 20%
    ];

    let currentVideoIndex = 0;



    function initializeVideoPlayer() {
        const videoPlayer = document.getElementById('videoPlayer');

        if (!videoPlayer) {
            console.error('Video player element not found');
            return;
        }

        function playNextVideo() {
            videoPlayer.src = videoFiles[currentVideoIndex];
            videoPlayer.play().catch(e => console.error('Error playing video:', e));
            videoPlayer.volume = 0.1;
            currentVideoIndex = (currentVideoIndex + 1) % videoFiles.length;
        }

        videoPlayer.addEventListener('ended', playNextVideo);

        // Start playing the first video
        playNextVideo();
    }

    // Run the initialization function when the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', initializeVideoPlayer);
    </script> -->
    <script>
    // List of video files in the 'video' folder
    const videoFiles = [
        'video/mjkn.mp4',
        'video/mjkn2.mp4',
        'video/Cucitangan.mp4',
        'video/Etikabatuk.mp4',
        'video/pipp.mp4',
        'video/Pakaimasker.mp4',
    ];

    let currentVideoIndex = 0;

    function initializeVideoPlayer() {
        const videoPlayer = document.getElementById('videoPlayer');

        if (!videoPlayer) {
            console.error('Video player element not found');
            return;
        }

        function playNextVideo() {
            videoPlayer.src = videoFiles[currentVideoIndex];
            videoPlayer.muted = true; // Matikan suara agar video bisa autoplay
            videoPlayer.play().then(() => {
                videoPlayer.volume = 0.1; // Set volume setelah video mulai diputar
            }).catch(e => console.error('Error playing video:', e));
            currentVideoIndex = (currentVideoIndex + 1) % videoFiles.length;
        }

        videoPlayer.addEventListener('ended', playNextVideo);

        // Start playing the first video
        playNextVideo();
    }

    // Run the initialization function when the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', initializeVideoPlayer);
    </script>

    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        height: 100vh;
        font-family: poppins-bold;
        background-color: #eeeeff;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: left;
        /* background-color: #f4f4f4; */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
        width: 150px;
    }

    .queue-info {
        color: #04af51;
        display: flex;
        gap: 10px;
        font-size: 2.0em;
        align-items: left;
        text-align: left;

    }

    .queue-number,
    .counter-number {
        padding-right: 20px;
        color: #04af51;
        text-align: center;
        border-right: 1px solid #04af51;
    }

    .queue-number span,
    .counter-number span {
        display: block;
        font-size: 2em;
        font-weight: bold;
        color: #04af51;
    }

    .time-number,
    .counter-number {
        padding-right: 20px;
        color: #04af51;
        text-align: center;
    }

    .time-number span,
    .counter-number span {
        display: block;
        font-size: 0.5em;
        font-weight: bold;
        color: #04af51;
    }

    .main-content {
        display: flex;
        flex-grow: 1;
    }

    .video-section {
        width: 70%;
        background: #000;
        position: relative;
        overflow: hidden;
    }

    .info-section {
        color: #04af51;
        width: 30%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .info-row {
        border: 1px solid #ddd;
        height: 50%;
        border-radius: 10px;
        padding: 0px;
        display: flex;

        align-items: center;
        position: relative;
        overflow: hidden;
        margin-bottom: auto;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        /* Adding shadow to the bottom */
    }

    .info-row ::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 10px;
        height: 100%;
        background-color: #f9913c;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .service {
        flex: 8;
        font-size: 2.0em;
        text-align: left;
        gap: 20px;
        padding-left: 10px;
        border-right: 1px solid #04af51;
    }

    .details,
    .counter-info {
        flex: 2;
        font-size: 1em;
        text-align: center;
        border-right: 1px solid #04af51;
        padding-right: 10px;
    }

    .footer {
        height: 10vh;
        text-align: left;
        text-transform: none;
        background-color: #04af51;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        padding-top: 30px;
        font-family: poppins-bold;
        font-size: 2.0em;
    }

    .logo-container {
        height: 10vh;
        background-color: #eeeeff;
        text-align: center;
        text-transform: none;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        padding-top: 30px;
        font-family: poppins-bold;
        font-size: 1.5em;
    }

    .logo-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .logo-text {
        text-align: center;
        text-transform: none;
        justify-content: center;
        align-items: center;
        padding-bottom: 30px;
        border-right: 3px solid #eeeeff;
    }

    #videoPlayer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* Ensure controls are visible */
    #videoPlayer::-webkit-media-controls {
        display: flex !important;
        opacity: 1 !important;
    }

    marquee {
        align-items: center;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    #loketbesar,
    #konterbesar,
    #loketa,
    #loketb,
    #loketc,
    #loketd {
        animation: blink 1.5s infinite;
    }
    </style>
    <!-- Global style END -->
</head>

<body class="bg">
    <audio id="suarabel" src="suara/intro.wav"></audio>
    <header class="header">
        <img width="30%" height="100%" alt="Scan Me" src="assets/img/rspklc.png" />
        <div class="queue-info">
            <div class="queue-number team-thumb wow fadeInUp" data-wow-delay="0.2s">Nomor Dipanggil : <br>

            </div>
        </div>
        <div class="queue-info">
            <div class="queue-number team-thumb wow fadeInUp" data-wow-delay="0.2s">Antrian<br>
                <span style="color: red;" id="loketbesar"></span>
            </div>
            <div class="queue-number team-thumb wow fadeInUp" data-wow-delay="0.2s">Loket<br>
                <span style="color: red;" id="konterbesar"></span>
            </div>
        </div>
    </header>
    <main class="main-content">
        <div class="video-section">
            <video id="videoPlayer" autoplay>



                Your browser does not support the video tag.
            </video>
            <!-- <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/videoseries?si=D72eyIcmr7hhsaa2&autoplay=1&enablejsapi=1&modestbranding=0&rel=0&loop=1&controls=0&showinfo=0&mute=1&wmode=transparent&list=<?php echo $idyoutube; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
        </div>
        <div class="info-section team-thumb wow fadeInUp" data-wow-delay="0.2s">
            <div class=" info-row">
                <div class="service">BPJS</div>
                <div class="details">Antrian <br><span style="font-size: 2.00em;" id="loketa"></span></div>
                <div class="counter-info">Loket <br> <span style="font-size: 2.00em;" id="kontera"
                        class="team-thumb wow fadeInUp" data-wow-delay="0.2s"></span>
                </div>
            </div>
            <!-- <div class="info-row">
                <div class="service">Rawat Jalan</div>
                <div class="details">Antrian <span style="font-size: 1.50em;" id="loketc" class="team-thumb wow fadeInUp" data-wow-delay="0.2s"></span></div>
                <div class="counter-info">Loket <span style="font-size: 1.50em;" id="konterc" class="team-thumb wow fadeInUp" data-wow-delay="0.2s"></span>
                </div>
            </div> -->
            <div class="info-row">
                <div class="service">Asuransi</div>
                <div class="details">Antrian <br><span style="font-size: 2.00em;" id="loketb"
                        class="team-thumb wow fadeInUp" data-wow-delay="0.2s"></span></div>
                <div class="counter-info">Loket <br><span style="font-size: 2.00em;" id="konterb"
                        class="team-thumb wow fadeInUp" data-wow-delay="0.2s"></span>
                </div>
            </div>
            <div class="info-row">
                <div class="service">Umum</div>
                <div class="details">Antrian <br><span style="font-size: 2.00em;" id="loketc"
                        class="team-thumb wow fadeInUp" data-wow-delay="0.2s"></span></div>
                <div class="counter-info">Loket <br><span style="font-size: 2.00em;" id="konterc"
                        class="team-thumb wow fadeInUp" data-wow-delay="0.2s"></span>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="col-md-4">
            <div class="logo-text team-thumb wow fadeInUp" data-wow-delay="0.2s"><span id="jam"></span>
                <br><span><?php
                            $a_hari   = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
                            $hari     = $a_hari[date("N")];
                            $tanggal  = date("j");
                            $a_bulan  = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            $bulan    = $a_bulan[date("n")];
                            $tahun    = date("Y");
                            echo "" . $hari . ", " . $tanggal . " " . $bulan . " " . $tahun;
                            ?></span>
            </div>
        </div>
        <div class="col-md-8">
            <marquee behavior="scroll" direction="left" scrollamount="5">
                <h3><strong>SELAMAT DATANG DI RS PERMATA KELUARGA LIPPO CIKARANG, "Menghargai Setiap Pribadi, Melayani
                        Sepenuh Hati"</strong></h3>
            </marquee>
        </div>

    </footer>
    <script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script data-pace-options='{ "ajax": false }' src='assets/js/pace.min.js'></script>
    <script type="text/javascript" src="assets/js/marquee.js"></script>
    <script type="text/javascript" src="assets/js/responsivevoice.js"></script>
    <script type="text/javascript">
    window.onload = function() {
        new WOW().init();
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = ' ' + h + ':' + m + ':' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
    </script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
        integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous">
    </script>
    <script>
    // const socket = io('http://192.168.100.254:3000', {
    const socket = io('http://localhost:8080/displayantrianrspklc/', {
        // const socket = io('http://10.0.0.170:8080', {
        transports: ['websocket', 'polling', 'flashsocket']
    });
    socket.on('connect', () => {
        console.log('Connected to Socket.io server');
        socket.on('SiapPanggilAdmisi', (data) => {
            console.log('No Antrian:', data.NoAntrianAdmisi);
            NoAntrianAdmisi = data.NoAntrianAdmisi;
            console.log('Loket:', data.LoketAdmisi);
            LoketAdmisi = data.LoketAdmisi;

            // Update the content of the spans with new data
            let loketAdmisi = data.LoketAdmisi;
            let noAntrianAdmisi = data.NoAntrianAdmisi;

            document.getElementById('loketbesar').textContent = '';
            document.getElementById('konterbesar').textContent = '';
            document.getElementById('loketbesar').textContent = noAntrianAdmisi;
            document.getElementById('konterbesar').textContent = loketAdmisi;

            // Update the correct element based on the value of LoketAdmisi
            if (loketAdmisi.includes('A')) {
                document.getElementById('loketa').textContent = '';
                document.getElementById('kontera').textContent = '';
                document.getElementById('loketa').textContent = noAntrianAdmisi;
                document.getElementById('kontera').textContent = loketAdmisi;
            } else if (loketAdmisi.includes('B')) {
                document.getElementById('loketb').textContent = '';
                document.getElementById('konterb').textContent = '';
                document.getElementById('loketb').textContent = noAntrianAdmisi;
                document.getElementById('konterb').textContent = loketAdmisi;
            } else if (loketAdmisi.includes('C')) {
                document.getElementById('loketc').textContent = '';
                document.getElementById('konterc').textContent = '';
                document.getElementById('loketc').textContent = noAntrianAdmisi;
                document.getElementById('konterc').textContent = loketAdmisi;
            } else if (loketAdmisi.includes('D')) {
                document.getElementById('loketd').textContent = '';
                document.getElementById('konterd').textContent = '';
                document.getElementById('loketd').textContent = noAntrianAdmisi;
                document.getElementById('konterd').textContent = loketAdmisi;
            }


            mainkanBel();
            speakText();

            function speakText() {
                // Create a new SpeechSynthesisUtterance
                var utterance = new SpeechSynthesisUtterance();

                // Check if noAntrianAdmisi contains "C"
                if (noAntrianAdmisi.includes("C")) {
                    // Set the text for Customer Care
                    utterance.text = "Antrian pendaftaran dengan nomor antrian " +
                        noAntrianAdmisi +
                        ", silahkan ke Customer Care, " + loketAdmisi + ".";
                } else {
                    // Set the default text
                    utterance.text = "Antrian pendaftaran dengan nomor antrian " +
                        noAntrianAdmisi +
                        ", silahkan ke loket, " + loketAdmisi + ".";
                }
                // Set the text you want to speak in Indonesian
                //utterance.text = "Antrian pendaftaran dengan nomor antrian " + noAntrianAdmisi + ", silahkan ke loket, " + loketAdmisi + ".";
                // Set the language to Indonesian
                utterance.lang = "id-ID";
                // Specify the desired voice (you may need to check available voices)
                var voices = window.speechSynthesis.getVoices();
                var selectedVoice = voices.find(function(voice) {
                    return voice.lang === "id-ID" && voice.name.includes(
                        "Google Bahasa Indonesia");

                });
                // Set the selected voice
                utterance.voice = selectedVoice;
                utterance.rate = '0.9';
                utterance.pitch = 1;
                console.log('log selected' + selectedVoice);
                // Add the utterance to the speech synthesis queue
                window.speechSynthesis.speak(utterance);
                console.log(utterance.text);
            }
        });
    });

    function mainkanBel() {
        // Create a new audio element
        let suarabel = document.createElement('audio');
        suarabel.src = 'suara/intro.wav'; // Set the source for the audio file
        suarabel.id = 'suarabel'; // Set an ID if needed for further use
        suarabel.style.display = 'none'; // Optional: hide the audio element from the UI

        // Append the audio element to the body
        document.body.appendChild(suarabel);

        // Pause and reset audio to start from the beginning
        suarabel.pause();
        suarabel.currentTime = 0;

        // Play the sound
        suarabel.play();

        // Set the delay for playing the recorded number (optional usage of suarabel's duration)
        totalwaktu = suarabel.duration * 1200;
    }
    </script>
</body>

</html>