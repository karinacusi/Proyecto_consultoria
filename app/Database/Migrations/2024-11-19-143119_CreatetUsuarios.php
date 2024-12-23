<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatetUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idUsuarios' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usuario' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nombres' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'apellidos' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tipo_usuario' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('idUsuarios', true);
        $this->forge->createTable('Usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('Usuarios');
    }
}
