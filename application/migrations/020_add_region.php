<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_region extends CI_Migration
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
            'region_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'country_id' => array(
                'type' => 'INT',
                'constraint' => '3',
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => '3',
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('region');
    }

    public function down()
    {
        $this->dbforge->drop_table('region');
    }
}