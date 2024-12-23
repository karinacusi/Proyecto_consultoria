<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PublicacionesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titulo' => 'Bienvenida al Sistema',
                'descripcion' => 'Publicación de prueba inicial.',
                'contenido' => 'Este es un contenido de ejemplo para la tabla Publicaciones.',
                'Usuarios_idUsuarios' => 1, // admin
            ],
        ];

        $this->db->table('Publicaciones')->insertBatch($data);
    }
}
