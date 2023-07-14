<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Gaya khusus untuk perangkat dengan lebar maksimum 576px -->
  <style>
    @media (max-width: 576px) {
      .card {
        width: 100%;
        border-radius: 0;
      }
    }
  </style>
</head>

<body>
   <!-- Bagian utama halaman dengan kelas vh-100 untuk tinggi 100% viewport -->
  <section class="vh-100" style="background-color: #1F2533;">
  <!-- Kontainer Bootstrap untuk mengatur tata letak -->
    <div class="container py-5 h-100">
       <!-- Baris dengan tata letak fleksibel -->
      <div class="row d-flex justify-content-center align-items-center h-100">
         <!-- Kolom dengan lebar yang bervariasi sesuai dengan ukuran perangkat -->
        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
           <!-- Kartu Bootstrap dengan style radius sudut -->
          <div class="card" style="border-radius: 1rem;">
            <div class="card-body p-4 text-center">
              <!-- Konten utama halaman -->
              <div>
                <img src="https://kumbang.sch.id/karir/assets/images/sma.png" class="mb-2" alt="Logo SMA Kumbang" width="80" height="80">
                <p class="fs-6 mb-4">Selamat Datang di </br> Aplikasi Penjadwalan Penggunaan Sarana</p>
                 <!-- PHP: Jika sesi memiliki pesan sukses, tampilkan kotak sukses -->
                <?php if (session()->has('message')) : ?>
                  <div class="alert alert-success">
                    <?= session('message') ?>
                  </div>
                <?php endif ?>
                 <!-- PHP: Jika sesi memiliki pesan kesalahan, tampilkan kotak kesalahan -->
                <?php if (session()->has('error')) : ?>
                  <div class="alert alert-danger">
                    <?= session('error') ?>
                  </div>
                <?php endif ?>
                <!-- <?php if (session()->has('errors')) : ?>
                  <ul class="alert alert-danger">
                    <?php foreach (session('errors') as $error) : ?>
                      <li><?= $error ?></li>
                    <?php endforeach ?>
                  </ul>
                <?php endif ?> -->
                <!-- Form login dengan metode POST yang mengarahkan ke rute 'login' -->
                <form method="POST" action="<?= route_to('login') ?>">
                  <?= csrf_field() ?>
                  <div class="form-outline mb-3">
                    <div class="form-group">
                      <!-- Input email/telepon dengan validasi dan pesan kesalahan -->
                      <!-- <label for="login"><?= lang('Auth.emailOrUsername') ?></label> -->
                      <input type="text" class="form-control form-control-lg fs-6 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Masukkan email/nomor telepon">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                    <!-- <input type="tel" name="username" placeholder="Masukkan nomor telepon" id="typePhone" class="form-control form-control-lg fs-6" /> -->
                  </div>
                  <div class="form-outline mb-3">
                    <div class="form-group">
                      <!-- <label for="password"><?= lang('Auth.password') ?></label> -->
                      <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Masukkan kata sandi">
                      <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                      </div>
                      <!-- PHP: Jika reset password aktif, tampilkan tautan lupa password -->
                      <?php if ($config->activeResetter) : ?>
                        <div class="float-left mt-2">
                          <a href="<?= route_to('forgot') ?>" class="text-muted">Lupa Password?</a>
                        </div>
                      <?php endif; ?>
                    </div>
                    <!-- <input type="password" name="password" placeholder="Masukkan kata sandi" id="typePassword" class="form-control form-control-lg fs-6" /> -->
                  </div>
                  <!-- Paragraf dengan tautan ke halaman pendaftaran -->
                  <div>
                    <p class="mt-2">Belum memiliki akun? <a href="/register" class="fw-bold">Daftar</a></p>
                  </div>
                  <button class="btn btn-outline-dark px-2 mt-2" type="submit">Masuk</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>