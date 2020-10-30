<?php namespace App\Controllers;

class MateriAjar extends BaseController
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('MateriAjar');
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
                MateriAjar
            WHERE 
                 id LIKE '%$pencarian%'  
 OR status_id LIKE '%$pencarian%'  
 OR kopetensi_khusus_id LIKE '%$pencarian%'  
 OR judul LIKE '%$pencarian%'  
 OR tingkat_id LIKE '%$pencarian%'  
 OR penyusun LIKE '%$pencarian%'  
 OR file LIKE '%$pencarian%'  
 OR tanggal LIKE '%$pencarian%' 
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
$child[] = $value->status_id; 
$child[] = $value->kopetensi_khusus_id; 
$child[] = $value->judul; 
$child[] = $value->tingkat_id; 
$child[] = $value->penyusun; 
$child[] = $value->file; 
$child[] = $value->tanggal; 

            $child[] = "
                <center>
                    <a href='" . site_url('MateriAjar/edit/'.$value->id) . "' class='btn btn-sm btn-warning'>Edit</a>
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
        if(isset($_POST['data'])){
            $data = $_POST['data'];
            unset($_POST['data']);
            $this->builder->insert($data);
            $data['success'] = 'data telah disimpan';
            $data['form'] = $this->form();
            return redirect()->to('/MateriAjar'); // ubah disini
        }else{
            $data['form'] = $this->form();
            return view('admin/MateriAjar/index', $data);
        }
    }


    public function edit($edit = "")
    {
        $data['edit'] = $this->db->query("SELECT * FROM MateriAjar WHERE id = '$edit' ")->getRow();
        $data['form'] = $this->form();
        return view('admin/MateriAjar/index', $data);
    }
    
    public function update()
    {
        $data = $_POST['data'];
        $id = $data['id'];
        unset($data['id']);
        $this->builder->where('id', $id);
        $this->builder->update($data);
        return redirect()->to('/MateriAjar'); // ubah disini
    }

    public function simpan()
    {
        $data = $_POST['data'];
        $this->builder->insert($data);
        return redirect()->to('/form-MateriAjar');
    }

    public function formUpdate()
    {
        return view('admin/MateriAjar/update');
    }

    public function hapus()
    {
        $kode = $_POST['id'];
        $this->db->query("DELETE FROM MateriAjar WHERE id = '$kode' ");
        return redirect()->to('/MateriAjar'); // ubah disini
    }
}
