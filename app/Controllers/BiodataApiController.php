<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\BiodataModel;

class BiodataApiController extends ResourceController
{
    public function index()
    {
        $model = new BiodataModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    public function detail($id = null)
    {
        $model = new BiodataModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if (!$data) {
            return $this->failNotFound('Data dengan ID ' . $id . ' tidak ditemukan');
        }

        return $this->respond($data);
    }

    public function create()
    {
        $model = new BiodataModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'pendidikan' => $this->request->getPost('pendidikan'),
        ];

        $model->insert($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => ['success' => 'Data disimpan']
        ];

        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $model = new BiodataModel();
        $json = $this->request->getJSON();

        if ($json) {
            $data = [
                'nama' => $json->nama,
                'tempat_lahir' => $json->tempat_lahir,
                'tanggal_lahir' => $json->tanggal_lahir,
                'alamat' => $json->alamat,
                'no_telepon' => $json->no_telepon,
                'jenis_kelamin' => $json->jenis_kelamin,
                'pendidikan' => $json->pendidikan,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama' => $input['nama'],
                'tempat_lahir' => $input['tempat_lahir'],
                'tanggal_lahir' => $input['tanggal_lahir'],
                'alamat' => $input['alamat'],
                'no_telepon' => $input['no_telepon'],
                'jenis_kelamin' => $input['jenis_kelamin'],
                'pendidikan' => $input['pendidikan'],
            ];
        }

        $model->update($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => ['success' => 'Data diperbarui']
        ];

        return $this->respondUpdated($response);
    }

    public function delete($id = null)
    {
        $model = new BiodataModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => ['success' => 'Data dihapus']
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data dengan ID ' . $id . ' tidak ditemukan');
        }
    }
}
