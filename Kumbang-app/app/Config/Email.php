<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'padildummy1@gmail.com'; //  Alamat email pengirim default.
    public string $fromName   = 'Admin Pengajuan'; // Nama pengirim default.

    public string $recipients = ''; //Daftar penerima email. Dapat berisi alamat email yang dipisahkan oleh koma (,).

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter'; // Nama "user agent" yang akan digunakan saat mengirim email.

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp'; // Protokol pengiriman email yang akan digunakan. Pilihan yang tersedia adalah 'mail', 'sendmail', atau 'smtp'.

    /**
     * The server path to Sendmail.
     */
    public string $mailPath = '/usr/sbin/sendmail'; //  Path server untuk Sendmail jika menggunakan protokol 'sendmail'.

    /**
     * SMTP Server Address
     */
    public string $SMTPHost = 'smtp.gmail.com'; // Alamat server SMTP.

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'padildummy1@gmail.com'; //  Username untuk autentikasi SMTP.

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'chcywfafatzjbxiq'; //  Password untuk autentikasi SMTP.

    /**
     * SMTP Port
     */
    public int $SMTPPort = 465; // Port server SMTP.

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 5; //  Waktu timeout dalam detik untuk koneksi SMTP.

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false; // Mengaktifkan atau menonaktifkan koneksi SMTP persisten.

    /**
     * SMTP Encryption. Either tls or ssl
     */
    public string $SMTPCrypto = 'ssl'; //  Metode enkripsi yang akan digunakan untuk koneksi SMTP. Pilihan yang tersedia adalah 'tls' atau 'ssl'.

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true; // Mengaktifkan atau menonaktifkan pembungkus kata.

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76; // Jumlah karakter pada setiap baris saat pembungkusan kata diaktifkan.

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html'; // Tipe email yang akan dikirim. Pilihan yang tersedia adalah 'text' atau 'html'.

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8'; // Set karakter yang akan digunakan.

    /**
     * Whether to validate the email address
     */
    public bool $validate = false; // Mengaktifkan atau menonaktifkan validasi alamat email.

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3; // Prioritas email. Angka 1 adalah prioritas tertinggi, 5 adalah prioritas terendah, dan 3 adalah prioritas normal.

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n"; // Karakter baru yang digunakan dalam email. Menggunakan "\r\n" sesuai dengan RFC 822.

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n"; // Karakter baru yang digunakan dalam email. Menggunakan "\r\n" sesuai dengan RFC 822.

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false; // Mengaktifkan atau menonaktifkan mode BCC batch.

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200; // Jumlah email dalam setiap batch BCC.

    /**
     * Enable notify message from server
     */
    public bool $DSN = false; // Mengaktifkan atau menonaktifkan pesan notifikasi dari server.
}
