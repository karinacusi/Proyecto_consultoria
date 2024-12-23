<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatetRolesHasPermisos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Roles_ID_roles' => [
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
        $this->forge->addKey(['Roles_ID_roles', 'permisos_idPermisos'], true);
        $this->forge->addForeignKey('Roles_ID_roles', 'Roles', 'ID_roles', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permisos_idPermisos', 'Permisos', 'idPermisos', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Roles_has_Permisos');

    }

    public function down()
    {
        $this->forge->dropTable('Roles_has_Permisos');
    }
}
