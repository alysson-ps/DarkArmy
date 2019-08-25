<?php
if (isset($_GET){
	$message = $_GET['msg'];
	$type = $_GET['type'];
	if($type == 'error'){
		echo '<script type="text/javascript">';
		echo '$(document).ready(function() {';
		echo "swal('Falha','$message','error');";
		echo "});";
		echo '</script>';
	}
}
?>