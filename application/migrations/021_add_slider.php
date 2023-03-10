<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_slider extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
            ),
            'link' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'message' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => TRUE,
            ),
            'description' => array(
                'type' => 'TEXT',
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'background' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => '3',
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('slider');
    }

    public function down()
    {
        $this->dbforge->drop_table('slider');
    }
}