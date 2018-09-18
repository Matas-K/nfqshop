<?php

namespace core;

use \PDO;
use \models\Model;

class DataBase extends PDO
{
	protected $charset = 'utf8';
	
	public function __construct(array $config){
		if(!isset($config['driver'])){
			$config['driver'] = 'mysql';
		}
		if(isset($config['charset'])){
			$this->charset = $config['charset'];
		}
		$dsn = $config['driver'].':host='.$config['host'].';dbname='.$config['name'].';charset='.$this->charset;
		$options = array(
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_STRINGIFY_FETCHES => true, // all colums as strings
			PDO::ATTR_EMULATE_PREPARES => false // dont escape limit integers
		);
		$options[PDO::ATTR_ERRMODE] = (defined('DEBUG_MODE') && DEBUG_MODE) ? PDO::ERRMODE_EXCEPTION : PDO::ERRMODE_WARNING;
		if(isset($config['options'])){
			foreach($config['options'] as $k=>$v){
				$options[$k]=$v;
			}
		}
		parent::__construct($dsn, $config['user'], $config['password'], $options);
	}
	
	public function insertModel($table, Model $model){
		$keys = $model->getDataKeysWitoutPrimaryColumns();
		
		if(count($keys) === 0){
			return false;
		}
		
		$sql = "INSERT INTO `".$table."` (".$this->getColumnsFromKeys($keys).") VALUES (".$this->getPreparedValuesFromKeys($keys).")";
        $query = $this->prepare($sql);
		
		$data = $model->getDataWitoutPrimaryColumns();
		$query_data = $this->getQueryData($data);
		
		return $query->execute($query_data);
	}
	
	public function updateModel(Model $model){
		
	}
	
	public function getColumnsFromKeys(array $keys = []){
		if(count($keys) === 0){
			return "";
		}
		
		return "`".implode("`, `", $keys)."`";
	}
	
	public function getPreparedValuesFromKeys(array $keys = []){
		if(count($keys) === 0){
			return "";
		}
		
		return ":".implode(", :", $keys);
	}
	
	public function getQueryData($data){
		$query_data = array();
		foreach($data as $key => $value){
			$query_data[':'.$key] = $value;
		}
		return $query_data;
	}
	
}

