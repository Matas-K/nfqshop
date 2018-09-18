<?php
if(!defined('ROOT_PATH')){
	exit;
}

if(isset($content['insert_success'])){
	if($content['insert_success']){
		?><div class="success-text">Order is accepted</div><?php
	}
	else {
		?><div class="error-text">Due to technical reasons, the order could not be saved, please try later.</div><?php
	}
}

?>

<h1>Product</h1>
<div class="description">
	Vivamus commodo lorem in sapien vulputate laoreet. Sed sagittis mauris dolor, eu tempor justo placerat vitae. Vivamus ipsum nunc, pulvinar vel ligula in, fringilla vestibulum augue. Cras dapibus congue nibh, eget euismod turpis cursus pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi nisi ante, tincidunt vitae finibus sed, blandit sit amet eros. Donec ultricies rhoncus nunc in efficitur. Sed ut ultricies est. In in eros urna. 
</div>

<div id="buy-form">
<h3>Order product</h3>
<?php $this->includeFile('orderform'); ?>
</div>

<div><br></div>
<div><a href="<?php echo $content['order_list']; ?>">Order list</a></div>
	