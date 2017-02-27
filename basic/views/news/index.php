<h1>Welcome to the <em>News</em> page</h1>
<?php 
	use yii\helpers\Url;
	use yii\helpers\Html;
 ?>

<strong>Filter data by year:</strong>
<br>
<ul>
	<?php $currentYear = date('Y'); ?>
	<?php for($year = $currentYear; $year > ($currentYear - 5); $year--): ?>
		<li><?php echo Html::a('List items by year '.$year,
								Url::to(['news/new-items-list', 'year' => $year])) ?></li>
	<?php endfor; ?>
</ul>
<br>

<strong>Filter data by category:</strong>
<br>
<ul>
	<?php $categories = ['business', 'shopping']; ?>
	<?php foreach($categories as $cat): ?>
		<li><?php echo Html::a('List items by category '.$cat, Url::to(['news/new-items-list', 'category' => $cat])) ?></li>
	<?php endforeach; ?>
</ul>