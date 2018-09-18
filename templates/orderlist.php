<?php
if(!defined('ROOT_PATH')){
	exit;
}
?>
<div><a href="<?php echo $content['index_url']; ?>">Home page</a></div>
<h1>Order list</h1>

<div class="header row">
	<div class="col">ID</div>
	<div class="col">Name</div>
	<div class="col">Last name</div>
	<div class="col">Email</div>
</div>
<?php 

if($content['list']){
	foreach($content['list'] as $item){
		?><div class="body row">
			<div class="col"><?= $item['id']; ?></div>
			<div class="col"><?= $item['name']; ?></div>
			<div class="col"><?= $item['lastname']; ?></div>
			<div class="col"><?= $item['email']; ?></div>
		</div><?php
	}
	if($content['page']['total'] > 0){
		?><div class="pager"><?php
		for($i = 0; $i < $content['page']['total']; $i++){
			if($i == $content['page']['current']){
				?><span class="current"><?php echo $i+1; ?></span><?php
			}
			else {
				?><a href="<?php printf($content['pager_url'], $i)?>"><?php echo $i+1; ?></a><?php
			}
		}
		?></div><?php
	}
}
else {
	?><div>No order items</div><?php
}

?>