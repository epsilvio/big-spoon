<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){    
  		$secure = "TRUE";
	}else{
		$secure = "FALSE";
	}
?>
