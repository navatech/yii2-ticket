<?php

use navatech\ticket\models\TicketBody;
use navatech\ticket\models\TicketFile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Support';
/** @var TicketBody $newTicket */
/** @var TicketBody $thisTicket */
/** @var TicketFile $fileTicket */
?>
<div class="panel page-block">
	<div class="container-fluid row">
		<div class="col-lg-12">
			<a class="btn btn-primary" href="<?= Url::to(['ticket/index']) ?>"
			   style="margin-bottom: 10px; margin-left: 15px"><?= Yii::t('ticket', 'Go back') ?></a>
			<a class="btn btn-primary" style="width: 100%" role="button" data-toggle="collapse" href="#collapseExample"
			   aria-expanded="false" aria-controls="collapseExample">
				<i class="glyphicon glyphicon-pencil pull-left"></i><span><?= Yii::t('ticket', 'Answer') ?></span>
			</a>
			<?php if ($error = Yii::$app->session->getFlash('error')) : ?>
				<div class="alert alert-danger text-center" style="margin-top: 10px;"><?= $error ?></div>
			<?php endif; ?>
			<div class="collapse" id="collapseExample">
				<div class="well">
					<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
					<?= $form->field($newTicket, 'text')->textarea(['style' => 'height: 150px; resize: none;'])->label(Yii::t('ticket', 'Message'))->error() ?>
					<?= $form->field($fileTicket, 'fileName[]')->fileInput([
						'multiple' => true,
						'accept'   => 'image/*',
					])->label(false); ?>
					<div class="text-center">
						<button class='btn btn-primary'><?= Yii::t('ticket', 'Send') ?></button>
					</div>
					<?= $form->errorSummary($newTicket) ?>
					<?php $form->end() ?>
				</div>
			</div>
			<div class="clearfix" style="margin-bottom: 20px"></div>
			<?php foreach ($thisTicket as $ticket) : ?>
				<div class="panel panel-primary">
					<div class="panel-heading">
                <span><?= $ticket['name_user'] ?>&nbsp;<span
			                style="font-size: 12px">(<?= ($ticket['client'] == 1) ? Yii::t('ticket', 'Support') : Yii::t('ticket', 'Client') ?>)</span></span>
						<span class="pull-right"><?= $ticket['date'] ?></span>
					</div>
					<div class="panel-body clearfix" style="word-wrap: break-word;">
						<?= nl2br(Html::encode($ticket['text'])) ?>
						<?php if (!empty($ticket->file)) : ?>
							<hr>
							<?php foreach ($ticket->file as $file) : ?>
								<a href="<?= Url::home() ?>fileTicket/<?= $file->fileName ?>" target="_blank"><img
											src="<?= Url::home() ?>fileTicket/reduced/<?= $file->fileName ?> " alt="..."
											class="img-thumbnail"></a>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
