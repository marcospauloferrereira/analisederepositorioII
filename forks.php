<?php
	
	set_time_limit(60); //aumentando o tempo da execução do PHP para não dar time limit
	
	$vetor = array('Java'); //1 linguagens selecionadas
	$qtd_repositorios = 1;
	
	for($it=0; $it<1; $it++)
	{
	
	sleep(3); // sleep para aumentar o tempo de consultas na API para não bloquear por RATE LIMIT.
	$url = "https://api.github.com/search/repositories?q=language:".$vetor[$it]."&per_page=".$qtd_repositorios."&?client_id=f2fb8af26dade8fdde1b&client_secret=b85cd28a568afea9f77d6a5a2887818c687447a5";
	$opts = [
	'http' => [
	'method' => 'GET',
	'header' => [
	'User-Agent: aurelianomaia'
	]
	]
	];
	
	$json = file_get_contents($url, false, stream_context_create($opts));
	$obj = json_decode($json);
	$data = (array) $obj;
	
	#echo "<pre>";
	#var_dump($data);
	#echo "</pre>";
	
	
	$xml = json_decode(json_encode($data),true);
	echo "<br>" ;
	echo "<b>$vetor[$it]</b>";
	echo "<br>" ;
	for($i=0; $i<$qtd_repositorios; $i++)
	{
	$n= $i +1;
	echo "<b>Repositório ". $n . ": </b>";
	echo $xml["items"][$i]["html_url"];
	$usuario= $xml["items"][$i]["owner"]["login"];
	$nome_repositorio= $xml["items"][$i]["name"];
	$quantidadeEstrelas= $xml["items"][$i]["stargazers_count"];
	$quantidadeForks= $xml["items"][$i]["forks_count"];
	
	//echo " ---### Usuario: " . $usuario ." --- Nome repositorio: " . $nome_repositorio ;
	echo "<br>" ;
	echo " Quantidade de estrelas: ";
	echo "$quantidadeEstrelas";
	echo "<br>" ;
	echo " Quantidade de forks: ";
	echo "$quantidadeForks";
	echo "<br>" ;
	
	} // fim do for
	
	#echo $xml["items"][0]["git_url"];
	#echo "<br>";
	#echo $xml["items"][1]["git_url"];
	#	
	
	} // fim do for
	?>