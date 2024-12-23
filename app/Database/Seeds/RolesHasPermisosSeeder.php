<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesHasPermisosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Roles_ID_roles' => 1, // Administrador
                'permisos_idPermisos' => 1, // Crear
            ],
            [
                'Roles_ID_roles' => 1, // Administrador
                'permisos_idPermisos' => 2, // Editar
            ],
            [
                'Roles_ID_roles' => 2, // Usuario
                'permisos_idPermisos' => 4, // Ver
            ],
        ];

        $this->db->table('Roles_has_Permisos')->insertBatch($data);
    }
}
