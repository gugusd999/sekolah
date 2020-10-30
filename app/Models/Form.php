<?php

namespace App\Models;

use CodeIgniter\Model;

class Form extends Model
{
    protected $form = null;

    public static function start($action = "")
    {
        echo '
            <form class="form-horizontal" action="' . $action . '" method="post" enctype="multipart/form-data">
        ';
    }

    public static function submit($action = "Submit")
    {
        echo '
            <button type="submit" class="btn btn-primary">' . $action . '</button>
        ';
    }

    public static function getfile_db($data, $path, $name, $id, $table, $datapath = "")
    {
        $db = \Config\Database::connect();

        if (!file_exists($path)) {
            mkdir($path);
        }

        $gambar = $db->query("SELECT * FROM $table WHERE id = '$id'")->getResultObject()[0]->$data;

        $data = $_FILES[$data];
        if ($data['name'] != "") {
            unlink($path . $datapath . '/' . $name . $gambar);
            // cek if file exist
            if (file_exists($path . '/' . $name . $data['name'])) {

                unlink($path . '/' . $name . $data['name']);
                move_uploaded_file($data['tmp_name'], $path . '/' . $name . $data['name']);
            } else {
                move_uploaded_file($data['tmp_name'], $path . '/' . $name . $data['name']);
            }
            return $data['name'];
        } else {
            return $gambar;
        }
    }

    public static function getfile($data, $path, $name)
    {
        $data = $_FILES[$data];

        if (!file_exists($path)) {
            mkdir($path);
        }


        // cek if file exist
        if (file_exists($path . '/' . $name . $data['name'])) {

            unlink($path . '/' . $name . $data['name']);
            move_uploaded_file($data['tmp_name'], $path . '/' . $name . $data['name']);
        } else {
            move_uploaded_file($data['tmp_name'], $path . '/' . $name . $data['name']);
        }

        return $data['name'];
    }


    public static function end()
    {
        echo '</form>';
    }

    public static function summernote()
    {
        echo '<script type="text/javascript" src="' . base_url() . '/limitless/Layout%204/LTR/assets/js/plugins/editors/summernote/summernote.min.js"></script>';
    }


    public static function cekdata($data, $nilai)
    {
        if (isset($data[$nilai])) {
            return $data[$nilai];
        } else {
            return "";
        }
    }


    public static function slug($char = "")
    {

        $char = strtolower($char) . '-' . date('y-m-d-h-i-s');
        $char = str_replace("%", "", $char);
        $char = str_replace("!", "", $char);
        $char = str_replace("@", "", $char);
        $char = str_replace("#", "", $char);
        $char = str_replace("$", "", $char);
        $char = str_replace("^", "", $char);
        $char = str_replace("&", "", $char);
        $char = str_replace("*", "", $char);
        $char = str_replace("(", "", $char);
        $char = str_replace(")", "", $char);
        $char = str_replace("+", "", $char);
        $char = str_replace("=", "", $char);
        $char = str_replace(";", "", $char);
        $char = str_replace(".", "", $char);
        $char = str_replace(":", "", $char);
        $char = str_replace("'", "", $char);
        $char = str_replace('"', "", $char);
        $char = str_replace("?", "", $char);
        $char = str_replace("/", "-", $char);
        $char = str_replace("{", "", $char);
        $char = str_replace("}", "", $char);
        $char = str_replace("[", "", $char);
        $char = str_replace("]", "", $char);
        $char = str_replace(" ", "-", $char);
        return $char;
    }


    public static function input($data = [])
    {
        $html = '<div class="form-group mb-3">';
        if (isset($data["show-image"])) {
            if ($data["show-image"] === true) {
                $html .= '	<div  style="text-align: center;">';
                if (isset($data["path-image"])) {
                    $html .= '	 <img src="' . base_url() . $data["path-image"] . '" width="250px" height="auto" id="gambar-' . self::cekdata($data, 'fc') . '" alt="">';
                } else {
                    $html .= '	 <img src="" width="250px" height="auto" id="gambar-' . self::cekdata($data, 'fc') . '" alt="">';
                }
                $html .= '	</div>';
            }
        }
        if (self::cekdata($data, 'type') != "hidden") {
            $html .= '	<label for="' . self::cekdata($data, 'fc') . '" class="control-label col-lg-2">' . self::cekdata($data, 'title') . '</label>';
        }
        $html .= '<div class="col-lg-10">';
        $html .= '	<input ';
        $html .= ' type="' . self::cekdata($data, 'type') . '" ';
        $html .= ' id="' . self::cekdata($data, 'fc') . '" ';
        $html .= ' name="data[' . self::cekdata($data, 'fc') . ']" ';
        $html .= ' class="form-control ' . self::cekdata($data, 'class') . '" ';
        if (isset($data['placeholder'])) {
            $html .= ' placeholder="' . $data['placeholder'] . '" ';
        }

        if (isset($data['video']) && $data['video'] === true) {
            $html .= ' data-video="' . self::cekdata($data, 'fc') . '" ';
        }

        if (isset($data['value'])) {
            $html .= ' value="' . $data['value'] . '" ';
        }
        if (isset($data['autocomplete'])) {
            if ($data['autocomplete'] == 'off') {
                $html .= ' autocomplete="off" ';
            }
        }
        if (isset($data['required'])) {
            if (isset($data['required'])) {
                $html .= ' required ';
            }
        }

        if (isset($data['multiple'])) {
            if ($data['multiple'] === true) {
                $html .= " multiple ";
            }
        }

        if (isset($data['accept'])) {
            if ($data['accept'] === "images") {
                $html .= "accept='image/*'";
            }
        }

        if (isset($data['tags'])) {
            if ($data['tags'] === true) {
                $html .= " data-role='tagsinput' ";
            }
        }

        if (isset($data['type'])) {
            if ($data["type"] == "number") {
                $html .= " onkeydown=" . '"' . "
                    return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )
                " . '"' . " ";
            }

            if ($data['type'] == "textonly") {
                $html .= '
                     onkeypress="return /[a-z]/i.test(event.key)" 
                ';
            }
        }


        if (isset($data["show-image"])) {
            if ($data["show-image"] === true) {
                $html .= '
                    accept="image/x-png,image/gif,image/jpeg" 
                ';
            }
        }





        $html .= '>';
        $html .= '</div>';
        if (isset($data["show-image"])) {
            if ($data["show-image"] === true) {
                $html .= '
			<script>
				function bacagambarnya(input){
			        if (input.files && input.files[0]) {
			            var reader = new FileReader();

			            reader.onload = function (e){
			                $("#gambar-' . self::cekdata($data, 'fc') . '").attr("src", e.target.result);
			            }
			            reader.readAsDataURL(input.files[0]);
			        }
			    }
			    $("#' . self::cekdata($data, 'fc') . '").change(function(){
			        bacagambarnya(this);
			    })
			</script>
		';
            }
        }

        if (isset($data["type"])) {
            if ($data["type"] === "rupiah") {
                $html .= "
                
                    <script>
                        
                        /* Dengan Rupiah */
                        var dengan_rupiah = document.getElementById('" . self::cekdata($data, 'fc') . "');
                        dengan_rupiah.addEventListener('keyup', function(e)
                        {
                            console.log(this.value);
                            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
                        });
                        
                        /* Fungsi */
                        function formatRupiah(angka, prefix)
                        {
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                split    = number_string.split(','),
                                sisa     = split[0].length % 3,
                                rupiah     = split[0].substr(0, sisa),
                                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                                
                            if (ribuan) {
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }
                            
                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                        }
                    
                    </script>
                ";
            }
        }
        $html .= '</div>';
        echo $html;
    }



    public static function textarea($data)
    {
        $html = '<div class="form-group">';
        if (isset($data["show-image"])) {
            if ($data["show-image"] === true) {
                $html .= '	<div  style="text-align: center;">';
                if (isset($data["path-image"])) {
                    $html .= '	 <img src="' . base_url() . $data["path-image"] . '" width="250px" height="auto" id="gambar-' . self::cekdata($data, 'fc') . '" alt="">';
                } else {
                    $html .= '	 <img src="" width="250px" height="auto" id="gambar-' . self::cekdata($data, 'fc') . '" alt="">';
                }
                $html .= '	</div>';
            }
        }
        if (self::cekdata($data, 'type') != "hidden") {
            $html .= '	<label for="' . self::cekdata($data, 'fc') . '">' . self::cekdata($data, 'title') . '</label>';
        }
        $html .= '	<textarea ';
        $html .= ' type="' . self::cekdata($data, 'type') . '" ';
        $html .= ' id="' . self::cekdata($data, 'fc') . '" ';
        $html .= ' name="data[' . self::cekdata($data, 'fc') . ']" ';
        $html .= ' class="form-control ' . self::cekdata($data, 'class') . '" ';
        if (isset($data['placeholder'])) {
            $html .= ' placeholder="' . $data['placeholder'] . '" ';
        }
        if (isset($data['autocomplete'])) {
            if ($data['autocomplete'] == 'off') {
                $html .= ' autocomplete="off" ';
            }
        }
        if (isset($data['required'])) {
            if (isset($data['required'])) {
                $html .= ' required ';
            }
        }

        if (isset($data['multiple'])) {
            if ($data['multiple'] === true) {
                $html .= " multiple ";
            }
        }

        if (isset($data['accept'])) {
            if ($data['accept'] === "images") {
                $html .= "accept='image/*'";
            }
        }
        $html .= '>';
        if (isset($data['value'])) {
            $html .= htmlspecialchars_decode($data['value']);
        }
        $html .= '</textarea>';
        $html .= '</div>';

        echo $html;
    }

    public static function editor($data)
    {
        $html = '<div class="form-group">';
        if (isset($data["show-image"])) {
            if ($data["show-image"] === true) {
                $html .= '	<div  style="text-align: center;">';
                if (isset($data["path-image"])) {
                    $html .= '	 <img src="' . base_url() . $data["path-image"] . '" width="250px" height="auto" id="gambar-' . self::cekdata($data, 'fc') . '" alt="">';
                } else {
                    $html .= '	 <img src="" width="250px" height="auto" id="gambar-' . self::cekdata($data, 'fc') . '" alt="">';
                }
                $html .= '	</div>';
            }
        }
        if (self::cekdata($data, 'type') != "hidden") {
            $html .= '	<label for="' . self::cekdata($data, 'fc') . '">' . self::cekdata($data, 'title') . '</label>';
        }
        $html .= '	<textarea ';
        $html .= ' type="' . self::cekdata($data, 'type') . '" ';
        $html .= ' id="' . self::cekdata($data, 'fc') . '" ';
        $html .= ' name="data[' . self::cekdata($data, 'fc') . ']" ';
        $html .= ' class="form-control ' . self::cekdata($data, 'class') . '" ';
        if (isset($data['placeholder'])) {
            $html .= ' placeholder="' . $data['placeholder'] . '" ';
        }
        if (isset($data['autocomplete'])) {
            if ($data['autocomplete'] == 'off') {
                $html .= ' autocomplete="off" ';
            }
        }
        if (isset($data['required'])) {
            if (isset($data['required'])) {
                $html .= ' required ';
            }
        }

        if (isset($data['multiple'])) {
            if ($data['multiple'] === true) {
                $html .= " multiple ";
            }
        }

        if (isset($data['accept'])) {
            if ($data['accept'] === "images") {
                $html .= "accept='image/*'";
            }
        }
        $html .= '>';
        if (isset($data['value'])) {
            $html .= htmlspecialchars_decode($data['value']);
        }
        $html .= '</textarea>';
        $html .= '<script>';
        $html .= '$("#' . self::cekdata($data, 'fc') . '").summernote()';
        $html .= '</script>';
        $html .= '</div>';

        echo $html;
    }


    public static function rowbackitem($table = "", $row = [], $item = "")
    {
        $db = \Config\Database::connect();
        $getData = $db->query("SELECT $item  FROM $table WHERE " . $row["row"] . " = '" . $row["value"] . "' ")->getResultObject();
        if (isset($getData[0])) {
            return $getData[0]->$item;
        } else {
            return "";
        }
    }


    public static function select_db($data = "")
    {
        $db = \Config\Database::connect();

        $dataNama = $data['data'];
        $dataVAlue = $data['data'];

        $qr = "";

        if (isset($data['key'])) {
            $dataVAlue = $data['key'];
            $qr = ", $dataVAlue";
        }

        $condition = "";
        if (isset($data['condition'])) {
            $condition .= " WHERE ";
            $condition .= $data['condition']['row'];
            $condition .= " = '";
            $condition .= $data['condition']['value'];
            $condition .= "'";
        }

        $getData = $db->query("SELECT DISTINCT(" . $dataNama . ") as " . $dataNama . " $qr  FROM " . $data['db'] . $condition)->getResultObject();

        $createOption = '<option value="">--pilih data--</option>';

        foreach ($getData as $key => $value) {
            if (isset($data['value'])) {
                if ($data['value'] == $value->$dataVAlue) {
                    $createOption .= '<option selected value="' . $value->$dataVAlue . '">' . $value->$dataNama . '</option>';
                } else {
                    $createOption .= '<option value="' . $value->$dataVAlue . '">' . $value->$dataNama . '</option>';
                }
            } else {
                $createOption .= '<option value="' . $value->$dataVAlue . '">' . $value->$dataNama . '</option>';
            }
        }

        $html = "
        <div class='form-group'>
            <label for='" . $data['fc'] . "' class='control-label col-lg-2'>" . $data['title'] . "</label>
            <div class='col-lg-10'>
            <select id='" . $data['fc'] . "' name='data[" . $data['fc'] . "]' class='form-control'>
                $createOption
            </select>
            </div>
        </div> 
        ";
        echo $html;
    }
}
