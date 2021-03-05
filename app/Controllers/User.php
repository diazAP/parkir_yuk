<?php

namespace App\Controllers;

class User extends BaseController
{
    function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
    {
        $filter = [
            'page'      => $_GET['page'] ?? 1,
            'per_page'  => $_GET['per_page'] ?? 10,
            'role'      => $_GET['role'] ?? NULL,
            'keyword'   => $_GET['keyword'] ?? NULL
        ];
        $user   = $this->userModel->index($filter);
        $i      = ($filter['page'] * $filter['per_page']) - $filter['per_page'] ?? 0;
        $data = [
            'main_view' => 'user/index',
            'title'     => 'Pengguna',
            'user'      => $user['data'],
            'total'     => $user['total'],
            'i'         => $i,
            'page'      => $filter['page'],
            'per_page'  => $filter['per_page']
        ];
        return view('template', $data);
    }

    public function detail($user_id)
    {
        $data = [
            'main_view' => 'user/detail',
            'title'     => 'Detail Pengguna',
            'user'      => $this->userModel->by_id($user_id)
        ];
        return view('template', $data);
    }
}
