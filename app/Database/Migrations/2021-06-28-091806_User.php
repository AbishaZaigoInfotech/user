<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => 15,
			],
			'age' => [
				'type' => 'INT',
				'constraint' => 2,
			],
			'gender' => [
				'type' => 'VARCHAR',
				'constraint' => 10,
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
			'designation' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => 2,
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]); 
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('users');
	}

	public function down()
	{
		//
		$this->forge->dropTable('users');
	}
}
