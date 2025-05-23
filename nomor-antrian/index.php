<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Antrian Berbasis Web">
    <meta name="author" content="Ramdhan Syaifulloh">

    <!-- Title -->
    <title>Aplikasi Antrian Front Office </title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
    /* Container untuk tulisan berjalan */
    .marquee-container {
        position: relative;
        overflow: hidden;
        background-color: #198754;
        color: white;
        height: 2.5rem;
        width: 100vw;
        /* Full lebar layar */
        z-index: 1000;
        /* Pastikan di atas elemen lain */
    }

    /* Teks berjalan */
    .running-text {
        white-space: nowrap;
        display: inline-block;
        position: absolute;
        animation: berjalan 15s linear infinite;
        left: 70%;
        top: 50%;
        transform: translateY(-100%);
    }

    @keyframes berjalan {
        from {
            transform: translateX(0%) translateY(-50%);
        }

        to {
            transform: translateX(-100%) translateY(-50%);
        }
    }

    /* Jam Digital */
    #jam-digital {
        font-family: 'Courier New', Courier, monospace;
    }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- TULISAN BERJALAN FULL SCREEN -->
    <div class="marquee-container">
        <div class="running-text fs-5 fw-semibold px-3">
            Selamat datang di sistem antrian pendaftaran RS. Permata Keluarga Lippo Cikarang. Silakan ambil nomor sesuai
            jenis layanan Anda.
        </div>
    </div>

    <!-- TANGGAL & JAM DIGITAL -->
    <div class="bg-light text-center py-2 shadow-sm">
        <span id="tanggal-hari" class="fw-bold text-success me-3"></span>
        <span id="jam-digital" class="fw-bold text-success"></span>
    </div>


    <!-- JAM DIGITAL -->
    <!-- <div class="bg-light text-center py-2 shadow-sm">
        <span id="jam-digital" class="fw-bold fs-4 text-success"></span>
    </div> -->

    <!-- KONTEN ANTRIAN -->
    <main class="flex-shrink-0">
        <div class="container pt-5 px-3">
            <div class=" row justify-content-center g-4">
                <!-- ANTRIAN BPJS -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center d-grid p-4">
                            <div class="border border-success rounded-2 py-2 mb-4">
                                <h3 class="pt-4">ANTRIAN BPJS</h3>
                                <h1 id="antrian-bpjs" class="display-1 fw-bold text-success lh-1 pb-2">0</h1>
                            </div>
                            <a id="insert-bpjs" href="javascript:void(0)"
                                class="btn btn-success rounded-pill fs-5 px-4 py-3">
                                <i class="bi bi-person-plus fs-4 me-2"></i> Ambil Nomor
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ANTRIAN Asuransi/PT -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center d-grid p-4">
                            <div class="border border-success rounded-2 py-2 mb-4">
                                <h3 class="pt-4">ANTRIAN ASURANSI / PERUSAHAAN</h3>
                                <h1 id="antrian-pt" class="display-1 fw-bold text-success lh-1 pb-2">0</h1>
                            </div>
                            <a id="insert-pt" href="javascript:void(0)"
                                class="btn btn-success rounded-pill fs-5 px-4 py-3">
                                <i class="bi bi-person-plus fs-4 me-2"></i> Ambil Nomor
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ANTRIAN Umum -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center d-grid p-4">
                            <div class="border border-success rounded-2 py-2 mb-4">
                                <h3 class="pt-4">ANTRIAN UMUM</h3>
                                <h1 id="antrian-umum" class="display-1 fw-bold text-success lh-1 pb-2">0</h1>
                            </div>
                            <a id="insert-umum" href="javascript:void(0)"
                                class="btn btn-success rounded-pill fs-5 px-4 py-3">
                                <i class="bi bi-person-plus fs-4 me-2"></i> Ambil Nomor
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <!-- <footer class="footer mt-auto py-4">
        <div class="container">
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2025 - <a href="https://www.instagram.com/_rasya44/" target="_blank"
                    class="text-danger text-decoration-none">RS. Permata Keluarga Lippo Cikarang</a>.
            </div>
        </div>
    </footer> -->

    <!-- jQuery Core -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>

    <script>
    function updateTanggalJam() {
        const hariList = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const bulanList = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        const now = new Date();
        const hari = hariList[now.getDay()];
        const tanggal = now.getDate();
        const bulan = bulanList[now.getMonth()];
        const tahun = now.getFullYear();

        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');

        document.getElementById('tanggal-hari').textContent = `${hari}, ${tanggal} ${bulan} ${tahun}`;
        document.getElementById('jam-digital').textContent = `${jam}:${menit}:${detik}`;
    }

    setInterval(updateTanggalJam, 1000);
    updateTanggalJam();
    </script>


    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />


    <!-- <script>
    function updateJam() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('jam-digital').textContent = `${jam}:${menit}:${detik}`;
    }

    setInterval(updateJam, 1000);
    updateJam();
    </script> -->


    <script type="text/javascript">
    $(document).ready(function() {
        // tampilkan jumlah antrian
        $('#antrian').load('get_antrian.php');

        // proses insert data
        $('#insert').on('click', function() {
            $.ajax({
                type: 'POST', // mengirim data dengan method POST
                url: 'insert.php', // url file proses insert data
                success: function(result) { // ketika proses insert data selesai
                    // jika berhasil
                    if (result === 'Sukses') {
                        // tampilkan jumlah antrian
                        $('#antrian').load('get_antrian.php').fadeIn('slow');
                    }
                },
            });
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#insert-bpjs').on('click', function() {
            kirimAntrian('bpjs');
        });

        $('#insert-pt').on('click', function() {
            kirimAntrian('pt');
        });

        $('#insert-umum').on('click', function() {
            kirimAntrian('umum');
        });

        //     function cetakTiket(nomor, jenis, waktu) {
        //         const printWindow = window.open('', '', 'width=280,height=500');
        //         printWindow.document.write('<html><head> <title>Cetak Tiket</title> ');
        //         printWindow.document.write('<style>');
        //         printWindow.document.write(`
        //     @media print {
        //         body {
        //             width: 80mm;
        //             font-family: monospace;
        //             font-size: 12pt;
        //             text-align: center;
        //             margin: 0;
        //             padding: 5px;
        //         }
        //         .logo {
        //             max-width: 60px;
        //             margin-bottom: 5px;
        //         }
        //         .title {
        //             font-size: 14pt;
        //             font-weight: bold;
        //             margin: 0;
        //         }
        //         .alamat {
        //             font-size: 10pt;
        //             margin-bottom: 10px;
        //         }
        //         .nomor {
        //             font-size: 32pt;
        //             font-weight: bold;
        //             margin: 10px 0;
        //         }
        //         .jenis, .waktu {
        //             font-size: 11pt;
        //             margin: 4px 0;
        //         }
        //         .footer {
        //             font-size: 10pt;
        //             margin-top: 20px;
        //             border-top: 1px dashed #000;
        //             padding-top: 10px;
        //         }
        //     }
        // `);
        //         printWindow.document.write('</style></head><body>');

        //         // Logo & Header Klinik
        //         // printWindow.document.write('<img src="assets/img/rspklc.png" class="logo" alt="Logo"><br>');
        //         const logoUrl = window.location.origin + '/aplikasi_antrian/assets/img/rspklc.png';

        //         printWindow.document.write('<img src="' + logoUrl + '" class="logo" alt="Logo"><br>');

        //         printWindow.document.write('<div class="title">RS. Permata Keluarga Lippo Cikarang</div>');
        //         printWindow.document.write(
        //             '<div class="alamat">Alamat: Jl. MH. Thamrin No.129, Cibatu, Cikarang Sel., Kabupaten Bekasi, Jawa Barat 17550</div>'
        //         );

        //         // Nomor Antrian
        //         printWindow.document.write('<div class="nomor">' + nomor + '</div>');

        //         // Info Tambahan
        //         printWindow.document.write('<div class="jenis">Layanan: ' + jenis + '</div>');
        //         printWindow.document.write('<div class="waktu">Waktu: ' + waktu + '</div>');

        //         // Footer
        //         printWindow.document.write('<div class="footer">Harap tunggu panggilan.<br>Terima kasih.</div>');

        //         printWindow.document.write('</body></html>');
        //         printWindow.document.close();
        //         printWindow.focus();
        //         printWindow.print();
        //         printWindow.close();
        //     }

        function cetakTiket(nomor, jenis, waktu) {
            const printWindow = window.open('', '', 'width=580,height=500');
            const logoUrl = window.location.origin + '/aplikasi_antrian/assets/img/rspklc.png';

            printWindow.document.write('<html><head><title>Cetak Tiket</title>');
            printWindow.document.write('<style>');
            printWindow.document.write(`
            @media print {
                body {
                    width: 80mm;
                    font-family: monospace;
                    font-size: 12pt;
                    text-align: center;
                    margin: 0;
                    padding: 5px;
                }
                .logo {
                    max-width: 200px;
                    margin-bottom: 5px;
                }
                .title {
                    font-size: 10pt;
                    font-style: italic;
                    margin: 0;
                }
                .alamat {
                    font-size: 8pt;
                    font-style: italic;
                    margin-bottom: 10px;
                }
                .nomor {
                    font-size: 32pt;
                    font-weight: bold;
                    margin: 10px 0;
                }
                .waktu {
                    font-size: 8pt;
                    margin: 4px 0; 
                }
                .jenis {
                    font-size: 11pt;
                    margin: 4px 0;
                }
                .footer {
                    font-size: 10pt;
                    margin-top: 20px;
                    border-top: 1px dashed #000;
                    padding-top: 10px;
                }
            }
        `);
            printWindow.document.write('</style></head><body>');

            // Konten Tiket
            printWindow.document.write('<img src="' + logoUrl + '" class="logo" alt="Logo"><br>');
            // printWindow.document.write('<div class="title">RS. Permata Keluarga Lippo Cikarang</div>');
            printWindow.document.write(
                '<div class="alamat">Jl. MH. Thamrin No.129, Cibatu, Cikarang Sel., Kabupaten Bekasi, Jawa Barat 17550</div>'
            );
            printWindow.document.write('<div class="nomor">' + nomor + '</div>');
            printWindow.document.write('<div class="jenis">Layanan: ' + jenis + '</div>');
            printWindow.document.write('<div class="waktu">Waktu ambil antrian: ' + waktu + '</div>');
            printWindow.document.write('<div class="footer">Harap tunggu panggilan.<br>Terima kasih.</div>');

            // Script untuk auto print dan auto close
            printWindow.document.write('<script>');
            printWindow.document.write(`
            window.onload = function() {
                setTimeout(() => {
                    window.print();
                    window.close();
                }, 500);
            };
        `);
            printWindow.document.write('<\/script>');

            printWindow.document.write('</body></html>');
            printWindow.document.close();
        }







        function kirimAntrian(jenis) {
            $.ajax({
                type: 'POST',
                url: 'insert.php',
                data: {
                    jenis: jenis
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        updateAntrian(jenis);
                        cetakTiket(response.nomor, response.jenis, response.waktu);
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Gagal menghubungi server.');
                }
            });
        }


        function updateAntrian(jenis) {
            $.get('get_antrian.php', {
                jenis: jenis
            }, function(data) {
                $('#antrian-' + jenis).text(data);
            });
        }

        // Panggil saat halaman pertama kali dimuat
        ['bpjs', 'pt', 'umum'].forEach(function(jenis) {
            updateAntrian(jenis);
        });
    });
    </script>



</body>

</html>