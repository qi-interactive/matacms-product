<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

use yii\db\Schema;
use yii\db\Migration;

class m150521_093240_init extends Migration {

	public function safeUp() {
		$this->createTable('{{%matacms_product}}', [
			'Id'                   => Schema::TYPE_PK,
			'Name'             => Schema::TYPE_TEXT . ' NOT NULL',
			'Text'	=> Schema::TYPE_TEXT . ' NOT NULL',
			'URI'	=> Schema::TYPE_STRING . '(255) NOT NULL',
			'PublicationDate' => Schema::TYPE_DATETIME . ' NOT NULL'
			]);
	}

	public function safeDown() {
		$this->dropTable('{{%matacms_product}}');
	}

}
