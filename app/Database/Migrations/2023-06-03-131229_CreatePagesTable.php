<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * @since 1.0.0
 * @author Jorge Modesto
 *
 * Pages table migration
 */
class CreatePagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => [PAGE_SCRAPE_IN_PROGRESS, PAGE_SCRAPE_SUCCESS, PAGE_SCRAPE_FAILED],
                'default' => PAGE_SCRAPE_IN_PROGRESS,
            ],
        ]);

        $this->forge->addKey('id', true, true, 'primary_key_pages');
        $this->forge->createTable('pages');
    }

    public function down()
    {
        $this->forge->dropTable('pages');
    }
}
