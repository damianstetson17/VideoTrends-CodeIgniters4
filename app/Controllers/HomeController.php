<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data['header'] = view('/templates/header');
        $data['footer'] = view('/templates/footer');
        return view('home', $data);
    }
}
