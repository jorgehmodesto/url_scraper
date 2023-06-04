<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * @since 1.0.0
 * @author Jorge Modesto
 *
 * Links table migration
 */
class CreateLinksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'page_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('page_id', 'pages', 'id');

        $this->forge->createTable('links');
    }

    public function down()
    {
        $this->forge->dropTable('links');
    }
}
