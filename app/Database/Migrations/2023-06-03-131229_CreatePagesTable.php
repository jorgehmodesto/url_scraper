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
                'type' => 'INT',
                'unsigned' => true,
                'autoincrement' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => [PAGE_SCRAPE_IN_PROGRESS, PAGE_SCRAPE_SUCCESS, PAGE_SCRAPE_FAILED],
                'default' => PAGE_SCRAPE_IN_PROGRESS,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pages');
    }

    public function down()
    {
        $this->forge->dropTable('pages');
    }
}
