<?php

error_reporting(E_ALL);

ini_set('log_errors', 1);
ini_set('ignore_repeated_errors', 1);
ini_set('ignore_repeated_source', 1);

session_start();

date_default_timezone_set('Europe/Vilnius');

$config = require __DIR__.'/config.php';

define('BASE_URL', '/nfqshop2/');
define('ROOT_PATH', __DIR__.'/');
define('DEBUG_MODE', !empty($config['debug']));
ini_set('display_errors', DEBUG_MODE ? 1 : 0);


require ROOT_PATH.'core/autoload.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	case '':
		$order = new \models\OrderModel();
		$content = [
			'insert_success' => null,
			'order' => array_fill_keys($order->getDataKeysWitoutPrimaryColumns(), ''),
			'errors' => [],
			'order_submit_url' => BASE_URL.'?action=orderadd',
		];
		
		if(isset($_SESSION['success'])){
			$content['insert_success'] = $_SESSION['success'];
			unset($_SESSION['success']);
		}
		
		if(isset($_SESSION['order']) && is_array($_SESSION['order'])){
			$order->setData($_SESSION['order']);
			$order->filterData();
			if(!$order->isValid()){
				$content['errors'] = $order->getErrors();
			}
			$content['order'] = $order->getData();
			
			unset($_SESSION['order']);
		}
		
		$view = new \views\htmlView();
		$view->setContent($content);
		$view->setRootPath(ROOT_PATH);
		$view->setBaseTemplate('index');
		$view->setContentTemplate('product');
		break;
	
	case 'orderadd':
		$order = new \models\OrderModel($_POST);
		$order->filterData();
		
		if($order->isValid()){
			$db = new \core\DataBase($config['db']);
			$_SESSION['success'] = $db->insertModel('shop_orders', $order);
		}
		else {
			$_SESSION['order'] = $order->getData();
		}
		
		header('Location:  '.BASE_URL);
		exit;
		
	case 'orderlist':
		$content = [
			'list' => [],
		];
		
		//$page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
		
		$db = new \core\DataBase($config['db']);
		$statement = $db->query('SELECT * FROM `shop_orders` LIMIT ');
		while($row = $statement->fetch()) {
			$order = new \models\OrderModel($row);
			$content['list'][] = $order->getData();
		}
		
		$view = new \views\htmlView();
		$view->setContent($content);
		$view->setRootPath(ROOT_PATH);
		$view->setBaseTemplate('index');
		$view->setContentTemplate('orderlist');
		break;
		
	default:
		$view = new \views\htmlView();
		$view->setRootPath(ROOT_PATH);
		$view->setBaseTemplate('404');
		break;
}

if($view instanceof \views\viewI){
	$view->output();
	exit;
}
echo 'Pabaiga'; exit;