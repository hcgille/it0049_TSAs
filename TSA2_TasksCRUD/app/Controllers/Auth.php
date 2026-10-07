<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('tasks'));
        }

        return view('auth/login', [
            'pageTitle' => 'Login',
        ]);
    }

    public function attempt()
    {
        if (! $this->request->is('post')) {
            return $this->response
                ->setStatusCode(405)
                ->setBody('Method Not Allowed');
        }

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $this->request->getPost('username'))
            ->first();

        if (
            ! $user ||
            ! password_verify(
                (string) $this->request->getPost('password'),
                $user['password']
            )
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->regenerate(true);

        session()->set([
            'userId' => $user['id'],
            'username' => $user['username'],
            'fullName' => $user['full_name'],
            'isLoggedIn' => true,
        ]);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'You are now logged in.');
    }

    public function logout()
    {
        if (! $this->request->is('post')) {
            return $this->response
                ->setStatusCode(405)
                ->setBody('Method Not Allowed');
        }

        session()->destroy();

        return redirect()
            ->to(site_url('/'))
            ->with('success', 'You have been logged out.');
    }
}