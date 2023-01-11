<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration
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
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
            ),
            'surname' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => 25,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'fax' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ),
            'company' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE,
            ),
            'address1' => array(
                'type' => 'TEXT',
            ),
            'address2' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'city' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
            ),
            'post_code' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
            ),
            'country_id' => array(
                'type' => 'INT',
                'constraint' => 7,
            ),
            'region_id' => array(
                'type' => 'INT',
                'constraint' => 7,
            ),
            'newsletter' => array(
                'type' => 'TINYINT',
                'constraint' => 255,
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
