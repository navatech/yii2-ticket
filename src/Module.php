<?php

namespace navatech\ticket;

use navatech\ticket\models\User;
use Yii;

/**
 * ticket module definition class
 */
class Module extends \yii\base\Module {

	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'navatech\ticket\controllers';

	/** @var bool Уведомление на почту о тикетах */
	public $mailSend = true;

	/** @var string Тема email сообщения когда пользователю приходит ответ */
	public $subjectAnswer = 'Ответ на тикет сайта exemple.com';

	/** @var  User */
	public $userModel   = false;

	public $departments = [
		'Вопрос  по обмену' => 'Вопрос  по обмену',
		'Пополнению ЛК'     => 'Пополнению ЛК',
		'Вводу средств'     => 'Вводу средств',
		'Выводу средств'    => 'Выводу средств',
		'Другое'            => 'Другое',
	];

	/** @var array Ники администраторав */
	public $admin = ['admin'];

	/** @var string */
	public $uploadFilesDirectory = '@webroot/fileTicket';

	/** @var string */
	public $uploadFilesExtensions = 'png, jpg';

	/** @var int */
	public $uploadFilesMaxFiles = 5;

	/** @var null|int */
	public $uploadFilesMaxSize = null;

	/** @var bool|int */
	public $pageSize = false;

	/**
	 * @inheritdoc
	 */
	public function init() {
		User::$user = ($this->userModel !== false) ? $this->userModel : Yii::$app->user->identityClass;
		parent::init();
	}
}
