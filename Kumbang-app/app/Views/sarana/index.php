<?= $this->extend('layout/template') ?>

<?= $this->section('stylesheet') ?>

<style>
    @media screen and (min-width: 768px) and (max-width: 991px) {
        .col-md-2 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media screen and (min-width: 992px) and (max-width: 1199px) {
        .col-lg-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="/assets/dist/img/kolam-renang.jpg" class="d-block w-100 c-img rounded" alt="images">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kolam Renang</h5>
                </div>
            </div>
            <div class="carousel-item c-item">
                <img src="/assets/dist/img/lab-sains-biologi.jpg" class="d-block w-100 c-img rounded" alt="images">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ruang Laboratorium Sains dan Biologi</h5>
                </div>
            </div>
            <div class="carousel-item c-item">
                <img src="/assets/dist/img/ruang-kuliner.jpg" class="d-block w-100 c-img rounded" alt="images">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ruang Kuliner</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="d-flex align-items-center">
        <h6 class="fw-bold ms-2">Sarana & Prasarana SMA Kusuma Bangsa Palembang</h6>
    </div>
    <div class="row gy-3">
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Laboratorium Komputer dan Internet</p>
                </div>
                <img src="/assets/dist/img/lab-komputer-internet.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Laboratorium Sains dan Biologi</p>
                </div>
                <img src="/assets/dist/img/lab-sains-biologi.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Laboratorium Kimia</p>
                </div>
                <img src="/assets/dist/img/lab-kimia.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Laboratorium Fisika</p>
                </div>
                <img src="/assets/dist/img/lab-fisika.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Laboratorium Bahasa</p>
                </div>
                <img src="/assets/dist/img/lab-bahasa.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Lapangan Bulutangkis Indoor</p>
                </div>
                <img src="/assets/dist/img/img-kompres/lap-bulutangkis-2.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Lapangan Tenis</p>
                </div>
                <img src="/assets/dist/img/img-kompres/lap-tenis.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Lapangan Basket</p>
                </div>
                <img src="/assets/dist/img/img-kompres/lap-basket.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Lapangan Voli</p>
                </div>
                <img src="/assets/dist/img/img-kompres/lap-voli.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Lapangan Futsal</p>
                </div>
                <img src="/assets/dist/img/img-kompres/lap-futsal.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Lapangan Tenis Meja</p>
                </div>
                <img src="/assets/dist/img/img-kompres/lap-tenis-meja.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Lapangan Senam</p>
                </div>
                <img src="/assets/dist/img/lap-voli.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kolam Renang</p>
                </div>
                <img src="/assets/dist/img/kolam-renang.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kantin</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kantin2.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Perpustakaan</p>
                </div>
                <img src="/assets/dist/img/img-kompres/perpustakaan.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Pertemuan dan Diskusi</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-diskusi.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Kuliner</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-kuliner.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">IT, Multimedia & Marketing</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-multimedia.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Musik</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-musik.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Serbaguna SMA</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-tamu.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Gedung Serbaguna Gedung B</p>
                </div>
                <img src="/assets/dist/img/ruang-serbaguna-b.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Guru</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-guru.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Kepala Sekolah</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-kepsek.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Wakil Kepala Kurikulum</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-wakakur.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Yayasan</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-yayasan.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Wakil Kepala Sarana</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-wakasar.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang UKS</p>
                </div>
                <img src="/assets/dist/img/ruang-uks.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang OSIS</p>
                </div>
                <img src="/assets/dist/img/img-kompres/ruang-osis.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Teater</p>
                </div>
                <img src="/assets/dist/img/img-kompres/teater2.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Atrium SD</p>
                </div>
                <img src="/assets/dist/img/img-kompres/atrium-sd.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XII.1</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas2.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XII.2</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas3.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XII.3</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas2.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XII.4</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas3.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XII.5</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas2.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XI.1</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas4.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XI.2</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas6.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XI.3</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas4.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XI.4</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas6.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Kelas XI.5</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas4.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Spare Room 1</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-6">
            <div class="card" style="background-color: #1F2533;">
                <div class="card-body">
                    <p class="card-text text-white f-img">Ruang Spare Room 2</p>
                </div>
                <img src="/assets/dist/img/img-kompres/kelas.jpg" class="card-img c-img2" alt="images">
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>