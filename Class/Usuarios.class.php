<?php

class Usuarios {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($Value){

		$this->idusuario = $Value;
	}

	public function getDeslogin(){

		return $this->deslogin;
	}

	public function setDeslogin($Value){

		$this->deslogin = $Value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($Value){
		$this->dessenha = $Value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($Value){
		$this->dtcadastro = $Value;
	}
     // Função para carregar apenas um usuario
	public function loadById ($id){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
          ":ID"=>$id));

		if (count($results) > 0){
			$this->setData($results[0]);
		}
	}
      // função para carregar lista de usuarios
	public static function getList(){

		$sql = new Sql();
		return  $sql-> select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}
    //Função para carregar usuarios buscando pelo login
	public static function search($login){

		$sql = new Sql();
		return $sql-> select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%".$login. "%"
		));
	}

public function login($login, $password){
      $sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD ", array(
          ":LOGIN"=>$login,
          ":PASSWORD"=>$password
      ));

		if (count($results) > 0){
			
			$this->setData($results[0]);


	} else {
		
        throw new Exception("Login ou senha invalido.");	
	
	}
}

public function setData($data){
            
            $this->setIdusuario($data['idusuario']);
			$this->setDeslogin($data['deslogin']);
			$this->setDessenha($data['dessenha']);
			$this->setDtcadastro(new DateTime($data['dtcadastro']));

	}


	
	public function insert(){

		$sql = new Sql();
		$results = $sql->select("Call sp_usuarios_insert(:LOGIN , :PASSWORD)", array (':LOGIN'=>$this->getDeslogin(), ':PASSWORD'=>$this->getDessenha()
		));

		if (count($results) > 0) {
			
			$this->setData($results[0]);
		}
	} 

	public function update($login, $password){
        
        $this->setDeslogin($login);
        $this->setDessenha($password);

		$sql = new Sql();
		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = : ID", array(
             ':LOGIN'=>$this->getDeslogin(),
             ':PASSWORD'=>$this->getDessenha(),
             ':ID'=>$this->getIdusuario()
			));

	}

	public function __construct($Login = "", $password = ""){

		$this->setDeslogin($Login);
		$this->setDessenha($password);
	}
     

     
     //Função para gerar Json
	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}

	
}



?>