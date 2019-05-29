<?php 

	require_once("controll/Correios.php");



	$correios = new Correios();
	
	$correios->setCepOrigem($_POST["cepOrigem"]);
	$correios->setCepDestino($_POST["cepDestino"]);
	$correios->setPeso($_POST["peso"]);
	$correios->setComprimento($_POST["comprimento"]);
	$correios->setAltura($_POST["altura"]);
	$correios->setLargura($_POST["largura"]);
	$correios->setMaoPropria($_POST["maoPropria"]);
	$correios->setDiametro($_POST["diametro"]);
	
	echo $correios->calcular();



?>