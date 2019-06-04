<!DOCTYPE html>
<html>
<head>
	<title>palavras</title>
<body>

<?php

#Analisador

							$files = new FilesystemIterator("../htdocs/java/seata-develop/", FilesystemIterator::UNIX_PATHS);#caminho onde estão os manuais

							$filtered = new RegexIterator($files, "/\.(txt|md)$/i");#extensão dos manuais

							foreach($filtered as $file){

							}

							$files = new RecursiveDirectoryIterator('../htdocs/java/seata-develop/');#caminho onde estão os manuais

							$files = new RecursiveIteratorIterator($files);

							$filtered = new RegexIterator($files, "/\.(txt|md)$/i");#extensão dos manuais

$dados = fopen("resultado_manual.csv", "a") or die ("unable to open file");
set_time_limit(6000);
fwrite ($dados, "total_linhas".","."total_arquivos"."\r\n");
$total_linhas = 0;
$total_manuais = 0;

foreach($filtered as $file){
	$total_manuais++;
	$line = $file->getRealPath();
	$arquivo = $line;
	$extension = substr($line,strripos($line,".")+1);
	$nome_arquivo = substr($line,strripos($line,"\\")+1);
	$arrayArquivo = file($arquivo);
	$total_linhas = $total_linhas+sizeof($arrayArquivo);
}
fwrite ($dados, $total_linhas.",".$total_manuais."\r\n");

fclose ($dados);

echo "Total de linhas de manuais: ".$total_linhas."<BR><BR>";
echo "Total de manuais: ".$total_manuais."<BR><BR>";
$media = $total_linhas/$total_manuais;
echo "Média de linhas por manual: ".$media;

?>

</body>
</html>
