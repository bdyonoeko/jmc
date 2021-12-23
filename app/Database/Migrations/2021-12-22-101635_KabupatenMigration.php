<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KabupatenMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nama_kabupaten'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jumlah_penduduk' => [
                'type' => 'INT',
            ],
            'provinsi_id' => [
                'type' => 'INT',
            ],
            'is_ibukota' => [
                'type' => 'BOOLEAN',
                'default' => false
            ],
            'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->addForeignKey('provinsi_id','provinsi','id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kabupaten');
    }

    public function down()
    {
        $this->forge->dropTable('kabupaten');
    }
}
