<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 - Esta Página no Funciona</title>

	<style>
		div.logo {
			height: 200px;
			width: 155px;
			display: inline-block;
			opacity: 0.08;
			position: absolute;
			top: 2rem;
			left: 50%;
			margin-left: -73px;
		}
		body {
			height: 100%;
			background: #fafafa;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #777;
			font-weight: 300;
		}
		h1 {
			font-weight: lighter;
			letter-spacing: 0.8;
			font-size: 3rem;
			margin-top: 0;
			margin-bottom: 0;
		}
		.wrap {
			max-width: 1024px;
			margin: 5rem auto;
			padding: 70px;
			background-color: rgb(255, 165, 0);

			text-align: justify;
			border: 1px solid black;
			border-radius: 10px;
			position: relative;
		}

		.wrap h2, p{
			color: black;
			font-size: 20px;
		}
		.wrap h1{
			color: white;
			font-size: 30px;
		}
		.body-error{
			background-image: url(img/error404.png);
			background-repeat: no-repeat;
			background-position: top;
			margin-top: 500px;
		}
		pre{
			white-space: normal;
			margin-top: 1.5rem;
		}
		code{
			background: #fafafa;
			border: 1px solid #efefef;
			padding: 0.5rem 1rem;
			border-radius: 5px;
			display: block;
		}
		p{
			margin-top: 1.5rem;
		}
		.footer {
			margin-top: 2rem;
			border-top: 1px solid #efefef;
			padding: 1em 2em 0 2em;
			font-size: 85%;
			color: #999;
		}
		a:active,
		a:link,
		a:visited {
			color: #dd4814;
		}
		.secciones-posibles a{
			color: black;
			text-decoration: none; /*sin subrayado*/
			text-transform: uppercase; /* MAYUSCULA */
			list-style: none;
			padding: 0px;
			margin: 0px;
			margin-right: 15px;
			font-size: 20px;
			color: blue;
			border: solid 1px black;
			border-radius: 4px;
		}

		.secciones-posibles{
			padding: 0px auto;
		}
		.secciones-posibles :hover{
			color: white;
			background-color: black;
			transition: 0.8s;
			
		}
	</style>
</head>
<body class="body-error">
	<div class="wrap">
		<h1> Error 404 - Esta Página no Funciona</h1>
		<p>
			<?php if (! empty($message) && $message !== '(null)') : ?>
				<!-- <?= nl2br(esc($message)) ?> -->
				Disculpe! Parece que la página que esta buscando no se encuntra disponible o está en desarrollo 
				
			<?php else : ?>

			<?php endif ?>
		</p>
		<h2>LO INVITAMOS A VISITAR ALGUNAS DE NUESTRAS SECCIONES DISPONIBLES</h2>
		<div class="secciones-posibles">
            <a href="index"> INICIO</a>
            <a href="productos">PRODUCTOS </a>
            <a href="contacto">CONTACTO</a>
            <a href="quienes_somos">QUIÉNES SOMOS</a>
            <a href="comercializacion">COMERCIALIZACIÓN</a>
        </div>
		<br> <p><b>Atte:</b> FORRAJERÍA HABERLES</p>
	</div>
</body>
</html>
