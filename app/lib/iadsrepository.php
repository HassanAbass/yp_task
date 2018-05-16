<?php

namespace PHPMVC\LIB;

interface IAdsRepository {
	public function save();
	public function deleteInstance($id);
	public static function getAll();
}