<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;

class Pages extends BaseController
{
    public function login()
    {
        return view('pages\login');
    }
    public function register()
    {
        return view('pages\register');
    }
    public function dashboard()
    {
        // // Menginisialisasi session
        // $session = session();

        // // Memeriksa apakah pengguna telah login
        // if (!$session->get('user_id')) {
        //     // Jika belum login, kembalikan pengguna ke halaman login
        //     return redirect()->to('login');
        // }
        return view('pages\dashboard');
    }
    public function addActivity()
    {
        return view('pages\addActivity');
    }
    public function addData()
    {
        return view('pages\addData');
    }
    public function showData()
    {
        return view('pages\showData');
    }
    public function test()
    {
        return view('pages\test');
    }
}
