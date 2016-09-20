<?
$arquivo = "arquivo.txt";
$arquivo = file("$arquivo");

echo "<form action=\"gravar1.php\" id=\"form\" name=\"form\" method=\"post\">";
echo "Verificar Deposito<br /><textarea name=\"texto\" rows=\"20\" cols=\"90\">";
foreach($arquivo as $texto) {
echo "$texto";
}
echo "</textarea><br />";
echo "";
echo "</form>";
?>