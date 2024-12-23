<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatetRolesPermisos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idRoles_permisos' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ID_rolespermisos' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'idPermisos' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
            ],
            'permisos_idPermisos' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'Roles_ID_roles' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('idRoles_permisos', true);
        $this->forge->addForeignKey('permisos_idPermisos', 'Permisos', 'idPermisos', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('Roles_ID_roles', 'Roles', 'ID_roles', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Roles_Permisos');

    }

    public function down()
    {
        $this->forge->dropTable('Roles_Permisos');

    }
}
