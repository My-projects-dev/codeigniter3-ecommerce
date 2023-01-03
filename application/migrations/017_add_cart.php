<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_cart extends CI_Migration
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
            'user' => array(
                'type' => 'INT',
                'constraint' => 7,
            ),
            'product_id' => array(
                'type' => 'INT',
                'constraint' => '7',
            ),
            'quantity' => array(
                'type' => 'INT',
                'constraint' => 7,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cart');
    }

    public function down()
    {
        $this->dbforge->drop_table('cart');
    }
}