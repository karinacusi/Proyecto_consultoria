<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesPermisosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ID_rolespermisos' => 1,
                'idPermisos' => 'crear_admin',
                'permisos_idPermisos' => 1, // Crear
                'Roles_ID_roles' => 1, // Administrador
            ],
            [
                'ID_rolespermisos' => 2,
                'idPermisos' => 'ver_usuario',
                'permisos_idPermisos' => 4, // Ver
                'Roles_ID_roles' => 2, // Usuario
            ],
        ];

        $this->db->table('Roles_Permisos')->insertBatch($data);
    }
}
