<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ControlerBasic extends BaseCommand
{
    protected $group       = 'controller';
    protected $name        = 'controller:basic';
    protected $description = 'Displays basic application information.';
    protected $table       = '';
    protected $classname   = '';
    protected $id   = '';
    protected $primary   = false;
    public function run(array $params)
    {
        if (isset($params[0])) {
            $this->table = $params[0];
            $this->classname = ucfirst($params[0]);
        }

        if (isset($params[1])) {
            $this->id = $params[1];
        }

        if (isset($params[2])) {
            if ($params[2] === "primary") {
                $this->primary = true;
            }
            $this->id = $params[1];
        }

        $db = \Config\Database::connect();

        $column = $db->query("SHOW COLUMNS FROM " . $this->table)->getResultArray();

        // make or
        $search = "";
        foreach ($column as $key => $value) {
            if ($key == 0) {
                $search .= " " . $value['Field'] . " LIKE '%\$pencarian%' ";
            } else {
                $search .= " \n OR " . $value['Field'] . " LIKE '%\$pencarian%' ";
            }
        }

        $searchtmp = "";
        foreach ($column as $key => $value) {
            $searchtmp .= "\$child[] = \$value->" . $value['Field'] . "; \n";
        }

        $headtable = "";
        foreach ($column as $key => $value) {
            $createname = $value['Field'];
            $createname = str_replace("_id", "", $createname);
            $createname = str_replace("_", " ", $createname);
            $headtable .= " <th>" . $createname . "</th> \n";
        }

        $headtable .= '<th>Action</th>';


        // var_dump($column);
        function inputformcall($column = [], $id = "", $primary = false, $update = "")
        {
            $formd = "";
            foreach ($column as $key => $value) {

                $createname = $value['Field'];
                $createname = str_replace("_id", "", $createname);
                $createname = str_replace("_", " ", $createname);


                // cek if int
                $method = "input";
                $typeinput = "text";
                $panternint = "/int/i";
                $panternchar = "/varchar/i";
                $panterntext = "/text/i";
                $panterntext2 = "/longtext/i";
                // CLI::write($value['Type']);
                // CLI::write();

                if (preg_match($panternint, $value['Type']) > 0) {
                    $typeinput = "number";
                }
                if (preg_match($panternchar, $value['Type']) > 0) {
                    $typeinput = "text";
                }
                if (preg_match($panterntext, $value['Type']) > 0) {
                    $method = "editor";
                    $typeinput = "text";
                }
                if (preg_match($panterntext2, $value['Type']) > 0) {
                    $method = "editor";
                    $typeinput = "text";
                }

                if ($id != "") {
                    if ($id === $value['Field'] && $primary == true) {
                        $formd .= '';
                    } elseif ($id === $value['Field'] && $update != "") {
                        $formd .= '';
                    } else {
                        if ($update != "") {
                            $formd .= '
                                $form::' . $method . '([
                                    "title" => "' . $createname . '",
                                    "type" => "' . $typeinput . '",
                                    "fc" => "' . $value['Field'] . '",
                                    "data" => "id",
                                    "placeholder" => "inputkan ' . $createname . '",
                                    "value" => $edit->' . $value['Field'] . ',
                                ]);
                            ';
                        } else {
                            $formd .= '
                                $form::' . $method . '([
                                    "title" => "' . $createname . '",
                                    "type" => "' . $typeinput . '",
                                    "fc" => "' . $value['Field'] . '",
                                    "data" => "id",
                                    "placeholder" => "inputkan ' . $createname . '",
                                ]);
                            ';
                        }
                    }
                } else {
                    if ($update != "") {
                        $formd .= '
                                $form::' . $method . '([
                                    "title" => "' . $createname . '",
                                    "type" => "' . $typeinput . '",
                                    "fc" => "' . $value['Field'] . '",
                                    "data" => "id",
                                    "placeholder" => "inputkan ' . $createname . '",
                                    "value" => $edit->' . $value['Field'] . ',
                                ]);
                            ';
                    } else {
                        $formd .= '
                                $form::' . $method . '([
                                    "title" => "' . $createname . '",
                                    "type" => "' . $typeinput . '",
                                    "fc" => "' . $value['Field'] . '",
                                    "data" => "id",
                                    "placeholder" => "inputkan ' . $createname . '",
                                ]);
                            ';
                    }
                }
            }

            if ($update != "") {
                $formd .= '
                    $form::input([
                        "type" => "hidden",
                        "fc" => "' . $id . '",
                        "value" => $edit->' . $id . ',
                    ]);
                ';
            }


            return $formd;
        }

        $filename = APPPATH . 'tmp/controller.tmp';
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        // classname set 
        $contents = str_replace("{{classname}}", $this->classname, $contents);
        $contents = str_replace("{{tablename}}", $this->table, $contents);
        $contents = str_replace("{{codepencarian}}", $search, $contents);
        $contents = str_replace("{{rowcall}}", $searchtmp, $contents);
        $contents = str_replace("{{kode}}", $this->id, $contents);

        // // call file tmp
        $filename2 = APPPATH . 'Controllers/' . $this->classname . '.php';

        if (file_exists($filename2)) {
            unlink($filename2);
        }

        // VIEW 
        // cek path
        $filepath = APPPATH . 'Views/admin/' . $this->table;
        if (!file_exists($filepath)) {
            mkdir($filepath, 0777, true);
        }
        // cek file ready
        $fp = fopen($filename2, 'w');
        fwrite($fp, $contents);
        fclose($fp);
        CLI::write('controller ' . $this->classname . ' created');


        // create view area

        $filename = APPPATH . 'tmp/view.tmp';
        $handle = fopen($filename, "r");
        $contentsview = fread($handle, filesize($filename));
        fclose($handle);

        $contentsview = str_replace("{{classname}}", $this->classname, $contentsview);
        $contentsview = str_replace("{{tablename}}", $this->table, $contentsview);
        $contentsview = str_replace("{{codepencarian}}", $search, $contentsview);
        $contentsview = str_replace("{{rowcall}}", $searchtmp, $contentsview);
        $contentsview = str_replace("{{kode}}", $this->id, $contentsview);
        $contentsview = str_replace("{{form}}", inputformcall($column, $this->id, $this->primary), $contentsview);
        $contentsview = str_replace("{{formupdate}}", inputformcall($column, $this->id, $this->primary, 'update'), $contentsview);
        $contentsview = str_replace("{{headtable}}", $headtable, $contentsview);


        $filename3 = $filepath . '/index.php';

        if (file_exists($filename3)) {
            unlink($filename3);
        }

        $fp = fopen($filename3, 'w');
        fwrite($fp, $contentsview);
        fclose($fp);
        CLI::write('view ' . $this->classname . ' indexes created');
    }
}
