<?php

namespace views;

abstract class abstractView implements viewI
{
	abstract public function render();
	abstract public function output();
}
