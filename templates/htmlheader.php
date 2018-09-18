<?php
if(!defined('ROOT_PATH')){
	exit;
}
?><!DOCTYPE html>
<html dir="ltr" lang="lt">
<head>
	<meta charset="UTF-8" />
	<title>Shop</title>
	<style>
		html, body{
			font-family: Arial, verdana;
			font-size:12px;
			line-height: 14px;
		}
		div.header.row > div.col{
			font-weight: bold;
			border-top: 1px solid black;
		}
		div.row > div.col{
			border: 1px solid black;
			border-left: 0 none;
			border-top: 0 none;
			float: left;
			padding: 5px;
			width: 200px;
		}
		div.row > div.col:first-child{
			border-left: 1px solid black;
			width: 50px;
		}
		div.row{
			overflow: hidden;
		}
		
		.form-group{
			margin-bottom: 10px;
		}
		.form-group > label{
			display: inline-block;
			min-width: 100px;
		}
		
		.error-text{
			color: red;
		}
		.success-text{
			color: green;
		}
	</style>
</head>
<body>