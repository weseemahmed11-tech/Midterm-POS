<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }

        return view('partials/header', ['title' => 'Login'])
            . view('auth/login')
            . view('partials/footer');
    }

    public function authenticate()
    {
        if (! $this->validate(['username' => 'required', 'password' => 'required'])) {
            return redirect()->to('/login')->withInput()->with('error', 'Username and password are required.');
        }

        $username = trim((string) $this->request->getPost('username'));
        $user = (new UserModel())->where('username', $username)->first();
        $password = (string) $this->request->getPost('password');

        if ($user === null || ! password_verify($password, (string) $user['password'])) {
            return redirect()->to('/login')->withInput()->with('error', 'Invalid username or password.');
        }

        session()->regenerate(true);
        session()->set([
            'isLoggedIn' => true,
            'user' => [
                'id' => (int) $user['id'],
                'username' => $user['username'],
                'full_name' => $user['full_name'],
            ],
        ]);

        return redirect()->to('/customers');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
