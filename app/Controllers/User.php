<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController

{
    protected $userModel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
    }


    public function index()
    {
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        // $list = $this->usermodel->findAll();

        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $orang = $this->usermodel->search($keyword);
        } else {
            $orang = $this->usermodel;
        }

        $data = [
            'title' => 'Perpusku | Users',
            'nav' => 'user',
            // 'list' => $orang->getUser(),
            'list' => $this->usermodel->paginate(5, 'user'),
            'pager' => $this->usermodel->pager,
            'currentpage' => $currentPage,
        ];
        // dd($data);

        return view('admin/user', $data);
        //return view('welcome_message');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Perpusku | Detail User',
            'nav' => 'user',
            'user' => $this->usermodel->getUser($id),
        ];

        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User Tidak Ditemukan');
        }

        // dd($data);
        return view('admin/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Perpusku | Tambah Data User',
            'nav' => 'user',
        ];
        // d($this->request->getVar(''));

        return view('admin/create', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());
        $this->usermodel->save([
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'avatar' => $this->request->getVar('avatar'),
            'jenis_kelamin_' => $this->request->getVar('jenis_kelamin_'),

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/user');
    }
}
