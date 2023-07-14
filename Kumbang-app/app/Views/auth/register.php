<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <section class="vh-100" style="background-color: #1F2533;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
          <div class="card" style="border-radius: 1rem;">
            <div class="card-body p-4 text-center">

              <div class="">
                <img src="https://kumbang.sch.id/karir/assets/images/sma.png" class="mb-2" alt="Logo SMA Kumbang" width="80" height="80">
                <p class="fs-6 mb-3">Selamat Datang di </br> Aplikasi Penjadwalan Penggunaan Sarana</p>
                <?php if (session()->has('message')) : ?>
                  <div class="alert alert-success">
                    <?= session('message') ?>
                  </div>
                <?php endif ?>

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
                <form action="<?= route_to('register') ?>" method="post" onsubmit="return validateEmail()">
                  <?= csrf_field() ?>

                  <!-- Tambahkan required pada input field -->
                  <div class="form-outline mb-3">
                    <input type="text" placeholder="Masukkan nama" name="fullname" class="form-control form-control-lg fs-6 <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" value="<?= old('fullname') ?>" required/>
                    <div class="invalid-feedback">
                      <?= session('errors.fullname') ?>
                    </div>
                  </div>

                  <div class="form-outline mb-3">
                    <input type="email" placeholder="Masukkan email" name="email" class="form-control form-control-lg fs-6 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" value="<?= old('email') ?>" required/>
                    <div class="invalid-feedback">
                      <?= session('errors.email') ?>
                    </div>
                  </div>

                  <div class="form-outline mb-3">
                    <input autocomplete="new-password" type="tel" placeholder="Masukkan nomor telepon" name="username" class="form-control form-control-lg fs-6 <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" value="<?= old('username') ?>" />
                    <div class="invalid-feedback">
                      <?= session('errors.username') ?>
                    </div>
                  </div>

                  <div class="form-outline mb-3">
                    <input type="password" placeholder="Masukkan kata sandi" name="password" class="form-control form-control-lg fs-6 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="new-password" />
                    <div class="invalid-feedback">
                      <?= session('errors.password') ?>
                    </div>
                  </div>

                  <div class="form-outline mb-3">
                    <input type="password" placeholder="Masukkan konfirmasi kata sandi" name="pass_confirm" class="form-control form-control-lg fs-6 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off" /> <!-- Ubah id menjadi name -->
                  </div>
                  <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                  </div>
                  <button class="btn btn-outline-dark px-2 mt-2" type="submit">Daftar</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

<script>
  function validateEmail() {
    const emailInput = document.querySelector('input[name="email"]');
    const email = emailInput.value.trim();

    if (email !== '' && !email.endsWith('@mhs.mdp.ac.id')) {
      alert('Domain email yang diizinkan hanya "kumbang.sch.id".');
      emailInput.focus();
      return false;
    }

    return true;
  }
</script>

</html>