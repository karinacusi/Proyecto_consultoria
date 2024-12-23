<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'usuario' => 'admin',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'nombres' => 'Administrador',
                'apellidos' => 'Sistema',
                'email' => 'admin@sistema.com',
                'tipo_usuario' => 1,
            ],
            [
                'usuario' => 'usuario1',
                'password' => password_hash('456', PASSWORD_DEFAULT),
                'nombres' => 'Juan',
                'apellidos' => 'Perez',
                'email' => 'juan.perez@email.com',
                'tipo_usuario' => 2,
            ],
        ];

        $this->db->table('Usuarios')->insertBatch($data);
    }
}




