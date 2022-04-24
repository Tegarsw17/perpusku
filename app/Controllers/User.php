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
        // dd($data);
        return view('admin/detail', $data);
    }
}
