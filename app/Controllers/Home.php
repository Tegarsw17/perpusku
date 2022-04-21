<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Perpusku | Dashboard',
            'nama' => 'Steven Rahmad',
            'nav' => 'dashboard',
        ];

        return view('dashboard', $data);
        //return view('welcome_message');
    }
}
