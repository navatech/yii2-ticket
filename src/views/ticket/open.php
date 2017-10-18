<?php

use navatech\ticket\models\TicketBody;
use navatech\ticket\models\TicketFile;
use navatech\ticket\models\TicketHead;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Support';
/** @var TicketHead $ticketHead */
/** @var TicketBody $ticketBody */
/** @var TicketFile $fileTicket */
/** @var array $departments */
?>
<div class="panel page-block">
	<div class="col-sx-12">
		<a class="btn btn-primary" href="<?= Url::toRoute(['ticket/index']) ?>"
		   style="margin-bottom: 10px; margin-left: 15px">Go back</a>
		<?php $form = ActiveForm::begin([]) ?>
		<div class="col-xs-12">
			<?= $form->field($ticketBody, 'name_user')->textInput([
				'readonly' => '',
				'value'    => Yii::$app->user->identity['username'],
			]) ?>
		</div>
		<div class="col-xs-12">
			<?= $form->field($ticketHead, 'topic')->textInput()->label('Subject')->error() ?>
		</div>
		<div class="col-xs-12">
			<?= $form->field($ticketHead, 'department')->dropDownList($departments) ?>
		</div>
		<div class="col-xs-12">
			<?= $form->field($ticketBody, 'text')->textarea([
				'style' => 'height: 150px; resize: none;',
			]) ?>
		</div>
		<div class="col-xs-12">
			<?= $form->field($fileTicket, 'fileName[]')->fileInput([
				'multiple' => true,
				'accept'   => 'image/*',
			])->label(false); ?>
		</div>
		<div class="text-center">
			<button class='btn btn-primary'>Send</button>
		</div>
		<?php $form->end() ?>
	</div>
</div>
