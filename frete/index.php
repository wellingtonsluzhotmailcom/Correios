<!DOCTYPE html>
<html>
	<head>
		<title>Frete Correios</title>	
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<h1>Calcular frete com o webservice dos correios - PHP</h1>
		
			
		<div class="main">
			<form action="frete.php" method="post">
				<div class="table">
					<div class="table-cell">
						<label for="cepOrigem">CEP ORIGEM</label>
						<input type="text" id="cepOrigem" name="cepOrigem" value="76510000" required="required" />
						<label for="cepDestino">CEP DESTINO</label>
						<input type="text" id="cepDestino" name="cepDestino" value="76500000" required="required" />
						<label for="peso">Peso (KG)</label>
						<input type="text" id="peso" name="peso" value="2" required="required" />
						<label for="maoPropria">Mão Própria (Propietário com RG) </label>
						<select id="maoPropria" name="maoPropria"  required="required">
							<option value="N">Não</option>
							<option value="S">Sim</option>
						</select>
					</div>
					<div class="table-cell">
						<label for="comprimento">Comprimento (cm)</label>
						<input type="text" id="comprimento" name="comprimento" value="17" required="required" />
						<label for="diametro">Diametro (cm)</label>
						<input type="text" id="diametro" name="diametro" value="0" required="required" />
						<label for="altura">altura (cm)</label>
						<input type="text" id="altura" name="altura" value="15" required="required" />
						<label for="largura">largura (cm)</label>
						<input type="text" id="largura" name="largura" value="15" required="required" />
						<input type="submit" value="Calcular" /> 
					</div>
				
				</div>
				
			</form>	
	 	</div>
			
				
	</body>	
</html>

