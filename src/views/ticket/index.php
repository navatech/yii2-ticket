<?php

use navatech\ticket\models\TicketHead;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var TicketHead $dataProvider */
$this->title = 'Support';
$this->registerJs("

    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
           location.href = '" . Url::toRoute([
		'ticket/view',
		'id' => '',
	]) . "' + id ;
    });

");
?>
<div class="panel page-block">
	<div class="container-fluid row">
		<div class="col-lg-12">
			<a type="button" href="<?= Url::to(['ticket/open']) ?>" class="btn btn-primary pull-right"
			   style="margin-right: 10px">Open new ticket</a>
			<div class="clearfix" style="margin-bottom: 10px"></div>
			<div>
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'rowOptions'   => function($model) {
						return [
							'data-id' => $model->id,
							'class'   => 'ticket',
						];
					},
					'columns'      => [
						'department',
						'topic',
						[
							'attribute'      => 'status',
							'contentOptions' => [
								'style' => 'text-align:center;',
							],
							'value'          => function($model) {
								switch ($model['status']) {
									case TicketHead::OPEN :
										return '<div class="label label-default">Open</div>';
									case TicketHead::WAIT :
										return '<div class="label label-warning">Waiting</div>';
									case TicketHead::ANSWER :
										return '<div class="label label-success">Answered</div>';
									case TicketHead::CLOSED :
										return '<div class="label label-info">Closed</div>';
								}
							},
							'format'         => 'html',
						],
						[
							'contentOptions' => [
								'style' => 'text-align:right; font-size:13px',
							],
							'attribute'      => 'date_update',
							'value'          => "date_update",
						],
					],
				]) ?>
			</div>
		</div>
	</div>
</div>

