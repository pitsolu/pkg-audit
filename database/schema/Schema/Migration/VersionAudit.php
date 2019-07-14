<?php

namespace Schema\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class VersionAudit extends AbstractMigration{

	public function up(Schema $schema){

		if($schema->hasTable("authorship"))
            $schema->dropTable("authorship");

        $authorship = $schema->createTable('authorship');
        $authorship->addColumn('id', 'integer', array('autoincrement' => true));
        $authorship->addColumn('token', 'string');
        $authorship->addColumn('user_token', 'string');
        $authorship->addColumn('created_at', 'datetime');
        $authorship->addUniqueIndex(array("token"));
        $authorship->setPrimaryKey(array('id'));

        if($schema->hasTable("ownership"))
            $schema->dropTable("ownership");

        $ownership = $schema->createTable('ownership');
        $ownership->addColumn('id', 'integer', array('autoincrement' => true));
        $ownership->addColumn('token', 'string');
        $ownership->addColumn('user_token', 'string');
        $ownership->addColumn('created_at', 'datetime');
        $ownership->addColumn('status', 'string');
        $ownership->setPrimaryKey(array('id'));

        if($schema->hasTable("revision"))
            $schema->dropTable("revision");

        $revision = $schema->createTable('revision');
        $revision->addColumn('id', 'integer', array('autoincrement' => true));
        $revision->addColumn('token', 'string');
        $revision->addColumn('user_token', 'string');
        $revision->addColumn('created_at', 'datetime');
        $revision->addUniqueIndex(array("token"));
        $revision->setPrimaryKey(array('id'));

        if($schema->hasTable("log"))
            $schema->dropTable("log");

        $log = $schema->createTable('log');
        $log->addColumn('id', 'integer', array('autoincrement' => true));
        $log->addColumn('created_at', 'datetime');
        $log->addColumn('user_token', 'string');
        $log->addColumn('token', 'string', array('notnull' => false));
        $log->addColumn('data', 'text');
        $log->setPrimaryKey(array('id'));
	}

	public function down(Schema $schema){

		$schema->dropTable("authorship");
        $schema->dropTable("ownership");
        $schema->dropTable("revision");
        $schema->dropTable("log");
	}
}