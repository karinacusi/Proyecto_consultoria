<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatetRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID_roles' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre_rol' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
            ],
        ]);
        $this->forge->addKey('ID_roles', true);
        $this->forge->createTable('Roles');

    }

    public function down()
    {
        $this->forge->dropTable('Roles');
    }
}
