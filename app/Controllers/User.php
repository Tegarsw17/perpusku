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
            'list' => $orang->paginate(5, 'user'),
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
        // session();
        $data = [
            'title' => 'Perpusku | Tambah Data User',
            'nav' => 'user',
            'validation' => \Config\Services::validation()
        ];
        // d($this->request->getVar(''));

        return view('admin/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'avatar' => [
                'rules' => 'max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
                'errors' => []
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/user/create')->withInput()->with('validation', $validation);
        }

        // $hashPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        // dd($this->request->getFile('avatar')->getName());
        if ($this->request->getFile('avatar')->getName() != '') {
            $avatar = $this->request->getFile('avatar');
            $namaavatar = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/img/', $namaavatar);
        } else {
            $namaavatar = 'default.jpg';
        }


        // dd($this->request->getVar());
        $this->usermodel->save([
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => sha1($this->request->getVar('password')),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'avatar' => $namaavatar,
            'jenis_kelamin_' => $this->request->getVar('jenis_kelamin_'),

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/user');
    }
}
