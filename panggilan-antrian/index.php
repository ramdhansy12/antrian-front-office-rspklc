<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Antrian Berbasis Web">
    <meta name="author" content="Ramdhan Syaifulloh">
    <title>Aplikasi Antrian Berbasis Web</title>

    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container pt-4">
            <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                <div class="d-flex align-items-center me-md-auto">
                    <i class="bi-mic-fill text-success me-3 fs-3"></i>
                    <h1 class="h5 pt-2">Panggilan Antrian</h1>
                </div>
                <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
                    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item" aria-current="page">Antrian</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-start">
                                <i class="bi-people text-warning fs-2 me-3"></i>
                                <div>
                                    <p id="jumlah-antrian" class="fs-3 text-warning mb-1"></p>
                                    <p class="mb-0">Jumlah Antrian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-start">
                                <i class="bi-person-check text-success fs-2 me-3"></i>
                                <div>
                                    <p id="antrian-sekarang" class="fs-3 text-success mb-1"></p>
                                    <p class="mb-0">Antrian Sekarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-start">
                                <i class="bi-person-plus text-info fs-2 me-3"></i>
                                <div>
                                    <p id="antrian-selanjutnya" class="fs-3 text-info mb-1"></p>
                                    <p class="mb-0">Antrian Selanjutnya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-start">
                                <i class="bi-person text-danger fs-2 me-3"></i>
                                <div>
                                    <p id="sisa-antrian" class="fs-3 text-danger mb-1"></p>
                                    <p class="mb-0">Sisa Antrian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="tabel-antrian" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor Antrian</th>
                                    <th>Jenis Antrian</th>
                                    <th>Status</th>
                                    <th>Panggil</th>
                                    <th>Loket</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-4">
        <div class="container">
            <hr class="my-4">
            <div class="text-center mb-2">
                &copy; 2025 - <a href="https://www.instagram.com/_rasya44/" target="_blank"
                    class="text-danger text-decoration-none">Rasya</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <audio id="tingtung" src="../assets/audio/tingtung.mp3"></audio>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

    <script>
    $(document).ready(function() {
        const bell = document.getElementById('tingtung');

        function loadInfo() {
            $('#jumlah-antrian').load('get_jumlah_antrian.php');
            $('#antrian-sekarang').load('get_antrian_sekarang.php');
            $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
            $('#sisa-antrian').load('get_sisa_antrian.php');
            $('#display-antrian').load('get_display_antrian.php')
        }

        loadInfo();

        const table = $('#tabel-antrian').DataTable({
            lengthChange: false,
            searching: false,
            ajax: 'get_antrian.php',
            columns: [{
                    data: 'no_antrian',
                    className: 'text-center'
                },
                {
                    data: 'jenis',
                    className: 'text-center',
                    render: data => ({
                        bpjs: 'BPJS',
                        pt: 'Asuransi / Perusahaan',
                        umum: 'Umum'
                    } [data] || '-')
                },
                {
                    data: 'status',
                    visible: false
                },
                {
                    data: null,
                    className: 'text-center',
                    orderable: false,
                    render: data => {
                        if (!data.status) return '-';
                        const btnClass = data.status === '0' ? 'btn-success' : 'btn-secondary';
                        return `
                            <div class="btn-group">
                                <button class="btn ${btnClass} btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bi bi-mic-fill"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item panggil" data-loket="1">Loket 1</button></li>
                                    <li><button class="dropdown-item panggil" data-loket="2">Loket 2</button></li>
                                    <li><button class="dropdown-item panggil" data-loket="3">Loket 3</button></li>
                                </ul>
                            </div>`;
                    }
                },
                {
                    data: 'loket',
                    className: 'text-center',
                    render: data => data ? `Loket ${data}` : '-'
                }
            ]
        });

        $('#tabel-antrian tbody').on('click', '.panggil', function() {
            const loket = $(this).data('loket');
            const data = table.row($(this).closest('tr')).data();
            const jenisMap = {
                bpjs: 'BPJS',
                pt: 'Asuransi atau Perusahaan',
                umum: 'Umum'
            };

            bell.pause();
            bell.currentTime = 0;
            bell.play();

            setTimeout(() => {
                responsiveVoice.speak(
                    `Nomor Antrian, ${data.no_antrian}, layanan, ${jenisMap[data.jenis] || '-'}, silakan menuju loket ${loket}`,
                    'Indonesian Male', {
                        rate: 0.9,
                        pitch: 1,
                        volume: 1
                    });

                $.post('update.php', {
                    id: data.id,
                    loket
                }, function(res) {
                    if (res.success) {
                        loadInfo();
                        table.ajax.reload(null, false);
                    } else {
                        alert('Gagal update status: ' + res.error);
                    }
                }, 'json');
            }, 1500);
        });
        setInterval(() => {
            const isDropdownOpen = $('.dropdown-menu.show').length > 0;
            if (!isDropdownOpen) {
                loadInfo();
                table.ajax.reload(null, false);
            }
        }, 3000); // Ubah menjadi 3 detik agar tidak terlalu sering reload


    });
    </script>
</body>

</html>