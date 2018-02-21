<?php

require_once ("cf.php");

//Carrega apenas um usuario
//$user = new Usuarios();
//$user ->loadById(4);
//echo $user;

// carrega um alista de Usuarios
//$lista = Usuarios::getList();
//echo json_encode($lista);

// Carrega uma lista de dados buscando pelo login

  //$search = Usuarios::search("jo");
   //echo json_encode($search);

// carrega usuario usuando login e senha

//$user = new Usuarios();
//$user->login("teste", "122318");

//echo $user;

$aluno = new Usuarios("Lello", "122318");

$aluno->insert();

echo $aluno;



?>