<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        return view('partials/header', ['title' => 'Home'])
            . view('pages/home')
            . view('partials/footer');
    }

    public function about(): string
    {
        return view('partials/header', ['title' => 'About'])
            . view('pages/about')
            . view('partials/footer');
    }
}
