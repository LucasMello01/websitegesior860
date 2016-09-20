<?php  
//PEGA OS DADOS ENVIADOS PELO FORMULÁRIO 
$assunto = $_POST["assunto"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$id = $_POST["account"];
$personagem = $_POST["personagem"];
$valor = $_POST["valor"];
$data = $_POST["data"];
$hora = $_POST["hora"];
$imagem = $_POST["imagem"];

//PREPARA O CONTEÚDO A SER GRAVADO 
$conteudo = "

<=============================>
Assunto: $assunto,
Nome: $nome,
Email: $email,
Account: $id,
personagem: $personagem,
Valor: $valor,
Data: $data,
Horas: $hora,
Imagem: $imagem,
<=============================>

\r\n"; 

//ARQUIVO TXT 
$arquivo = "arquivo.txt"; 

//TENTA ABRIR O ARQUIVO TXT 
if (!$abrir = fopen($arquivo, "a")) { 
echo "Erro abrindo arquivo ($arquivo)"; 
exit; 
} 

//ESCREVE NO ARQUIVO TXT 
if (!fwrite($abrir, $conteudo)) { 
print "Erro escrevendo no arquivo ($arquivo)"; 
exit; 
} 

echo "Sua Confirmação foi bem sucedida !!"; 

//FECHA O ARQUIVO  
fclose($abrir);  
?>
