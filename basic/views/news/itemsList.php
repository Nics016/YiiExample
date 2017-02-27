<?php echo $this->context->renderPartial('_copyright'); ?>
<br>
<table>
	<tr>
		<th>Title</th>
		<th>Date</th>
	</tr>
	<?php foreach($newsList as $item): ?>
		<tr>
			<?php 
				$curUrl = Yii::$app->urlManager->createUrl(['news/item-detail', 'id' => $item['id']]); 
			?>
			<td><a href="<?php echo $curUrl ?>"><?php echo $item['title'] ?></a></td>
			<td><?php echo $item['date'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>