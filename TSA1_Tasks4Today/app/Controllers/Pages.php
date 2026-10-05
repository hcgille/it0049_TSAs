<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{
    public function profile()
    {
        $userModel = new UserModel();

        $data = [
            'pageTitle' => 'Profile',
            'user' => $userModel->first(),
        ];

        return view('pages/profile', $data);
    }

    public function about()
    {
        $data = [
            'pageTitle' => 'About',
            'developerName' => 'Harrold Gille',
            'program' => 'BSIT - Cybersecurity',
        ];

        return view('pages/about', $data);
    }
}