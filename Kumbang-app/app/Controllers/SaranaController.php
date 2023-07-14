<?php

namespace App\Controllers;

use App\Models\SaranaModel;
use CodeIgniter\Controller;

class SaranaController extends Controller
{
    protected $mRequest;

    public function __construct()
    {
        $this->mRequest = service("request");
    }

    // public function index()
    // {
    //     $model = new SaranaModel();
    //     $data['sarana'] = $model->findAll();
    //     $data['title'] = 'Sarana & Prasarana';
    //     return view('sarana/index', $data);
    // }

    public function index()
    {
        // Menampilkan halaman index untuk sarana dan prasarana
        $data['title'] = 'Sarana & Prasarana';
        return view('sarana/index', $data);
    }


    public function create()
    {
        // Menampilkan halaman create untuk membuat sarana baru
        return view('create');
    }

    public function store()
    {
        $model = new SaranaModel();

        // Mengambil data yang dikirim melalui POST request
        $data = [
            'nama_sarana' => $this->mRequest->getPost('nama_sarana')
        ];

        // Menyimpan data sarana ke database
        $model->save($data);

        // Redirect ke halaman index sarana setelah berhasil menyimpan
        return redirect()->to('/sarana');
    }

    public function edit($id)
    {
        $model = new SaranaModel();

        // Mengambil data sarana berdasarkan ID yang dikirim melalui URL
        $data['sarana'] = $model->find($id);

        // Menampilkan halaman edit dengan data sarana yang telah diambil
        return view('edit', $data);
    }

    public function update()
    {
        $model = new SaranaModel();
        $id = $this->mRequest->getVar('id');

        // Mengambil data yang dikirim melalui POST request
        $data = [
            'nama_sarana' => $this->mRequest->getPost('nama_sarana')
        ];

        // Mengupdate data sarana di database berdasarkan ID
        $model->update($id, $data);

        // Redirect ke halaman index sarana setelah berhasil mengupdate
        return redirect()->to('/sarana');
    }

    public function delete($id)
    {
        $model = new SaranaModel();

        // Menghapus data sarana dari database berdasarkan ID yang dikirim melalui URL
        $model->delete($id);

        // Redirect ke halaman index sarana setelah berhasil menghapus
        return redirect()->to('/sarana');
    }
}
