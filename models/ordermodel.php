<?php

namespace models;

class OrderModel extends Model
{
	protected $primary_columns = [
		'id',
	];
	protected $data_keys = [
		'id',
		'name',
		'lastname',
		'email',
	];
	
	protected $filter = [
		'name' => ['notags', 'trim'],
		'lastname' => ['notags', 'trim'],
		'email' => [],
	];
	
	protected $validation = [
		'name' => ['required'],
		'lastname' => ['required'],
		'email' => ['required', 'email'],
	];
}