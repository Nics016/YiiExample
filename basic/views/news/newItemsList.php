<?php if ($year != null): ?>
	<strong>List for year <?php echo $year ?></strong>
<?php endif; ?>
<?php if ($category != null): ?>
	<strong>List for category <?php echo $category ?></strong>
<?php endif; ?>
<br><br>

<table border="1">
	<tr>
		<th>Date</th>
		<th>Category</th>
		<th>Title</th>
	</tr>

	<?php foreach($filteredData as $el): ?>
		<tr>
			<td style="padding: 5px"><?php echo $el['date'] ?></td>
			<td style="padding: 5px"><?php echo $el['category'] ?></td>
			<td style="padding: 5px"><?php echo $el['title'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>