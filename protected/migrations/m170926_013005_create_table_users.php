<?php

class m170926_013005_create_table_users extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
			'id' => 'pk',
			'email' => 'string NOT NULL',
			'auth_key' => 'string NOT NULL',
			'balance' => 'DECIMAL(10,2) NOT NULL DEFAULT 0.00',
		));
	}

	public function down()
	{
		$this->dropTable('users');
	}
}