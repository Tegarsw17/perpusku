<?php

namespace App\Controllers;

class Bookcollection extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Perpusku | Daftar Buku',
            'nav' => 'book_collection'
        ];

        return view('daftar_buku', $data);
        //return view('welcome_message');
    }
}
