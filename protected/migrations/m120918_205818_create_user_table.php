<?php

/**
 * Basic user table creation migration.
 * 
 * This migration will create a basic user table. Additional user fields should
 * be included in the next migrations.
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 */
class m120918_205818_create_user_table extends CDbMigration
{
    const USERS = 'Users';

    /**
     * Applies the migration.
     */
    public function up()
    {
        //Creating user table
        $this->createTable(self::USERS, array(
          'id' => 'BIGINT NOT NULL AUTO_INCREMENT',
          'username' => 'VARCHAR(64) NOT NULL',
          'fullName' => 'TEXT NOT NULL',
          'email' => 'TEXT NOT NULL',
          //Creating indices
          'PRIMARY KEY (id)',
        ));
    }

    /**
     * Removes the migration.
     */
    public function down()
    {
        //Drop user table
        $this->dropTable(self::USERS);
    }
}