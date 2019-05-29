class Correios{

	/*Código da sua empresa, se você tiver contrato com os correios saberá qual é esse código… 
	Ele é opcional, se não tiver apenas envie o parâmetro em branco.	*/		
	private $cdEmpresa,
	/*Senha de acesso ao serviço. Geralmente é os 8 primeiros números do CNPJ correspondente ao código
	administrativo, caso não tiver é só passar o parâmetro em branco – Se quiser alterar a senha é só acessar 
	- http://www.corporativo.correios.com.br/encomendas/servicosonline/recuperaSenha*/
	$senha,
	/*Por fim o código do serviço.
	1) 40010 SEDEX Varejo.
	2) 40045 SEDEX a Cobrar Varejo.
	3) 40215 SEDEX 10 Varejo.
	4) 40290 SEDEX Hoje Varejo.
	5) 41106 PAC Varejo.
	Existem outros códigos que só podem ser usado com contrato, os correios tirou do ar esses códigos, e deixou a 
	instrução “para outros serviços, consulte o código no seu contrato.”, mas… eu tenho os códigos da antiga 
	documentação que são (Nada garante que continuam sendo esses, melhor confirmar antes):
	1) 40126 SEDEX a Cobrar, com contrato.
	2) 40096 SEDEX com contrato.
	3) 40436 SEDEX com contrato.
	4) 40444 SEDEX com contrato.
	5) 40568 SEDEX com contrato.
	6) 40606 SEDEX com contrato.
	7) 41068 PAC com contrato.
	8) 81019 e-SEDEX, com contrato.
	9) 81027 e-SEDEX Prioritário, com conrato.
	10) 81035 e-SEDEX Express, com contrato.
	11) 81868 (Grupo 1) e-SEDEX, com contrato.
	12) 81833 (Grupo 2) e-SEDEX, com contrato.
	13) 81850 (Grupo 3) e-SEDEX, com contrato.
	14) Os serviços marcados com contrato irão necessitar do código da empresa e senha de acesso ao serviço.
	*/
	$servico = '40010, 41106',
	
	/*Um agora acho que o item mais importante que é o CEP de origem, no caso o CEP de onde sai à encomenda. 
	Esse parametro precisa ser numérico, ou seja, você deverá formatar ele para que não entre o “-“ (hífen) 
	espaços ou algo diferente de um número.*/
	$cepOrigem,
	/*CEP de destino, é o CEP do comprador, para onde irá o produto, esse parâmetro também é somente números.*/
	$cepDestino,
	/*O peso do produto deverá ser enviado em quilogramas, leve em consideração que isso deverá incluir o peso 
	da embalagem.*/
	$peso,
	/*Não sei por qual motivo mas é necessário falar qual formato da encomenda, nesse caso tem apenas duas
	opções: 1 para caixa / pacote e 2 para rolo/prisma.*/
	$formato = "1",
	/*O comprimento, altura, largura e diametro deverá ser informado em centímetros e somente números*/
	$comprimento,
	$altura,
	$largura,
	$diametro = 0,
	/*Mão própria, nesse parâmetro você informa se quer a encomenda deverá ser entregue somente para uma 
	determinada pessoa após confirmação por RG. Use “s” para declarar e “n” para não declarar.*/
	$maoPropria = 's',
	/*O valor declarado serve para o caso de sua encomenda extraviar, então você poderá recuperar o valor dela.
	Vale lembrar que o valor da encomenda interfere no valor do frete. Se não quiser declarar pode passar 0 (zero).*/
	$valorDeclarado = "0",
	/*No parâmetro aviso de recebimento, você informa se quer ser avisado sobre a entrega da encomenda. Para não avisar use “n”, para avisar use “s”.*/
	$avisoRecebimento = 'n',
	/*Por ultimo podemos informar qual formato queremos a consulta seja retornada, podendo ser
	1) Popup – mostra uma janela pop-up
	2) URL – envia os dados via post para a URL informada
	3) XML – Retorna a resposta em XML*/
	$retorno = 'xml';
	
	
	public function setServico($servico){
		$this->servico = $servico;
	}
	
	public function setCepOrigem($cepOrigem){
		$this->cepOrigem = $cepOrigem;
	}
	
	public function setCepDestino($cepDestino){
		$this->cepDestino = $cepDestino;
	}
	
	public function setPeso($peso){
		$this->peso = $peso;
	}
	
	public function setFormato($formato){
		$this->formato = $formato;
	}
	
	public function setComprimento($comprimento){
		$this->comprimento = $comprimento;
	}
	
	public function setAltura($altura){
		$this->altura = $altura;
	}

	public function setDiametro($diametro){
		$this->diametro = $diametro;
	}

	public function setLargura($largura){
		$this->largura = $largura;
	}
	
	public function setMaoPropria($maoPropria){
		$this->maoPropria = $maoPropria;
	}
	
	public function setValorDeclarado($valorDeclarado){
		$this->valorDeclarado = $valorDeclarado;
	}
	
	public function setAvisoRecebimento($avisoRecebimento = 'N'){
		$this->avisoRecebimento = $avisoRecebimento;
	} 
	
	public function setRetorno($retorno = 'xml'){
		$this->retorno = $retorno;
	}
	
	
	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	public function setCdEmpresa($cdEmpresa){
		$this->cdEmpresa = $cdEmpresa;
	}
	
	public function calcularDiametro(){
		$this->diametro = $this->comprimento * $this->altura * $this->largura;
	}
	
	public function calcular($default = false){
		 $data = array();
		 $data['nCdEmpresa'] = $this->cdEmpresa;
		 $data['sDsSenha'] = $this->senha;
		 $data['sCepOrigem'] = $this->cepOrigem;
		 $data['sCepDestino'] = $this->cepDestino;
		 $data['nVlPeso'] = $this->peso;
		 $data['nCdFormato'] = $this->formato;
		 $data['nVlComprimento'] = $this->comprimento;
		 $data['nVlAltura'] = $this->altura;
		 $data['nVlLargura'] = $this->largura;
		 $data['nVlDiametro'] = $this->diametro;
		 $data['sCdMaoPropria'] = $this->maoPropria;
		 $data['nVlValorDeclarado'] = $this->valorDeclarado;
		 $data['sCdAvisoRecebimento'] = $this->maoPropria;
		 $data['StrRetorno'] = $this->retorno;
		 $data['nCdServico'] = $this->servico;
	
		 $data = http_build_query($data);
		
		 $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
		 $curl = curl_init($url . '?' . $data);
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		 $result = curl_exec($curl);
		 $result = simplexml_load_string($result);
		
		// retorna  formatado como json mantendo padrão entregue pelo webserice dos correios
		if($default){
		    echo json_encode($result);
			exit;
		 }
		
		 $result = json_decode(json_encode($result));
		
		 $tipo = array(
			 "41106" => "PAC",
			 "40010" => "SEDEX",
			 "40045" => "SEDEX a Cobrar Varejo",
			 "40215" => "SEDEX 10 Varejo",
			 "40290" => "SEDEX Hoje Varejo",
			 "40126" => "SEDEX a Cobrar, com contrato",
			 "40096" => "SEDEX com contrato",
			 "40436" => "SEDEX com contrato",
			 "40444" => "SEDEX com contrato",
			 "40568" => "SEDEX com contrato",
			 "40606" => "SEDEX com contrato",
			 "41068" => "PAC com contrato",
		   	 "81019" => "e-SEDEX, com contrato",
			 "81027" => "e-SEDEX Prioritário, com conrato",
			 "81035" => "e-SEDEX Express, com contrato",
			 "81868" => "(Grupo 1) e-SEDEX, com contrato",
			 "81833" => "(Grupo 2) e-SEDEX, com contrato",
			 "81850" => "(Grupo 3) e-SEDEX, com contrato"
		 );
		 $sn = array("N" => "Não", "S" => "Sim" );
		
		 $json = array();	
		 //formata os dados recebidos pelo webservice
		 foreach($result->cServico as $index => $row) {
		 if($row->Erro == 0) {
			 $json[$index] = array(
			 "tipo" => $tipo[$row->Codigo],
			 "codigo" => $row->Codigo,
			 "valor" =>  "R$ ".$row->Valor,
			 "prazo_entrega" => $row->PrazoEntrega." Dias",
			 "valor_mao_propria" => "R$ ".$row->ValorMaoPropria,
			 "valor_aviso_recebimento" => "R$ ".$row->ValorAvisoRecebimento,
			 "valor_valor_declarado" => "R$ ".$row->ValorValorDeclarado,
			 "entrega_domiciliar" => $sn[$row->EntregaDomiciliar],
			 "entrega_sabado" => $sn[$row->EntregaSabado]
			 );	 
			 } else {
				$json[$index] = array("error"=>$row->MsgErro);
			 }
		 }
		return json_encode(array("frete" => $json));
		exit;
	}
	
	
}

