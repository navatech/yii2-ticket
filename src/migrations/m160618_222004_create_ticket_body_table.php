<?php

use yii\db\Migration;

/**
 * Handles the creation for table `ticket_body_table`.
 */
class m160618_222004_create_ticket_body_table extends Migration {

	private $table       = '{{%ticket_body}}';

	private $ticket_head = '{{%ticket_head}}';

	/**
	 * @inheritdoc
	 */
	public function up() {
		$this->createTable($this->table, [
			'id'        => $this->primaryKey(),
			'id_head'   => $this->integer()->notNull(),
			'name_user' => $this->string(255),
			'text'      => $this->text(),
			'client'    => $this->integer(1)->defaultValue('0'),
			'date'      => $this->timestamp(),
		]);
		$this->createIndex('i_ticket_body', $this->table, 'id_head');
		$this->addForeignKey('fk_ticket_body', $this->table, 'id_head', $this->ticket_head, 'id', 'CASCADE', 'CASCADE');
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropForeignKey('fk_ticket_body', $this->table);
		$this->dropIndex('i_ticket_body', $this->table);
		$this->dropTable($this->table);
	}
}
