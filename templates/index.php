<?php 
if(!defined('ROOT_PATH')){
	exit;
}

$this->includeFile('htmlheader');

if(isset($this->content_template)){
	$this->includeFile($this->content_template);
}

$this->includeFile('htmlfooter');
