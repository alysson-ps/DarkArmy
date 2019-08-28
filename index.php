<!DOCTYPE html>
<html>
	<head>
		<title>DarkArmy</title>
		<meta charset="utf-8" />
		<!-- Aquivos de estilo -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- Biblioteca em js -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

		<?php session_unset();?>
		<script type="text/javascript">
			$(document).ready(function(){
				// esconder a div login
				// $('.login_index').hide();

				//Quando precionar "Enter" aparece a div login
				$(document).keypress(function(key){
					if (key.which == 13){
						$('.login_index')
							.css("display","block")
							.delay('1000')
							.fadeIn('slow');
						$('.play')
							.hide()
							.delay('1000')
							.fadeOut('slow');
					}
				});
				// redireconar ao clicar no botão "in"
				$(".in").click(function(){
					$(window.document.location).attr('href','sign');
				});

				// redireconar ao clicar no botão "out"
				$(".out").click(function(){
					$(window.document.location).attr('href','login');
				});
			});
		</script>
	</head>
	<body class="body_index">
		<div class="login_index">
			<div id="sublog">
				<h1 id="teste"></h1>
				<img src="img/eliot.gif" class="gifter_eliot">
				<img src="img/father.gif" class="gifter_father">
				<div class="bnts">
					<button class="bnt in"> Cadastrar </button>
					<button class="bnt out"> Entrar </button>
				</div>
			</div>
		</div>
		<center>
			<h1 class="play">Press Enter</h1>
		</center>
	</body>
</html>