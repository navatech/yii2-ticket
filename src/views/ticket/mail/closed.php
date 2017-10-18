<?php

use navatech\ticket\models\TicketHead;
use yii\bootstrap\Html;

?>
<p style="text-align: center;"><img src="http://wallbtc.com/img/logo.png" alt=""/></p>
<p style="text-align: left; font-size: 14px;"><?= Html::encode($textTicket) ?></p>
<hr/>
<p>
	<strong>Тикет:&nbsp;</strong><?= $nameTicket ?>
	<br/>
	<strong>Статус:&nbsp;</strong>
	<?php
	switch ($status) {
		case TicketHead::OPEN :
			echo 'Открыт';
			break;
		case TicketHead::WAIT :
			echo 'Ожидание';
			break;
		case TicketHead::ANSWER :
			echo 'Отвечен';
			break;
		case TicketHead::CLOSED :
			echo 'Закрыт';
			break;
	}
	?>
	<br/>
	<strong>Ссылка:&nbsp;
		<a
				href="<?= $link ?>"><?= $link ?>
		</a>
	</strong>
</p>
<hr/>
<em>
	<span style="color: #808080;">Это письмо сформировано автоматически службой уведомлений WallBtc.com. Отвечать на него не нужно</span>
</em