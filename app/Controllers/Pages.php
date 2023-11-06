<?php

namespace App\Controllers;

use CodeIgniter\CLI\Console;
use CodeIgniter\Session\Session;

class Pages extends BaseController
{

    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        // print_r($this->session->get());
    }

    public function saveToken()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($data && isset($data->token)) {
            $this->session->set('userToken', $data->token);
            echo 'Token otentikasi disimpan.';
        } else {
            echo 'Gagal menyimpan token otentikasi.';
        }
    }

    public function login()
    {
        return view('pages\login');
    }

    public function register()
    {
        return view('pages\register');
    }

    public function logout()
    {
        $this->session->remove('userToken');
        return view('pages\logout');
    }

    public function dashboard()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\dashboard');
    }

    public function addActivity()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\addActivity');
    }
    public function addActivityContainer()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\addActivityContainer');
    }
    public function addData()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\addData');
    }
    public function showData()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\showData');
    }
    public function uploadImage()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\uploadImage');
    }
    public function profile()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\profile');
    }
    public function downloadPdf()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\downloadPdf');
    }
    public function editData()
    {
        return view('pages\editData');
    }
    public function test()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\test');
    }

    public function test2()
    {
        $idToken = $this->session->get('userToken');

        if (!$idToken) {
            echo "<script>alert('Harap login terlebih dahulu');</script>";
            return view('pages\login');
        }
        return view('pages\test2');
    }
}
