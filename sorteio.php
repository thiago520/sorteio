<?php

include("conexao.inc.php");

?>


<html>	

<table align="center">

	<form method="POST" action="sorteando.php">

		<tr align="center">

			<td>
				<h1>Selecione o seu nome </h1>
			</td>

		<tr align="center">

			<td>
				<select name="codigoSorteador" style="height:50px; width:200px; vertical-align: middle;font-size:20px;">

					<option class="h1"></option><?php $sql = "select cod, nome, email from sorteador where realizado<>'1' order by nome";

										$res = mysqli_query($conexao, $sql);

										while ($lin = mysqli_fetch_array($res)) {
											$codigo  = $lin["cod"];

											$nome    = $lin["nome"];

											$email    = $lin["email"];
											if ($codigoSorteador == $codigo) {

												$nomeSorteador    = $lin["nome"];


												$selecionado = "selected";
											} else {

												$selecionado = "";
											}
											echo "<option value='$codigo'>$nome</option>";
										}

										?>

				</select>

			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
		</tr>
		</tr>

		<td align="center"><input type="submit" value="Sortear" style="height:50px; width:200px; font-size:20px"></td><br>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
				<div align="center"><a href="https://proportional-stroke.000webhostapp.com/comentario.php">Clique aqui para dizer o que gostaria de ganhar!</a>
			</td>
		</tr>
		<tr>
		</tr>
	</form>

</table>

</html>