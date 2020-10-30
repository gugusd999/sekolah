<?php

namespace App\Controllers;

class Sekolah extends BaseController
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('Sekolah');
    }

    function json()
    {
        // order
        $order = 'DESC';
        if (isset($_POST['order'])) : $order = $_POST['order'][0]['dir'];
        else : $setorder = '';
        endif;
        // pencarian
        $pencarian = "";
        if (isset($_POST['search']['value'])) {
            $pencarian = $_POST['search']['value'];
        }
        // limit set   
        $start = $_POST['start'];
        $end = $_POST['length'];
        // draw
        $draw = $_POST['draw'];
        // query prosses
        $qr = $this->db->query("
            SELECT 
                * 
            FROM
                Sekolah
            WHERE 
                 id LIKE '%$pencarian%'  
 OR logo LIKE '%$pencarian%'  
 OR nama LIKE '%$pencarian%'  
 OR npsn LIKE '%$pencarian%'  
 OR bentuk_pendidikan_id LIKE '%$pencarian%'  
 OR alamat LIKE '%$pencarian%'  
 OR kelurahan LIKE '%$pencarian%'  
 OR kecamatan LIKE '%$pencarian%'  
 OR kota LIKE '%$pencarian%'  
 OR provinsi LIKE '%$pencarian%'  
 OR rt LIKE '%$pencarian%'  
 OR rw LIKE '%$pencarian%'  
 OR kodepos LIKE '%$pencarian%'  
 OR lintang LIKE '%$pencarian%'  
 OR bujur LIKE '%$pencarian%'  
 OR telepon LIKE '%$pencarian%'  
 OR nomorfax LIKE '%$pencarian%'  
 OR email LIKE '%$pencarian%'  
 OR website LIKE '%$pencarian%' 
            ORDER BY
                id $order
            LIMIT
                $start , $end
        ");
        $arr = [];
        $dataArr = $qr->getResultObject();
        $dataTotal = $this->builder->countAll();
        foreach ($dataArr as $key => $value) {
            $child = [];
            $child[] = $value->id;
            $child[] = $value->logo;
            $child[] = $value->nama;
            $child[] = $value->npsn;
            $child[] = $value->bentuk_pendidikan_id;
            $child[] = $value->alamat;
            $child[] = $value->kelurahan;
            $child[] = $value->kecamatan;
            $child[] = $value->kota;
            $child[] = $value->provinsi;
            $child[] = $value->rt;
            $child[] = $value->rw;
            $child[] = $value->kodepos;
            $child[] = $value->lintang;
            $child[] = $value->bujur;
            $child[] = $value->telepon;
            $child[] = $value->nomorfax;
            $child[] = $value->email;
            $child[] = $value->website;

            $child[] = "
                <center>
                    <a href='" . site_url('Sekolah/edit/' . $value->id) . "' class='btn btn-sm btn-warning'>Edit</a>
                    <button data-id='" . $value->id . "' modal-open-delete class='btn btn-sm btn-danger'>Delete</button>
                </center>
            ";
            $arr[] = $child;
        }
        $r = array(
            "draw"            => $draw,
            "recordsTotal"    => intval($dataTotal),
            "recordsFiltered" => intval($dataTotal),
            "data"            => $arr,
        );
        echo json_encode($r);
    }

    public function Index($edit = "")
    {
        if (isset($_POST['data'])) {
            $data = $_POST['data'];
            unset($_POST['data']);
            $this->builder->insert($data);
            $data['success'] = 'data telah disimpan';
            $data['form'] = $this->form();
            return redirect()->to('/Sekolah'); // ubah disini
        } elseif ($edit == "tambah") {
            $data['form'] = $this->form();
            return view('admin/Sekolah/form', $data);
        } else {
            $data['form'] = $this->form();
            return view('admin/Sekolah/index', $data);
        }
    }


    public function edit($edit = "")
    {
        $data['edit'] = $this->db->query("SELECT * FROM Sekolah WHERE id = '$edit' ")->getRow();
        $data['form'] = $this->form();
        return view('admin/Sekolah/index', $data);
    }

    public function update()
    {
        $data = $_POST['data'];
        $id = $data['id'];
        unset($data['id']);
        $this->builder->where('id', $id);
        $this->builder->update($data);
        return redirect()->to('/Sekolah'); // ubah disini
    }

    public function simpan()
    {
        $data = $_POST['data'];
        $this->builder->insert($data);
        return redirect()->to('/form-Sekolah');
    }

    public function formUpdate()
    {
        return view('admin/Sekolah/update');
    }

    public function hapus()
    {
        $kode = $_POST['id'];
        $this->db->query("DELETE FROM Sekolah WHERE id = '$kode' ");
        return redirect()->to('/Sekolah'); // ubah disini
    }
}
