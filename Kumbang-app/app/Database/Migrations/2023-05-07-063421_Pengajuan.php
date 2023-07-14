<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengajuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengajuan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'penanggung_jawab' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'orang_terlibat' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'hari_tanggal' => [
                'type' => 'DATE'
            ],
            'waktu_awal' => [
                'type' => 'TIME'
            ],
            'waktu_akhir' => [
                'type' => 'TIME'
            ],
            'Tempat_yang_dipakai' => [
                'type' => 'ENUM',
                'constraint' => [ 'Ruang Spare Room 1', 'Ruang Spare Room 2', 'Atrium SD', 'Kelas X.1', 'Kelas X.2', 'Kelas X.3', 'Kelas X.4',
                'Kelas X.5', 'Kelas X.6', 'Kelas X.7', 'Kelas XI.1', 'Kelas XI.2', 'Kelas XI.3',
                'Kelas XI.4', 'Kelas XI.5','Kelas XI.6','Kelas XI.7', 'Kelas XII.1', 'Kelas XII.2', 'Kelas XII.3', 'Kelas XII.4',
                'Kelas XII.5','Kelas XII.6','Kelas XII.7', 'Teater', 'Ruang OSIS/Wakasis', 'Ruang Laboratorium', 'Laboratorium Kimia',
                'Laboratorium Fisika', 'Laboratorium Komputer', 'Laboratorium Biologi', 'Laboratorium Bahasa',
                'Ruang Tamu', 'IT, Multimedia & Marketing', 'Ruang UKS', 'Ruang Yayasan', 'Ruang Guru',
                'Ruang Kepsek', 'Ruang Wakakur', 'Ruang Wakasar', 'Ruang Serbaguna SMA', 'Ruang Kuliner',
                'Ruang Musik', 'Perpustakaan', 'Kantin', 'Lapangan Badminton', 'Lapangan Tenis Meja',
                'Kolam Renang', 'Lapangan Basket', 'Lapangan Voli', 'Lapangan Tenis', 'Lapangan Senam',
                'Lapangan Futsal']
            ],
            'peralatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'kegunaan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Menunggu validasi', 'Disetujui', 'Dibatalkan', 'Ditolak'],
                'default' => 'Menunggu validasi'
            ]
        ]);
        $this->forge->addPrimaryKey('id_pengajuan');
        $this->forge->createTable('pengajuan');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan');
    }
}