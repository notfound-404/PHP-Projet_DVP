<?php
	function hashme($passwd){
		return hash('sha256',$passwd);
	}

	$user_auth = array(
		"admin_cookie" => hashme("MyPassWd_Ub3r_h4rD_l0nG_l3ngtH"),
		"test" => hashme("test")
	);
?>
