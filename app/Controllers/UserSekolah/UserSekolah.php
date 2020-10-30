<?php

namespace App\Controllers\UserSekolah;

use CodeIgniter\Controller;

class UserSekolah extends Controller
{

    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('userSekolah');
    }

    public function Index()
    {
        return view('userSekolah/form');
    }

    public function simpan()
    {

        $data = $_POST['data'];

        $this->builder->insert($data);

        return redirect()->to('form-user-sekolah');
    }
}
