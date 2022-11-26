<?php
class Usuario{

    private $idusuario;
    private $deslogin;
    private $nome;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }
    public function setIdusuario($value){
        $this->idusuario =$value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }
    public function setDeslogin($value){
        $this->deslogin =$value;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome =$value;
    }

    public function getDessenha(){
        return $this->dessenha;
    }
    public function setDessenha($value){
        $this->dessenha =$value;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    public function setDtcadastro($value){
        $this->dtcadastro =$value;
    }
    
//============================================================================
    /*Metodo loadById
        Metodo que carrega um usuário pelo seu Identificador
    */
    public function loadById($id){
        
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if(count($result[0]) > 0){

            $row = $result[0];
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setNome($row['nome']);  
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new Datetime($row['dtcadastro'])); 
           
        }
    }

    /*Fim loadById*/

//============================================================================

    /*Metodo Mágico __toString
        Metodo que imprime um Objeto quando a classe é Instanciada
    */
    public function __toString(){
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "delogin"=>$this->getDeslogin(),
            "nome"=>$this->getNome(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d-m-Y H:i:s")
        ));
    }
     /*FIM Metodo Mágico __toString*/



//============================================================================

    /*Metodo Mágico getList
        Metodo que imprime todos os usuários
    */

    public static function getList(){
        
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
        
    }
     /*FIM MetodogetList*/

//============================================================================

//============================================================================

    /*Metodo  search
        Metodo que imprime um usuário pelo seu nome
    */

    public static function search($login){
        
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios  WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%" . $login . "%"
        ));
        
    }
     /*FIM Metodo search*/

//============================================================================

    /*Metodo  login
        Metodo que imprime um usuário autenticado
    */

    public function login($login, $password){
        
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN  AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            "PASSWORD"=>$password
        ));

        if(count($result) > 0){

            $row = $result[0];
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']); 
            $this->setNome($row['nome']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new Datetime($row['dtcadastro'])); 
           
        } else {
            throw new Exception("LOGIN E OU SENHA INVÁLIDOS");
            
        }
        
    }
     /*FIM Metodo search*/

//============================================================================

}


?>