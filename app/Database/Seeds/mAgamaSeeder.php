<?php namespace App\Database\Seeds;

class MAgamaSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                    [
                        'kode' => '01',
                        'nama'    => 'Islam'
                    ],                    
                    [
                        'kode' => '02',
                        'nama'    => 'Kristen/ Protestan'
                    ],                    
                    [
                        'kode' => '03',
                        'nama'    => 'Katholik'
                    ],                    
                    [
                        'kode' => '04',
                        'nama'    => 'Hindu'
                    ],                    
                    [
                        'kode' => '05',
                        'nama'    => 'Budha'
                    ],                    
                    [
                        'kode' => '06',
                        'nama'    => 'Kong Hu Chu'
                    ],                    
                    [
                        'kode' => '07',
                        'nama'    => 'Kepercayaan kepada tuhan yang maha esa'
                    ]              
                ];

                // Simple Queries
                // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
                //         $data
                // );

                // Using Query Builder

                foreach($data as $data){
                    $this->db->table('mAgama')->insert($data);
                }

        }
}