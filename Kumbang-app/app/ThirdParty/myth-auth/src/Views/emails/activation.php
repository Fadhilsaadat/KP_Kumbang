<p>Ini adalah email aktivasi untuk akun Anda di <?= site_url() ?>.</p>

<p>Untuk mengaktifkan akun Anda, gunakan URL ini.</p>

<p><a href="<?= url_to('activate-account') . '?token=' . $hash ?>">Aktivasi</a>.</p>

<br>

<p>Jika Anda tidak terdaftar di situs web ini, Anda dapat mengabaikan email ini dengan aman.</p>