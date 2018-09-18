<?php
if(!defined('ROOT_PATH')){
	exit;
}
?>
<h1>Order list</h1>

<div class="header row">
	<div class="col">ID</div>
	<div class="col">Name</div>
	<div class="col">Last name</div>
	<div class="col">Email</div>
</div>
<?php 

if($content['list']){
	foreach($content['list'] as $item)
	?><div class="body row">
		<div class="col"><?= $item['id']; ?></div>
		<div class="col"><?= $item['name']; ?></div>
		<div class="col"><?= $item['lastname']; ?></div>
		<div class="col"><?= $item['email']; ?></div>
	</div><?php
}
else {
	?><div>No order items</div><?php
}

?>