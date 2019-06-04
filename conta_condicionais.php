<!DOCTYPE html>
<html>
<head>
	<title>Condicionais</title>
<body>

<?php

#Analisador

							$files = new FilesystemIterator("../htdocs/java/seata-develop/", FilesystemIterator::UNIX_PATHS);#caminho onde estão os manuais

							$filtered = new RegexIterator($files, "/\.(java)$/i");#extensão dos manuais

							foreach($filtered as $file){

							}

							$files = new RecursiveDirectoryIterator('../htdocs/java/seata-develop/');#caminho onde estão os manuais

							$files = new RecursiveIteratorIterator($files);#extensão dos manuais

							$filtered = new RegexIterator($files, "/\.(java)$/i");

$dados = fopen("resultado_condicionais.csv", "a") or die ("unable to open file");
set_time_limit(6000);
fwrite ($dados, "condicionais".","."total_arquivos"."\r\n");
$contador = 0;
$numero_ocorrencias = 0;
$total_arquivos = 0;

							foreach($filtered as $file){
								$line = $file->getRealPath();
								$total_arquivos++;

#Palavras
$arquivo = $line;
$extension = substr($line,strripos($line,".")+1);
$nome_arquivo = substr($line,strripos($line,"\\")+1);

#if
$procura = " if ";
$arrayArquivo = file($arquivo);
#$contador = 0;
#$numero_ocorrencias = 0;
$total_linhas = sizeof($arrayArquivo);
for($i = 0; $i < sizeof($arrayArquivo); $i++){
$arrayArquivo[$i]="*".$arrayArquivo[$i];
while(($numero_ocorrencias = strpos(strtolower($arrayArquivo[$i]), $procura, $numero_ocorrencias+1)) != 0){$contador++;}
}
#fwrite ($dados, trim($procura).",".$arquivo.",".$contador.",".$nome_arquivo.",".$extension.",".$total_linhas."\r\n");

#else
$procura = " else ";
$arrayArquivo = file($arquivo);
#$contador = 0;
#$numero_ocorrencias = 0;
for($ipalavras = 0; $ipalavras < sizeof($arrayArquivo); $ipalavras++){
$arrayArquivo[$ipalavras]="*".$arrayArquivo[$ipalavras];
while(($numero_ocorrencias = strpos(strtolower($arrayArquivo[$ipalavras]), $procura, $numero_ocorrencias+1)) != 0){$contador++;}
}
#fwrite ($dados, trim($procura).",".$arquivo.",".$contador.",".$nome_arquivo.",".$extension.",".$total_linhas."\r\n");

#switch
$procura = " switch ";
$arrayArquivo = file($arquivo);
#$contador = 0;
#$numero_ocorrencias = 0;
for($ipalavras = 0; $ipalavras < sizeof($arrayArquivo); $ipalavras++){
$arrayArquivo[$ipalavras]="*".$arrayArquivo[$ipalavras];
while(($numero_ocorrencias = strpos(strtolower($arrayArquivo[$ipalavras]), $procura, $numero_ocorrencias+1)) != 0){$contador++;}
}
#fwrite ($dados, trim($procura).",".$arquivo.",".$contador.",".$nome_arquivo.",".$extension.",".$total_linhas."\r\n");

}
fwrite ($dados, $contador.",".$total_arquivos);
fclose ($dados);
echo "Total de condicionais: ".$contador."<br><br>";
echo "Total de arquivos: ".$total_arquivos."<br><br>";
?>

</body>
</html>
