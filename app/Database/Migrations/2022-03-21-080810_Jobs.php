<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Entity\Cast\TimestampCast;
use Config\Database;

class Jobs extends Migration
{
    public function up()
    {
        $this->db = Database::connect();
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([

            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'auto_increment' => true,
            ],
            'company' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 9,
                'null' => true,
            ],
            'job_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'salary' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'contact_user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'contact_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jobs', true);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('jobs', true);
    }
}
