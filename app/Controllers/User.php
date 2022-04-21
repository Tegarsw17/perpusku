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
        // $list = $this->usermodel->findAll();

        d($this->request->getVar('keyword'));
        // $keyword = $this->request->getVar('keyword');

        // if ($keyword) {
        //     $orang = $this->userModel->search($keyword);
        // } else {
        //     $orang = $this->userModel;
        // }

        $data = [
            'title' => 'Perpusku | Users',
            'nav' => 'user',
            'list' => $this->usermodel->getUser()
        ];

        return view('admin/users', $data);
        //return view('welcome_message');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Perpusku | Detail Komik',
            'nav' => 'user',
            'user' => $this->usermodel->getUser($id),
        ];
        // dd($data);
        return view('admin/detail', $data);
    }
}
