<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
        $this->session = session();
    }

    public function index()
    {
        if (!empty($_SESSION['access_token'])) {
            return redirect()->to(base_url('home'))->with('success', 'Selamat datang kembali.');
        } else {
            return view('login/index');
        }
    }

    function login()
    {
        $client_id = '632277045278-t40d8mdaqfcd6884pslucc9jmi1ir7v7.apps.googleusercontent.com';
        $client_secret = 'FOPxkiynfvfEw0bcCtEp8QaM';
        $redirect_uri = base_url('auth/callback');
        $client = new \Google_Client();
        $client->setApplicationName("Parkir Yuk!");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");
        $authUrl = $client->createAuthUrl();
        return "<script type='text/javascript'>document.location.href='{$authUrl}';</script>" . '<META HTTP-EQUIV="refresh" content="0;URL=' . $authUrl . '">';
    }

    function callback()
    {
        $client_id = '632277045278-t40d8mdaqfcd6884pslucc9jmi1ir7v7.apps.googleusercontent.com';
        $client_secret = 'FOPxkiynfvfEw0bcCtEp8QaM';
        $redirect_uri = base_url('auth/callback');
        $client = new \Google_Client();
        $client->setApplicationName("Parkir Yuk!");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");
        $service = new \Google_Service_Oauth2($client);
        $client->authenticate($_GET['code']);
        $user = $service->userinfo->get();
        $data = $this->userModel->where('email', $user->email)->first();
        if (!empty($data)) {
            $session_data = [
                'access_token'  => $client->getAccessToken(),
                'user_id'       => $data->user_id,
                'name'          => $data->name,
                'email'         => $data->email,
                'photo'         => $data->photo,
                'role'          => $data->role
            ];
            $this->session->set($session_data);
            return redirect()->to(base_url('home'))->with('success', 'Berhasil login dengan email ' . $user->email);
        } else {
            $this->userModel->insert([
                'name' => $user->name,
                'email' => $user->email,
                'photo' => $user->picture,
                'role' => 'user'
            ]);
            $data = $this->userModel->where('email', $user->email)->first();
            $session_data = [
                'access_token'  => $client->getAccessToken(),
                'user_id'       => $data->user_id,
                'name'          => $data->name,
                'email'         => $data->email,
                'photo'         => $user->picture,
                'role'          => $data->role
            ];
            $this->session->set($session_data);
            return redirect()->to(base_url('home'))->with('success', 'Berhasil login dan membuat akun dengan email ' . $user->email);
        }
    }

    function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url())->with('success', 'Berhasil logout.');
    }
}
