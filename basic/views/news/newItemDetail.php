<h1>Detail item with title <u><?php echo $title ?></u></h1>
<br><br>
<?php if($itemFound != null): ?>
	<table border="1">
		<?php foreach($itemFound as $key=>$value): ?>
			<tr>
				<th><?php echo $key ?></th>
				<td><?php echo $value ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<br>

	Url for this item is: <em><?php echo yii\helpers\Url::to(['news/new-item-detail', 'title' => $title]); ?></em>
<?php else: ?>
	<em>No item found.</em>
<?php endif; ?>
