<?php

namespace views;

class htmlView extends abstractView {
	protected $template_dir = 'templates/';
	protected $base_template_path;
	protected $content_template;
	protected $content;

	protected $root_path = '/';
	
	public function setRootPath($root_path){
		$this->root_path = $root_path;
	}
	
	public function setContentTemplate($template){
		$this->content_template = $template;
	}
	
	public function setBaseTemplate($template){
		$path = $this->root_path.$this->template_dir.$template.'.php';
		if(file_exists($path)){
			$this->base_template_path = $path;
		}
	}
	
	public function setContent($content){
		$this->content = $content;
	}
	
	public function render(){
		$content = $this->content;
		ob_start();
		require $this->base_template_path;
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	public function output(){
		header("Content-Type: text/html; charset=utf-8");
		echo $this->render();
	}
	
	public function includeFile(string $file, array $params = array()){
		$content = $this->content;
		if(!empty($params)){
			extract($params);
		}
		$path = $this->root_path.$this->template_dir.$file.'.php';
		if(file_exists($path)){
			include $path;
		}
		elseif (DEBUG_MODE) {
			echo 'Template "'.$file.'" not found';
		}
	}
	
	/**
	 * Return escaped string
	 * 
	 * @param string $string
	 */
	public function e($string){
		return htmlspecialchars($string, ENT_QUOTES);
	}
}

