<?php
if (!function_exists('post')) {
  function post($var = null)
  {
    // Mengambil instance dari objek Request
    $request = \Config\Services::request();
     // Mengembalikan nilai dari POST data dengan kunci yang diberikan
    return $request->getPost($var);
  }
}

if (!function_exists('uuid')) {
  function uuid()
  {
    // UUID namespace yang digunakan
    $namesp = '11111111-1111-1111-1111-111111111111';

    // Mendapatkan waktu saat ini dan nomor acak sebagai nama
    $name = mt_rand(0, 0xffff) . microtime();

    // Memeriksa apakah UUID namespace valid
    if (!is_uuidvalid($namesp)) return false;

    // Mengubah UUID namespace menjadi string biner
    $nhex = str_replace(array('-', '{', '}'), '', $namesp);
    $nstr = '';

    for ($i = 0; $i < strlen($nhex); $i += 2) {
      $nstr .= chr(hexdec($nhex[$i] . $nhex[$i + 1]));
    }

    // Membuat hash dari namespace dan nama
    $hash = sha1($nstr . $name);

    // Menghasilkan UUID v4 dari hash yang dihasilkan
    return sprintf(
      '%08s-%04s-%04x-%04x-%12s',
      substr($hash, 0, 8),
      substr($hash, 8, 4),
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
      substr($hash, 20, 12)
    );
  }
}

if (!function_exists('is_uuidvalid')) {
  function is_uuidvalid($uuid)
  {
    // Memeriksa apakah UUID valid
    return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?' .
      '[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
  }
}

if (!function_exists('templateEmail')) {
  function templateEmail($nama = '', $isi = '')
  {
    // $konten = '<h4><strong>Halo '.$nama.',</strong></h4>';
    // Membuat konten email dengan menggabungkan nama dan isi
    $konten = '';
    $konten .= $isi;
    $konten .= '<br> <br> <strong>Regard,<strong/><br> <strong>Pengajuan Penjadwalan Sarana
      <strong/>';
    return $konten;
  }
}

if (!function_exists('sendingEmail')) {
  function sendingEmail($to = '', $subject = '', $messages = '')
  {
    // Menggunakan service Email dari CodeIgniter
    $email = \Config\Services::email();

    // Mengatur pengirim email
    $email->setFrom('padildummy1@gmail.com', 'Pengajuan Admin');

     // Mengatur penerima email
    $email->setTo($to);

    // Mengatur subjek email
    $email->setSubject($subject);

    // Mengatur isi pesan email
    $email->setMessage($messages);
    // dd($email->send());

    // Mengirim email
    if (!$email->send()) {

      // Jika terjadi kesalahan, mencetak pesan debug
      $error = $email->printDebugger();
      // 
    } else {
      $error = '';
    }
  }
}
