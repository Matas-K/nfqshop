<?php
if(!defined('ROOT_PATH')){
	exit;
}
?><form action="<?php echo $content['order_submit_url']; ?>" method="post">
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $this->e($content['order']['name']); ?>">
		<?php if (isset($content['errors']['name'])){
			?><div class="error-text">Fill required field</div><?php
		} ?>
	</div>
	<div class="form-group">
		<label for="lastname">Last name</label>
		<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" value="<?= $this->e($content['order']['lastname']); ?>">
		<?php if (isset($content['errors']['lastname'])){
			?><div class="error-text">Fill required field</div><?php
		} ?>
	</div>
	<div class="form-group">
		<label for="email">Email address</label>
		<input type="email" class="form-control" id="email" name="email"  placeholder="Enter email" value="<?= $this->e($content['order']['email']); ?>">
		<?php if (isset($content['errors']['email'])){
			if(in_array('required', $content['errors']['email'])){
				?><div class="error-text">Fill required field</div><?php
			}
			else if(in_array('email', $content['errors']['email'])){
				?><div class="error-text">Email is not valid</div><?php
			}
		} ?>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>