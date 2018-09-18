<?php

namespace models;

class Model
{
	protected $data = [];
	protected $data_keys = [];
	protected $filter = [];
	protected $validation = [];
	protected $errors = [];
	protected $primary_columns = [];
	
	public function __construct(array $data = []){
		$this->setData($data);
	}
	
	public function setDataKeys(array $keys = []){
		$this->data_keys = $keys;
	}
	
	public function setData(array $data = []){
		$this->data = $data;
	}
	
	public function setFilter(array $filter = []){
		$this->filter = $filter;
	}
	
	public function setValidation(array $validation = []){
		$this->validation = $validation;
	}
	
	public function getDataKeys(){
		return $this->data_keys;
	}
	
	public function getDataKeysWitoutPrimaryColumns(){
		$keys = array_diff($this->data_keys, $this->primary_columns);
		return $keys;
	}
	
	public function getData(){
		return $this->data;
	}
	
	public function getDataWitoutPrimaryColumns(){
		$data = array_diff_key($this->data, array_flip($this->primary_columns));
		return $data;
	}
	
	public function filterData(){
		foreach($this->filter as $field => $filters){
			$this->data[$field] = isset($this->data[$field]) ? $this->data[$field] : '';
			
			foreach($filters as $filter){
				if(is_callable($filter)){
					$this->data[$field] = call_user_func($filter, $this->data[$field]);
				}
				else if(is_string($filter)){
					$filter_call = array($this, 'filter' . $filter);
					if(is_callable($filter_call)){
						$this->data[$field] = call_user_func($filter_call, $this->data[$field]);
					}
					else {
						throw new modelException('Unknown model filter "'.$filter.'"');
					}
				}
				else {
					throw new modelException('Model filter is not string');
				}
			}
		}
		
		$this->data = array_intersect_key($this->data, array_flip($this->data_keys));
	}
	
	public function isValid(){
		$is_valid = true;
		$this->errors = [];
		
		foreach($this->validation as $field => $validations){
			foreach($validations as $validation){
				if(!is_string($validation)){
					throw new modelException('Model validator is not string');
				}
				
				$validation_call = array($this, 'validate' . $validation);
				if(is_callable($validation_call)){
					$is_field_valid = call_user_func($validation_call, $field);
					if(!$is_field_valid){
						$is_valid = false;
						$this->errors[$field][] =  $validation;
					}
				}
				else {
					throw new modelException('Unknown model validator "'.$validation.'"');
				}
			}
		}
		return $is_valid;
	}
	
	public function getErrors(){
		return $this->errors;
	}
	
	protected function filterInteger($value){
		return (int)$value;
	}
	
	protected function filterNoTags($value){
		return strip_tags($value);
	}
	
	protected function validateRequired($field){
		if(!isset($this->data[$field])){
			return false;
		}
		
		if(is_string($this->data[$field])){
			return ($this->data[$field] !== '');
		}
		
		return false;
	}
	
	protected function validateEmail($field){
		if(!isset($this->data[$field])){
			return false;
		}
		
		if(!is_string($this->data[$field])){
			return false;
		}
		
		return (filter_var($this->data[$field], FILTER_VALIDATE_EMAIL) !== false);
	}
}