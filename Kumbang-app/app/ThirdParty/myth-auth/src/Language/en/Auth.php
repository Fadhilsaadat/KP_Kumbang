<?php

namespace Myth\Auth\Language\id;

return [
    // Exceptions
    'invalidModel'        => 'Model {0} harus dimuat sebelum digunakan.',
    'userNotFound'        => 'Tidak dapat menemukan pengguna dengan ID = {0, number}.',
    'noUserEntity'        => 'Entity Pengguna harus disediakan untuk validasi kata sandi.',
    'tooManyCredentials'  => 'Anda hanya dapat memvalidasi 1 kredensial selain kata sandi.',
    'invalidFields'       => 'Kolom "{0}" tidak dapat digunakan untuk validasi kredensial.',
    'unsetPasswordLength' => 'Anda harus mengatur pengaturan `minimumPasswordLength` dalam file konfigurasi Otentikasi.',
    'unknownError'        => 'Maaf, kami mengalami masalah saat mengirim email kepada Anda. Silakan coba lagi nanti.',
    'notLoggedIn'         => 'Anda harus login untuk mengakses halaman tersebut.',
    'notEnoughPrivilege'  => 'Anda tidak memiliki izin yang cukup untuk mengakses halaman tersebut.',

    // Registration
    'registerDisabled' => 'Maaf, pembuatan akun pengguna baru tidak diizinkan saat ini.',
    'registerSuccess'  => 'Selamat datang! Silakan masuk dengan akun yang telah Anda buat.',
    'registerCLI'      => 'Pengguna baru dibuat: {0}, #{1}',

    // Activation
    'activationNoUser'       => 'Tidak dapat menemukan pengguna dengan kode aktivasi tersebut.',
    'activationSubject'      => 'Aktivasi akun Anda',
    'activationSuccess'      => 'Harap konfirmasi akun Anda dengan mengklik tautan aktivasi dalam email yang kami kirimkan.',
    'activationResend'       => 'Kirim ulang pesan aktivasi sekali lagi.',
    'notActivated'           => 'Akun pengguna ini belum diaktifkan.',
    'errorSendingActivation' => 'Gagal mengirim pesan aktivasi ke: {0}',

    // Login
    'badAttempt'      => 'Tidak dapat login. Silakan periksa kredensial Anda.',
    'loginSuccess'    => 'Selamat datang kembali!',
    'invalidPassword' => 'Tidak dapat login. Silakan periksa kata sandi Anda.',

    // Forgotten Passwords
    'forgotDisabled'  => 'Opsi pengaturan ulang kata sandi dinonaktifkan.',
    'forgotNoUser'    => 'Tidak dapat menemukan pengguna dengan email tersebut.',
    'forgotSubject'   => 'Instruksi Reset Kata Sandi',
    'resetSuccess'    => 'Kata sandi Anda telah berhasil diubah. Silakan login dengan kata sandi baru.',
    'forgotEmailSent' => 'Token keamanan telah dikirimkan ke email Anda. Masukkan token tersebut di kotak di bawah untuk melanjutkan.',
    'errorEmailSent'  => 'Gagal mengirimkan email dengan instruksi reset kata sandi ke: {0}',
    'errorResetting'  => 'Gagal mengirimkan instruksi reset ke {0}',

    // Passwords
    'errorPasswordLength'         => 'Kata sandi harus memiliki panjang setidaknya {0, number} karakter.',
    'suggestPasswordLength'       => 'Frasa kata sandi - hingga 255 karakter - membuat kata sandi yang lebih aman dan mudah diingat.',
    'errorPasswordCommon'         => 'Kata sandi tidak boleh merupakan kata sandi umum.',
    'suggestPasswordCommon'       => 'Kata sandi telah diperiksa terhadap lebih dari 65.000 kata sandi yang umum digunakan atau kata sandi yang bocor melalui peretasan.',
    'errorPasswordPersonal'       => 'Kata sandi tidak boleh mengandung informasi pribadi yang di-hash ulang.',
    'suggestPasswordPersonal'     => 'Variasi alamat email atau nama pengguna Anda tidak boleh digunakan sebagai kata sandi.',
    'errorPasswordTooSimilar'     => 'Kata sandi terlalu mirip dengan nama pengguna.',
    'suggestPasswordTooSimilar'   => 'Jangan menggunakan bagian dari nama pengguna Anda dalam kata sandi Anda.',
    'errorPasswordPwned'          => 'Kata sandi {0} telah terpapar karena pelanggaran data dan telah dilihat {1, number} kali pada {2} dari kata sandi yang tercompromi.',
    'suggestPasswordPwned'        => '{0} seharusnya tidak pernah digunakan sebagai kata sandi. Jika Anda menggunakannya di mana pun, segera ubah.',
    'errorPasswordPwnedDatabase'  => 'basis data',
    'errorPasswordPwnedDatabases' => 'basis data',
    'errorPasswordEmpty'          => 'Kata sandi dibutuhkan.',
    'passwordChangeSuccess'       => 'Kata sandi berhasil diubah',
    'userDoesNotExist'            => 'Kata sandi tidak diubah. Pengguna tidak ada',
    'resetTokenExpired'           => 'Maaf. Token reset Anda telah kadaluarsa.',

    // Groups
    'groupNotFound' => 'Tidak dapat menemukan grup: {0}.',

    // Permissions
    'permissionNotFound' => 'Tidak dapat menemukan izin: {0}',

    // Banned
    'userIsBanned' => 'Pengguna telah diblokir. Hubungi administrator',

    // Too many requests
    'tooManyRequests' => 'Terlalu banyak permintaan. Harap tunggu {0, number} detik.',

    // Login views
    'home'                      => 'Beranda',
    'current'                   => 'Saat ini',
    'forgotPassword'            => 'Lupa Kata Sandi?',
    'enterEmailForInstructions' => 'Tidak masalah! Masukkan email Anda di bawah ini dan kami akan mengirimkan instruksi untuk mereset kata sandi Anda.',
    'email'                     => 'Email',
    'emailAddress'              => 'Alamat Email',
    'sendInstructions'          => 'Kirim Instruksi',
    'loginTitle'                => 'Login',
    'loginAction'               => 'Login',
    'rememberMe'                => 'Ingat Saya',
    'needAnAccount'             => 'Butuh akun?',
    'forgotYourPassword'        => 'Lupa kata sandi Anda?',
    'password'                  => 'Kata Sandi',
    'repeatPassword'            => 'Ulangi Kata Sandi',
    'emailOrUsername'           => 'Email atau nama pengguna',
    'username'                  => 'Nama Pengguna',
    'register'                  => 'Daftar',
    'signIn'                    => 'Masuk',
    'alreadyRegistered'         => 'Sudah terdaftar?',
    'weNeverShare'              => 'Kami tidak akan pernah membagikan email Anda kepada orang lain.',
    'resetYourPassword'         => 'Reset Kata Sandi Anda',
    'enterCodeEmailPassword'    => 'Masukkan kode yang Anda terima melalui email, alamat email Anda, dan kata sandi baru Anda.',
    'token'                     => 'Token',
    'newPassword'               => 'Kata Sandi Baru',
    'newPasswordRepeat'         => 'Ulangi Kata Sandi Baru',
    'resetPassword'             => 'Reset Kata Sandi',
];
