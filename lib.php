<?php 
	define('FILE_NAME', '.htpasswd');

	function userExist($login) {
		if (!is_file(FILE_NAME)) {
			return false;
		}
		$users = file(FILE_NAME);
		foreach ($users as $user) {
			if (strpos($user, $login . ':') !== false) {
				return $user;
			}
		}
		return false;
	}


 ?>