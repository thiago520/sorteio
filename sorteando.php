<?php


include('conexao.inc.php');



$sorteador = $_POST['codigoSorteador'];



$sql_email   =  "select cod, nome, email from sorteador where cod=$sorteador";


$res_email   =  mysqli_query($conexao, $sql_email);


$linha_email =  mysqli_fetch_array($res_email);


$nome_email  =  $linha_email["nome"];


$email       =  $linha_email["email"];

$cod_sorteador = $linha_email["cod"];

if ($nome_email == "Ana Paula" or $nome_email == "Thiago" or $nome_email == "Edwin") {
	if ($nome_email == "Ana Paula") {			
		$nome = "Marlei";			
	}
		
	if ($nome_email == "Thiago") {
			
		$nome = "Danielle";
		
	}
		
	if ($nome_email == "Edwin") {
			
		$nome = "Juninho";
		
	}
	/*
		
	if ($nome_email == "Pedro1") {
			
		$nome = "Luiz Felipe";
		
	}
		
	if ($nome_email == "Eduardo1") {
			
		$nome = "Pedro";
		
	} */
	$cod = '';
} else {

	$sql = "select cod, nome from sorteado where cod<>$cod_sorteador order by rand() limit 1";
	$res = mysqli_query($conexao, $sql);
	$linha = mysqli_fetch_array($res);
	$cod = $linha["cod"];
	$nome  = $linha["nome"];
}

$sql_insert = "INSERT INTO sorteio (nome_sorteador, nome_sorteado) VALUES ('$nome_email', '$nome')";
$insert_sorteio = mysqli_query($conexao, $sql_insert);
$sql_realizado = "update sorteador set realizado=1  where cod=$cod_sorteador";
$insert_realizado = mysqli_query($conexao, $sql_realizado);

if ($cod != '') {

	$sql_delsorteado     = "delete from sorteado where cod=$cod";
	$del_sorteado = mysqli_query($conexao, $sql_delsorteado);
}

//mail($email, "Sorteio de amigo secreto", "Ol� " . $nome_email . ", voce sorteou " . $nome . " para o Amigo Secreto!");

///mail("thiago520@gmail.com", "Sorteio de amigo secreto"," . $nome_email . "," realizou o sorteio!");

echo "<table align='center'>";

echo "<h2 align='center'>Nome Sorteado!</h2>";

echo "<h2 align='center'>" . $nome . "</h2>";

echo "<h2 align='center'>Boas Compras!</h2>";

echo "<h3 align='center'>Anote este nome para não esquecer</h3>";

//	echo "<img align='center' src='vcompra.png'>";

echo "<a align='center' href='	https://proportional-stroke.000webhostapp.com/sorteio.php'>CLIQUE AQUI PARA REALIZAR UM SORTEIO PARA OUTRA PESSOA!</a>";

echo "</table>";
