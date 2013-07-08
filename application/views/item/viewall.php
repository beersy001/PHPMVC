
<h2><?php echo $title ?></h2>

<form action="/PBSiteMVC/item/add" method="post">
	<input type="text" value="I have to..." onclick="this.value = ''" name="todo"> <input type="submit" value="add">
</form>
<br/><br/>

<?php $number = 0 ?>
<?php foreach ($todoList as $todoitem) { ?>
	<a class="big" href="/PBSiteMVC/item/view/<?php echo $todoitem['Item']['id'] ?>/<?php echo strtolower(str_replace(" ", "-", $todoitem['Item']['item_name'])) ?>">
		<span class="item">
			<?php echo++$number ?> -
			<?php echo $todoitem['Item']['item_name'] ?>
		</span>
	</a><br/>
<?php }
?>

<br/>