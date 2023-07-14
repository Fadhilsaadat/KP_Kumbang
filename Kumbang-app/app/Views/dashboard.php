<?= $this->extend('layout/template') ?>

<?= $this->section('stylesheet') ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel='stylesheet' type='text/css'>

<style type="text/css">
    .dt-buttons {
        width: 100%;
    }
</style>

<style>
    @media screen and (min-width: 480px) {
        .modal {
            padding: 0 350px;
        }
    }

    @media screen and (min-width: 768px) {
        .modal-content {
            width: 400px;
            margin: 0 auto;
        }
    }

    @media screen and (min-width: 1024px) {
        .modal-content {
            width: 600px;
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <p class="fw-bold px-2 py-3">Kalender Penggunaan Sarana</p>
            </div>
            <div class="hero2">
                <div>
                    <div id="calendar" class="px-2"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <p class="fw-bold px-2 py-3">Chart Penggunaan Sarana</p>
            </div>
            <div class="hero2">
                <div>
                    <!-- Button untuk membuka modal -->
                    <div class="d-grid gap-2 justify-content-end">
                        <button id="openModalBtn" class="fw-bold">Pilih Sarana</button>
                    </div>

                    <!-- Modal -->
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p class="fw-bold fs-6">Pilih Sarana Yang Ingin Ditampilkan</p>
                            <div id="checkbox-container" class="justify-content-between">
                                <!-- Tambahkan kode berikut untuk "Check All" -->
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="check-all" id="checkAll">
                                    <label class="checkbox-label fw-bold" for="checkAll">
                                        Check All
                                    </label>
                                </div>
                                <!-- Tambahkan kode berikut untuk "Clear Check" -->
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="clear-check" id="clearCheck">
                                    <label class="checkbox-label fw-bold" for="clearCheck">
                                        Clear Check
                                    </label>
                                </div>
                            </div>
                            <div id="checkbox-container" class="justify-content-between">
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Spare Room 1" id="series1">
                                    <label class="checkbox-label" for="series1">
                                        Ruang Spare Room 1
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Spare Room 2" id="series2">
                                    <label class="checkbox-label" for="series2">
                                        Ruang Spare Room 2
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Atrium SD" id="series3">
                                    <label class="checkbox-label" for="series3">
                                        Atrium SD
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas X.1" id="series4">
                                    <label class="checkbox-label" for="series4">
                                        Kelas X.1
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas X.2" id="series5">
                                    <label class="checkbox-label" for="series5">
                                        Kelas X.2
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas X.3" id="series6">
                                    <label class="checkbox-label" for="series6">
                                        Kelas X.3
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas X.4" id="series7">
                                    <label class="checkbox-label" for="series7">
                                        Kelas X.4
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas X.5" id="series8">
                                    <label class="checkbox-label" for="series8">
                                        Kelas X.5
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas X.6" id="series9">
                                    <label class="checkbox-label" for="series9">
                                        Kelas X.6
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas X.7" id="series10">
                                    <label class="checkbox-label" for="series10">
                                        Kelas X.7
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XI.1" id="series11">
                                    <label class="checkbox-label" for="series11">
                                        Kelas XI.1
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XI.2" id="series12">
                                    <label class="checkbox-label" for="series12">
                                        Kelas XI.2
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XI.3" id="series13">
                                    <label class="checkbox-label" for="series13">
                                        Kelas XI.3
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XI.4" id="series14">
                                    <label class="checkbox-label" for="series14">
                                        Kelas XI.4
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XI.5" id="series15">
                                    <label class="checkbox-label" for="series15">
                                        Kelas XI.5
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XI.6" id="series16">
                                    <label class="checkbox-label" for="series16">
                                        Kelas XI.6
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XI.7" id="series17">
                                    <label class="checkbox-label" for="series17">
                                        Kelas XI.7
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XII.1" id="series18">
                                    <label class="checkbox-label" for="series18">
                                        Kelas XII.1
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XII.2" id="series19">
                                    <label class="checkbox-label" for="series19">
                                        Kelas XII.2
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XII.3" id="series20">
                                    <label class="checkbox-label" for="series20">
                                        Kelas XII.3
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XII.4" id="series21">
                                    <label class="checkbox-label" for="series21">
                                        Kelas XII.4
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XII.5" id="series22">
                                    <label class="checkbox-label" for="series22">
                                        Kelas XII.5
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XII.6" id="series23">
                                    <label class="checkbox-label" for="series23">
                                        Kelas XII.6
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kelas XII.7" id="series24">
                                    <label class="checkbox-label" for="series24">
                                        Kelas XII.7
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Teater" id="series25">
                                    <label class="checkbox-label" for="series25">
                                        Teater
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang OSIS/Wakasis" id="series26">
                                    <label class="checkbox-label" for="series26">
                                        Ruang OSIS/Wakasis
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Laboratorium" id="series27" checked>
                                    <label class="checkbox-label" for="series27">
                                        Ruang Laboratorium
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Laboratorium Kimia" id="series28" checked>
                                    <label class="checkbox-label" for="series28">
                                        Laboratorium Kimia
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Laboratorium Fisika" id="series29" checked>
                                    <label class="checkbox-label" for="series29">
                                        Laboratorium Fisika
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Laboratorium Komputer" id="series30" checked>
                                    <label class="checkbox-label" for="series30">
                                        Laboratorium Komputer
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Laboratorium Biologi" id="series31" checked>
                                    <label class="checkbox-label" for="series31">
                                        Laboratorium Biologi
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Laboratorium Bahasa" id="series32" checked>
                                    <label class="checkbox-label" for="series32">
                                        Laboratorium Bahasa
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Tamu" id="series33">
                                    <label class="checkbox-label" for="series33">
                                        Ruang Tamu
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="IT, Multimedia & Marketing" id="series34">
                                    <label class="checkbox-label" for="series34">
                                        IT, Multimedia & Marketing
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang UKS" id="series35">
                                    <label class="checkbox-label" for="series35">
                                        Ruang UKS
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Yayasan" id="series36">
                                    <label class="checkbox-label" for="series36">
                                        Ruang Yayasan
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Guru" id="series37">
                                    <label class="checkbox-label" for="series37">
                                        Ruang Guru
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Kepsek" id="series38">
                                    <label class="checkbox-label" for="series38">
                                        Ruang Kepsek
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Wakakur" id="series39">
                                    <label class="checkbox-label" for="series39">
                                        Ruang Wakakur
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Wakasar" id="series40">
                                    <label class="checkbox-label" for="series40">
                                        Ruang Wakasar
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Serbaguna SMA" id="series41">
                                    <label class="checkbox-label" for="series41">
                                        Ruang Serbaguna SMA
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Kuliner" id="series42">
                                    <label class="checkbox-label" for="series42">
                                        Ruang Kuliner
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Ruang Musik" id="series43">
                                    <label class="checkbox-label" for="series43">
                                        Ruang Musik
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Perpustakaan" id="series44">
                                    <label class="checkbox-label" for="series44">
                                        Perpustakaan
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kantin" id="series45">
                                    <label class="checkbox-label" for="series45">
                                        Kantin
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Lapangan Badminton" id="series46" checked>
                                    <label class="checkbox-label" for="series46">
                                        Lapangan Badminton
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Lapangan Tenis Meja" id="series47" checked>
                                    <label class="checkbox-label" for="series47">
                                        Lapangan Tenis Meja
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Kolam Renang" id="series48">
                                    <label class="checkbox-label" for="series48">
                                        Kolam Renang
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Lapangan Basket" id="series49" checked>
                                    <label class="checkbox-label" for="series49">
                                        Lapangan Basket
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Lapangan Voli" id="series50" checked>
                                    <label class="checkbox-label" for="series50">
                                        Lapangan Voli
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Lapangan Tenis" id="series51" checked>
                                    <label class="checkbox-label" for="series51">
                                        Lapangan Tenis
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Lapangan Senam" id="series52" checked>
                                    <label class="checkbox-label" for="series52">
                                        Lapangan Senam
                                    </label>
                                </div>
                                <div class="checkbox-row">
                                    <input class="checkbox-input" type="checkbox" value="Lapangan Futsal" id="series53" checked>
                                    <label class="checkbox-label" for="series53">
                                        Lapangan Futsal
                                    </label>
                                </div>
                            </div>
                            <button id="applyBtn" class="mt-2 fw-bold">Terapkan</button>
                        </div>
                    </div>
                    <div id="chart" class="chart" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive hero">
        <table id="example" class="display table-bordered">
            <thead>
                <tr style="background:#ECF2FF">
                    <th class="text-center">No</th>
                    <th class="text-center">Penanggung Jawab</th>
                    <th class="text-center">Jumlah Orang Terlibat</th>
                    <th class="text-center">Hari Tanggal</th>
                    <th class="text-center">Waktu Awal</th>
                    <th class="text-center">Waktu Akhir</th>
                    <th class="text-center">Tempat yang dipakai</th>
                    <th class="text-center">Peralatan</th>
                    <th class="text-center">Kegunaan</th>
                    <!-- <th class="text-center">Status</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($pengajuan as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['penanggung_jawab'] ?></td>
                        <td><?= $row['orang_terlibat'] ?></td>
                        <td><?= $row['hari_tanggal'] ?></td>
                        <td><?= $row['waktu_awal'] ?></td>
                        <td><?= $row['waktu_akhir'] ?></td>
                        <td><?= $row['Tempat_yang_dipakai'] ?></td>
                        <td><?= $row['peralatan'] ?></td>
                        <td><?= $row['kegunaan'] ?></td>
                        <!-- <td><?= $row['status'] ?></td> -->
                        <!-- <td>
                        <a href="<?= base_url('pengajuan/edit/' . $row['id_pengajuan']) ?>" class="btn btn-primary btn-sm">

                            <i class="bi bi-pencil-fill"></i> Edit
                        </a>
                    </td> -->
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
        <div id="eventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div id="eventInfo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>

    <?= $this->section('script') ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script>
        // table search
        $(document).ready(function() {
            $('#example').DataTable({
                columnDefs: [{
                        targets: [0, 1, 2, 4, 5, 6, 7, 8],
                        orderable: false
                    } // Menggunakan indeks kolom (dimulai dari 0) untuk menentukan kolom yang akan dinonaktifkan pengurutannya
                ],
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 4, 5, 6, 7, 8] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'csv',
                    },
                    {
                        extend: 'excel',
                    }
                ]
            });

            var calendarEl = document.getElementById('calendar');
            moment.locale('id'); // Mengatur lokalitas (locale) ke bahasa Indonesia

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    // start: 'dayGridMonth,timeGridWeek,timeGridDay',
                    start: 'title',
                    end: 'prevYear,prev,next,nextYear today'
                    // end: 'prev,next today'
                },
                dayMaxEventRows: true, // for all non-TimeGrid views
                views: {
                    timeGrid: {
                        dayMaxEventRows: 6 // adjust to 6 only for timeGridWeek/timeGridDay
                    }
                },
                titleFormat: {
                    year: 'numeric',
                    month: 'long'
                },
                editable: true,
                // selectable: true,
                // select: function(info) {
                //     window.location.href = '/event/add';
                // },
                eventClick: function(info) {
                    var startDateFormat = moment(info.event.start);
                    var endDateFormat = moment(info.event.end);

                    var startDate = startDateFormat.format('D MMM YYYY'); // Mengambil tanggal awal
                    var endDate = endDateFormat.format('D MMM YYYY'); // Mengambil tanggal akhir
                    // console.log
                    var startTime = startDateFormat.isValid() ? startDateFormat.format('HH:mm') : ''; // Mengambil jam awal
                    var endTime = endDateFormat.isValid() ? endDateFormat.format('HH:mm') : ''; // Mengambil jam akhir

                    var eventTitle = info.event.title; // Judul acara
                    var penanggungJawab = info.event.extendedProps.penanggung_jawab; // Judul acara

                    // console.log(info.event);
                    var eventDateTime = '';
                    if (startDate === endDate) {
                        // Acara berlangsung hanya pada satu hari
                        eventDateTime = startDate + ' ' + startTime + ' - ' + endTime;
                    } else {
                        // Acara berlangsung lebih dari satu hari
                        eventDateTime = startDate + ' ' + startTime + ' - ' + endDate + ' ' + endTime;
                    }

                    // Membuat modal dengan menggunakan Bootstrap
                    // Membuat konten info event dengan HTML dan gaya CSS
                    var eventInfo = '<div class="event-info">' +
                        '<h5><strong>Tempat Yang Dipakai :</strong></h5>' +
                        '<p class="event-title">' + eventTitle + '</p>' +
                        '<div class="event-details">' +
                        '<h5><strong>Tanggal dan Waktu :</strong></h5>' +
                        '<p>' + eventDateTime + '</p>' +
                        '<h5><strong>Penanggung Jawab :</strong></h5>' +
                        '<p>' + penanggungJawab + '</p>' +
                        '</div>' +
                        '</div>';

                    // Menambahkan modal ke dalam elemen body
                    $('#eventInfo').html(eventInfo);
                    $('#eventModal').modal('show');
                },
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: false
                },
                eventContent: function(info) {
                    var startDateFormat = moment(info.event.start);
                    var endDateFormat = moment(info.event.end);

                    var startDate = startDateFormat.format('D MMM YYYY'); // Mengambil tanggal awal
                    var endDate = endDateFormat.format('D MMM YYYY'); // Mengambil tanggal akhir
                    // console.log
                    var startTime = startDateFormat.isValid() ? startDateFormat.format('HH:mm') : ''; // Mengambil jam awal
                    var endTime = endDateFormat.isValid() ? endDateFormat.format('HH:mm') : ''; // Mengambil jam akhir

                    var dateContent = '';
                    // Acara berlangsung hanya pada satu hari
                    dateContent = startTime + ' - ' + endTime;

                    var eventTitle = info.event.title; // Judul acara
                    var penanggungJawab = info.event.extendedProps.penanggung_jawab; // Judul acara
                    return {
                        html: '<div class="fc-event-content">' + dateContent + ' | ' + eventTitle + ' | ' + penanggungJawab + '</div>'
                    };
                },
                events: <?= json_encode($calender_event) ?>,
                // events: events,
                height: 450,
                // contentHeight: 400
            });
            calendar.render();

            // chart
            var options = {
                series: [{
                        name: 'Ruang Spare Room 1',
                        data: <?= json_encode(@$ruang_spare_room_1) ?>
                    },
                    {
                        name: 'Ruang Spare Room 2',
                        data: <?= json_encode(@$ruang_spare_room_2) ?>
                    },
                    {
                        name: 'Atrium SD',
                        data: <?= json_encode(@$atrium_sd) ?>
                    },
                    {
                        name: 'Kelas X.1',
                        data: <?= json_encode(@$kelas_x_1) ?>
                    },
                    {
                        name: 'Kelas X.2',
                        data: <?= json_encode(@$kelas_x_2) ?>
                    },
                    {
                        name: 'Kelas X.3',
                        data: <?= json_encode(@$kelas_x_3) ?>
                    },
                    {
                        name: 'Kelas X.4',
                        data: <?= json_encode(@$kelas_x_4) ?>
                    },
                    {
                        name: 'Kelas X.5',
                        data: <?= json_encode(@$kelas_x_5) ?>
                    },
                    {
                        name: 'Kelas X.6',
                        data: <?= json_encode(@$kelas_x_6) ?>
                    },
                    {
                        name: 'Kelas X.7',
                        data: <?= json_encode(@$kelas_x_7) ?>
                    },
                    {
                        name: 'Kelas XI.1',
                        data: <?= json_encode(@$kelas_xi_1) ?>
                    },
                    {
                        name: 'Kelas XI.2',
                        data: <?= json_encode(@$kelas_xi_2) ?>
                    },
                    {
                        name: 'Kelas XI.3',
                        data: <?= json_encode(@$kelas_xi_3) ?>
                    },
                    {
                        name: 'Kelas XI.4',
                        data: <?= json_encode(@$kelas_xi_4) ?>
                    },
                    {
                        name: 'Kelas XI.5',
                        data: <?= json_encode(@$kelas_xi_5) ?>
                    },
                    {
                        name: 'Kelas XI.6',
                        data: <?= json_encode(@$kelas_xi_6) ?>
                    },
                    {
                        name: 'Kelas XI.7',
                        data: <?= json_encode(@$kelas_xi_7) ?>
                    },
                    {
                        name: 'Kelas XII.1',
                        data: <?= json_encode(@$kelas_xii_1) ?>
                    },
                    {
                        name: 'Kelas XII.2',
                        data: <?= json_encode(@$kelas_xii_2) ?>
                    },
                    {
                        name: 'Kelas XII.3',
                        data: <?= json_encode(@$kelas_xii_3) ?>
                    },
                    {
                        name: 'Kelas XII.4',
                        data: <?= json_encode(@$kelas_xii_4) ?>
                    },
                    {
                        name: 'Kelas XII.5',
                        data: <?= json_encode(@$kelas_xii_5) ?>
                    },
                    {
                        name: 'Kelas XII.6',
                        data: <?= json_encode(@$kelas_xii_6) ?>
                    },
                    {
                        name: 'Kelas XII.7',
                        data: <?= json_encode(@$kelas_xii_7) ?>
                    },
                    {
                        name: 'Teater',
                        data: <?= json_encode(@$teater) ?>
                    },
                    {
                        name: 'Ruang OSIS/Wakasis',
                        data: <?= json_encode(@$ruang_osis_wakasis) ?>
                    },
                    {
                        name: 'Ruang Laboratorium',
                        data: <?= json_encode(@$ruang_laboratorium) ?>
                    },
                    {
                        name: 'Laboratorium Kimia',
                        data: <?= json_encode(@$laboratorium_kimia) ?>
                    },
                    {
                        name: 'Laboratorium Fisika',
                        data: <?= json_encode(@$laboratorium_fisika) ?>
                    },
                    {
                        name: 'Laboratorium Komputer',
                        data: <?= json_encode(@$laboratorium_komputer) ?>
                    },
                    {
                        name: 'Laboratorium Biologi',
                        data: <?= json_encode(@$laboratorium_biologi) ?>
                    },
                    {
                        name: 'Laboratorium Bahasa',
                        data: <?= json_encode(@$laboratorium_bahasa) ?>
                    },
                    {
                        name: 'Ruang Tamu',
                        data: <?= json_encode(@$ruang_tamu) ?>
                    },
                    {
                        name: 'IT, Multimedia & Marketing',
                        data: <?= json_encode(@$it_multimedia_marketing) ?>
                    },
                    {
                        name: 'Ruang UKS',
                        data: <?= json_encode(@$ruang_uks) ?>
                    },
                    {
                        name: 'Ruang Yayasan',
                        data: <?= json_encode(@$ruang_yayasan) ?>
                    },
                    {
                        name: 'Ruang Tamu',
                        data: <?= json_encode(@$ruang_tamu) ?>
                    },
                    {
                        name: 'Ruang Guru',
                        data: <?= json_encode(@$ruang_guru) ?>
                    },
                    {
                        name: 'Ruang Kepsek',
                        data: <?= json_encode(@$ruang_kepsek) ?>
                    },
                    {
                        name: 'Ruang Wakakur',
                        data: <?= json_encode(@$ruang_wakakur) ?>
                    },
                    {
                        name: 'Ruang Wakasar',
                        data: <?= json_encode(@$ruang_wakasar) ?>
                    },
                    {
                        name: 'Ruang Serbaguna SMA',
                        data: <?= json_encode(@$ruang_serbaguna_sma) ?>
                    },
                    {
                        name: 'Ruang Kuliner',
                        data: <?= json_encode(@$ruang_kuliner) ?>
                    },
                    {
                        name: 'Ruang musik',
                        data: <?= json_encode(@$ruang_musik) ?>
                    },
                    {
                        name: 'Perpustakaan',
                        data: <?= json_encode(@$perpustakaan) ?>
                    },
                    {
                        name: 'Kantin',
                        data: <?= json_encode(@$kantin) ?>
                    },
                    {
                        name: 'Lapangan Badminton',
                        data: <?= json_encode(@$lapangan_badminton) ?>
                    },
                    {
                        name: 'Lapangan Tenis Meja',
                        data: <?= json_encode(@$lapangan_tenis_meja) ?>
                    },
                    {
                        name: 'Kolam Renang',
                        data: <?= json_encode(@$kolam_renang) ?>
                    },
                    {
                        name: 'Lapangan Basket',
                        data: <?= json_encode(@$lapangan_basket) ?>
                    },
                    {
                        name: 'Lapangan Voli',
                        data: <?= json_encode(@$lapangan_voli) ?>
                    },
                    {
                        name: 'Lapangan Tenis',
                        data: <?= json_encode(@$lapangan_tenis) ?>
                    },
                    {
                        name: 'Lapangan Senam',
                        data: <?= json_encode(@$lapangan_senam) ?>
                    },
                    {
                        name: 'Lapangan Futsal',
                        data: <?= json_encode(@$lapangan_futsal) ?>
                    },
                ],
                chart: {
                    height: 450,
                    type: 'line',
                    dropShadow: {
                        enabled: true,
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    zoom: {
                        enabled: false
                    },
                },
                colors: [
                    '#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50',
                    '#8BC34A', '#CDDC39', '#FFEB3B', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B', '#000000',
                    '#FFFFFF', '#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#00FFFF', '#FF00FF', '#990000', '#009900', '#000099',
                    '#999900', '#990099', '#009999', '#996600', '#660099', '#009966', '#660000', '#006600', '#000066', '#663300',
                    '#333300', '#330033', '#663366', '#336633', '#003300', '#003333', '#333399', '#003366', '#330066', '#660033'
                ],
                dataLabels: {
                    enabled: true,
                    background: {
                        enabled: true,
                    },
                    dropShadow: {
                        enabled: false,
                    },
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    type: 'datetime',
                    labels: {
                        format: 'MMM yyyy'
                    },
                },
                yaxis: {
                    min: 1,
                    max: 30
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetY: 0,
                    offsetX: -20,
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val.toFixed(0) + ' pengguna';
                        }
                    },
                }
            };
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();

            // Dapatkan elemen-elemen yang diperlukan
            var openModalBtn = document.getElementById("openModalBtn");
            var modal = document.getElementById("myModal");
            var closeButton = document.getElementsByClassName("close")[0];
            var applyButton = document.getElementById("applyBtn");
            var checkboxContainer = document.getElementById("checkbox-container");

            // Fungsi untuk membuka modal
            openModalBtn.addEventListener("click", function() {
                modal.style.display = "block";
            });

            // Fungsi untuk menutup modal
            closeButton.addEventListener("click", function() {
                modal.style.display = "none";
            });

            // Implementasikan fungsi "Check All"
            $("#checkAll").click(function() {
                $(".checkbox-input").prop("checked", true);
            });

            // Implementasikan fungsi "Clear Check"
            $("#clearCheck").click(function() {
                $(".checkbox-input").prop("checked", false);
            });

            // Ambil elemen checkbox
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');

            // Fungsi untuk memperbarui tampilan chart berdasarkan status checkbox terakhir
            function updateChart() {
                var selectedSeries = [];
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        selectedSeries.push(checkbox.value);
                    }
                });
                var filteredSeries = options.series.filter(function(series) {
                    return selectedSeries.includes(series.name);
                });
                chart.updateSeries(filteredSeries);
            }

            // Tambahkan event listener pada checkbox
            // Fungsi untuk menerapkan perubahan checkbox
            applyButton.addEventListener('click', function() {
                updateChart();
            });

            // Saat halaman dimuat kembali, perbarui tampilan chart berdasarkan status checkbox terakhir
            window.addEventListener('load', function() {
                updateChart();
            });
        });
    </script>

    <?= $this->endSection() ?>