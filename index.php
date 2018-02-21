<?php

require_once ("cf.php");

//Carrega apenas um usuario
//$user = new Usuarios();
//$user ->loadById(12);
//echo $user;

// carrega um alista de Usuarios
//$lista = Usuarios::getList();
//echo json_encode($lista);

// Carrega uma lista de dados buscando pelo login

  //$search = Usuarios::search("test");
  //echo json_encode($search);

// carrega usuario usuando login e senha

//$user = new Usuarios();
//$user->login("teste", "122318");

//echo $user;

/* Criando um novo usuario */

//$user = new Usuarios('Lello', "122318");

//$user->insert();

//echo $user;

/* Atualizando um Usuario */
$user = new Usuarios();

$user -> loadById(5);

$user  -> update("eu", "12456787");

echo $user;

/* Deletando Um Usuario */

//$user = new Usuarios();
//$user->loadById(15);
//$user->delete();
//echo $user;






?>
