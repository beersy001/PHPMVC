<h2><?php echo $title ?></h2>


<h2><?php echo $todo['Item']['item_name'] ?></h2>

<a class="big" href="/PBSiteMVC/item/delete/<?php echo $todo['Item']['id'] ?>">
    <span class="item">
		Delete this item
    </span>
</a>