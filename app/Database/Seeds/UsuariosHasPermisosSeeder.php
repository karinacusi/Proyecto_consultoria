<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosHasPermisosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Usuarios_idUsuarios' => 1, // admin
                'permisos_idPermisos' => 1, // Crear
            ],
            [
                'Usuarios_idUsuarios' => 1, // admin
                'permisos_idPermisos' => 2, // Editar
            ],
            [
                'Usuarios_idUsuarios' => 2, // usuario1
                'permisos_idPermisos' => 4, // Ver
            ],
        ];

        $this->db->table('Usuarios_has_Permisos')->insertBatch($data);
    }
}
