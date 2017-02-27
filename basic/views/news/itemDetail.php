<?php // $item is from actionItemDetail ?>
<?php echo $this->context->renderPartial('_copyright'); ?>
<h2>News Item Detail</h2>
<br>
Title: <strong><?php echo $item['title'] ?></strong>
<br>
Date: <strong><?php echo $item['date'] ?></strong>