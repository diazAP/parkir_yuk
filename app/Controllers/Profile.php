<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $data = [
            'main_view' => 'home/index',
            'title'     => 'Beranda'
        ];

        return view('template', $data);
    }
}
