<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<script type='text/javascript'>
		$(document).ready(function(){
			swal({title:'Erro',text:'Acesso Negado',icon:'error',button:'Tente novamente'})
				.then((value) => {
					$(window.document.location).attr('href','../index.php');
			});
		});
	</script>
</head>
<body>

</body>
</html>