<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $model = new LoginModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->where('user_name', $username)->first();

        if ($user) {
            // Compare plain password (you'll hash later)
            if ($password == $user['password']) {
                $sessionData = [
                    'id'       => $user['id'],
                    'name'     => $user['name'],
                    'username' => $user['user_name'],
                    'logged_in' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('/employee');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
