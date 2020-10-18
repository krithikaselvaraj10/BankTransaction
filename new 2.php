<?php
function random() {
		return mt_rand(100000000000,999999999999);
	}
	$accno=random();
	echo "$accno";
?>