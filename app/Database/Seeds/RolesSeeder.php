<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_rol' => 'Administrador'],
            ['nombre_rol' => 'Usuario'],
        ];

        $this->db->table('Roles')->insertBatch($data);
    }
}
