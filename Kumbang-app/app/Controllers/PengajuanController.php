<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengajuan;

class PengajuanController extends BaseController
{
    protected $mRequest;

    public function __construct()
    {
        $this->mRequest = service("request");
    }

    public function index()
    {
        // dd(user()->id);
        $data['title'] = 'Pengajuan';

        // Membuat instance dari model Pengajuan
        $model = new Pengajuan();

        // Membuat kondisi WHERE untuk query berdasarkan user yang sedang login
        $where = "";
        if (in_groups("user")) {
            $where = "WHERE p.user_id='" . user()->id . "'";
        }
        // dd($where);

        // Mengambil data pengajuan dari database berdasarkan kondisi WHERE
        $data['pengajuan'] = $this->db->query("SELECT *
        FROM pengajuan p
        $where")->getResultArray();
        // $data['pengajuan'] = $model->orderBy('hari_tanggal', 'DESC')->findAll();

        // Menampilkan view pengajuan/index dengan data yang telah diambil
        return view('pengajuan/index', $data);
    }

    public function create()
    {
        // Opsi tempat yang dapat dipilih
        $tempatOptions = [
            'Ruang Spare Room 1',
            'Ruang Spare Room 2',
            'Atrium SD',
            'Kelas X.1',
            'Kelas X.2',
            'Kelas X.3',
            'Kelas X.4',
            'Kelas X.5',
            'Kelas X.6',
            'Kelas X.7',
            'Kelas XI.1',
            'Kelas XI.2',
            'Kelas XI.3',
            'Kelas XI.4',
            'Kelas XI.5',
            'Kelas XI.6',
            'Kelas XI.7',
            'Kelas XII.1',
            'Kelas XII.2',
            'Kelas XII.3',
            'Kelas XII.4',
            'Kelas XII.5',
            'Kelas XII.6',
            'Kelas XII.7',
            'Teater',
            'Ruang OSIS/Wakasis',
            'Ruang Laboratorium',
            'Laboratorium Kimia',
            'Laboratorium Fisika',
            'Laboratorium Komputer',
            'Laboratorium Biologi',
            'Laboratorium Bahasa',
            'Ruang Tamu',
            'IT, Multimedia & Marketing',
            'Ruang UKS',
            'Ruang Yayasan',
            'Ruang Guru',
            'Ruang Kepsek',
            'Ruang Wakakur',
            'Ruang Wakasar',
            'Ruang Serbaguna SMA',
            'Ruang Kuliner',
            'Ruang Musik',
            'Perpustakaan',
            'Kantin',
            'Lapangan Badminton',
            'Lapangan Tenis Meja',
            'Kolam Renang',
            'Lapangan Basket',
            'Lapangan Voli',
            'Lapangan Tenis',
            'Lapangan Senam',
            'Lapangan Futsal',
        ];
        $data['tempatOptions'] = $tempatOptions;
        // Menampilkan view create dengan data opsi tempat
        echo view('create', $data);
    }

    public function store()
    {
        $request = \Config\Services::request();

        // Membuat instance dari model Pengajuan
        $model = new Pengajuan();
        $data['pengajuan'] = $model->findAll();
        // echo view('pengajuan/index', $data);

        // Mengambil data yang dikirim melalui POST request
        $data = [
            // data pengajuan
            'penanggung_jawab' => user()->fullname,
            'user_id' => user()->id,
            'orang_terlibat' => $this->request->getPost('orang_terlibat'),
            'hari_tanggal' => $this->request->getPost('hari_tanggal'),
            'waktu_awal' => $this->request->getPost('waktu_awal'),
            'waktu_akhir' => $this->request->getPost('waktu_akhir'),
            'Tempat_yang_dipakai' => $this->request->getPost('Tempat_yang_dipakai'),
            'peralatan' => $this->request->getPost('peralatan'),
            'kegunaan' => $this->request->getPost('kegunaan'),
            'status' => $this->request->getPost('status') ?: 'Menunggu validasi', // set default value to "Menunggu validasi" if status is not provided
        ];
        // dd($data);
        // Check if the selected room is already booked
        // Melakukan validasi apakah ruangan yang dipilih sudah terpesan pada waktu yang sama
        $isRoomBooked = $model->where('Tempat_yang_dipakai', $data['Tempat_yang_dipakai'])
            ->where('hari_tanggal', $data['hari_tanggal'])
            ->where('waktu_awal <=', $data['waktu_akhir'])
            ->where('waktu_akhir >=', $data['waktu_awal'])
            ->first();

        if ($isRoomBooked) {
            // Room is already booked
            // Jika ruangan sudah terpesan, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Ruangan sudah dipesan pada waktu tersebut. Silakan pilih waktu yang lain.');
        }
        // Menyimpan data pengajuan ke database
        $model->save($data);
        // Redirect ke halaman pengajuan setelah berhasil menyimpan
        return redirect()->to('/pengajuan');
    }

    public function edit()
    {
        $model = new Pengajuan();
        $id = $this->request->uri->getSegment(3);

        // Mengambil data pengajuan berdasarkan ID
        $data['pengajuan'] = $model->find($id);

        // Menampilkan view pengajuan/edit dengan data pengajuan yang telah diambil
        echo view('pengajuan/edit', $data);
    }

    public function update($id)
    {
        $request = service('request');
        $model = new Pengajuan();

        // Mengambil data yang dikirim melalui HTTP PUT request
        $data = [
            // data pengajuan
            'status' => $request->getVar('status') ?: 'Menunggu validasi', // set default value to "Menunggu validasi" if status is not provided
        ];

        // Mengupdate data pengajuan di database berdasarkan ID
        $model->update($id, $data);

        // Mengambil data pengajuan yang baru diupdate
        $pengajuan = $model->find($id);

        // Mengambil data pengguna yang terkait dengan pengajuan
        $users = $this->db->table('users')->getWhere(['id' => $pengajuan['user_id']])->getRow();

        // Mengirim email notifikasi berdasarkan status pengajuan
        if ($request->getVar('status') == 'Telah disetujui') {
            sendingEmail($users->email, 'Permintaan Pengajuan Penggunaan Sarana', 'Permintaan Pengajuan Anda Telah Disetujui');
        } else {
            sendingEmail($users->email, 'Permintaan Pengajuan Penggunaan Sarana', 'Permintaan Pengajuan Anda Telah Ditolak');
        }

        // Redirect ke halaman pengajuan setelah berhasil mengupdate
        return redirect()->to('/pengajuan');
    }

    public function delete()
    {
        $model = new Pengajuan();
        $id = $this->request->uri->getSegment(3);

        // Menghapus data pengajuan dari database berdasarkan ID
        $model->delete($id);

        // Redirect ke halaman pengajuan setelah berhasil menghapus
        return redirect()->to('/pengajuan');
    }
}
