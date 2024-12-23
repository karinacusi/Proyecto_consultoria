<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createtpermisos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idPermisos' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre_permisos' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
            ],
        ]);
        $this->forge->addKey('idPermisos', true);
        $this->forge->createTable('Permisos');

    }

    public function down()
    {
        $this->forge->dropTable('Permisos');
    }
}
