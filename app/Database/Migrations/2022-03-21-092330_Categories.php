<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Entity\Cast\TimestampCast;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' =>[
                'type'           => 'INT',
                'constraint'     => 9,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]

            

        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('category_id', 'users', 'id');
        $this->forge->createTable('categories', true);
    }
    public function down()
    {
        $this->forge->dropTable('categories',true);
    }
}
