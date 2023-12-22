<?php

  error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

  $host = "localhost";

  $user = "id21698500_u390677180_sort";
  $pass = "9KHbxiZg6Z#";

  $base = "id21698500_u390677180_sort";
 
  
$conexao = mysqli_connect($host, $user, $pass) or
 die("ERRO : " . mysqli_error($conexao));

  mysqli_select_db($conexao, $base) or
 die("ERRO : " . mysqli_error($conexao));




?>