<?php
require_once("config.php");

//Carrega 1 usuário
//$usuario = new Usuario();

//Carregando um usuário pelo seu Id
//$usuario->loadById(1);

 //Imprimindo um objeto (O objeto da classe usuario é impresso pelo metodo __toString da classe Usuário)
//echo $usuario;

//===================================================================

//Carrega 1 lista de usuario

// O metodo getList é Estatico, sendo assim o mesmo não precisa ser Instanciado.

//$usuarios = Usuario::getList();

//echo json_encode($usuarios);



//===================================================================

//Carrega usuario pela string passada como parametro

// O metodo search é Estatico, sendo assim o mesmo não precisa ser Instanciado.

//$search = Usuario::search('ab');

//echo json_encode($search);


//===================================================================

//Carrega usuario autenticado

// O metodo login não pode ser estatico, porque ele vai estar amarrado à classe pelo $this
//$usuario = new Usuario();
//$usuario->login("maria","123456");

//echo $usuario;



//Insere usuario
// O metodo criarUsuario
/*
$usuario = new Usuario();

$usuario->setDeslogin("wilton.paula");
$usuario->setDessenha("123.qwe");
$usuario->setNome("Wilton de Paula");

$usuario->criarUsuario();

echo $usuario;
*/

//Atuaiza usuario
// O metodo atualizaUsuario
/*
$usuario = new Usuario();
$usuario->loadById(5);
$usuario->atualizaUsuario("wilton_abreu","123.qwe!@#", "Wilton Abreu de Paula");

echo $usuario;
*/

//Deleta usuario
// O metodo delete

$usuario = new Usuario();
$usuario->loadById(5);
$usuario->delete();

echo $usuario;
?>