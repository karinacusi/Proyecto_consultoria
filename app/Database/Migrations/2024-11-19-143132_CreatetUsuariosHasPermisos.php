<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatetUsuariosHasPermisos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Usuarios_idUsuarios' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'permisos_idPermisos' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey(['Usuarios_idUsuarios', 'permisos_idPermisos'], true);
        $this->forge->addForeignKey('Usuarios_idUsuarios', 'Usuarios', 'idUsuarios', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permisos_idPermisos', 'Permisos', 'idPermisos', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Usuarios_has_Permisos');

    }

    public function down()
    {
        $this->forge->dropTable('Usuarios_has_Permisos');
    }
}
