<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationBiodataTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 255],
            'tempat_lahir' => ['type' => 'VARCHAR', 'constraint' => 100],
            'tanggal_lahir' => ['type' => 'DATE'],
            'alamat' => ['type' => 'TEXT'],
            'no_telepon' => ['type' => 'VARCHAR', 'constraint' => 20],
            'jenis_kelamin' => ['type' => 'ENUM', 'constraint' => ['Laki-laki', 'Perempuan']],
            'pendidikan' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('biodata');
    }

    public function down()
    {
        $this->forge->dropTable('biodata');
    }
}
