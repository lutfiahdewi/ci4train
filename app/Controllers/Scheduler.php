<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\SchedulerModel;

class Scheduler extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new SchedulerModel();
        $data['schedule'] = $model->orderBy('gerbong', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new SchedulerModel();
        $data = [
            'keberangkatan' => $this->request->getVar('keberangkatan'),
            'jamk' => $this->request->getVar('jamk'),
            'tujuan' => $this->request->getVar('tujuan'),
            'jamt' => $this->request->getVar('jamt'),
            'harga'  => $this->request->getVar('harga'),
            'kapasitas'  => $this->request->getVar('kapasitas'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data schedule berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single user
    public function show($gerbong = null)
    {
        $model = new SchedulerModel();
        $data = $model->where('gerbong', $gerbong)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($gerbong = null)
    {
        $model = new SchedulerModel();
        $gerbong = $this->request->getVar('gerbong');
        $data = [
            'keberangkatan' => $this->request->getVar('keberangkatan'),
            'jamk' => $this->request->getVar('jamk'),
            'tujuan' => $this->request->getVar('tujuan'),
            'jamt' => $this->request->getVar('jamt'),
            'harga'  => $this->request->getVar('harga'),
            'kapasitas'  => $this->request->getVar('kapasitas'),
        ];
        $model->update($gerbong, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($gerbong = null)
    {
        $model = new SchedulerModel();
        $data = $model->where('gerbong', $gerbong)->delete($gerbong);
        if ($data) {
            $model->delete($gerbong);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}

// Kode diatas berisi 5 method, yaitu:
// index() – Berfungsi untuk menampilkan seluruh data pada database.
// create() – Berfungsi untuk menambahkan data baru ke database.
// show() – Berfungsi untuk menampilkan suatu data spesifik dari database.
// update() – Berfungsi untuk mengubah suatu data pada database.
// delete() – Berfungsi untuk menghapus data dari database