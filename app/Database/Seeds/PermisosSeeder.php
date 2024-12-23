<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermisosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre_permisos' => 'Crear'],
            ['nombre_permisos' => 'Editar'],
            ['nombre_permisos' => 'Eliminar'],
            ['nombre_permisos' => 'Ver'],
        ];

        $this->db->table('Permisos')->insertBatch($data);
    }
}
