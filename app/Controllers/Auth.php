<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        //
    }
    
    public function login()
    {
        return view('auth/login', ['title' => 'Login']);
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi user
        if ($username === 'admin' && $password === 'password') {
            session()->set('isLoggedIn', true);
            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Invalid login credentials');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
