<?php
include_once(__DIR__."../../models/Model.php");

  class cupom extends Model {
    // propriedades da classe objeto
    public $id;
    public $nome;
    public $desconto;

   	public function __construct() {
        $this->open();
    }

    public function cadastrar(){

        $this->conn->beginTransaction();

        $cadastrar = $this->conn->query("INSERT INTO cupom (nome, desconto)
            VALUES ('$this->nome', '$this->desconto')");

        if($cadastrar){

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function alterar() {
        $this->conn->beginTransaction();

        $alterar = $this->conn->query("UPDATE cupom SET nome = '$this->nome', desconto = '$this->desconto' WHERE id = '$this->id'");


        if($alterar) {

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function validar($nomeCupom) {

        $nome = $nomeCupom;

        $sql = "SELECT * FROM cupom WHERE nome = :nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function deletar($id) {

        $sql = "DELETE FROM cupom WHERE id = '$id'";
        $stmt = $this->conn->prepare($sql);
        $resultado = $stmt->execute();
        return $resultado;

    }

    public function buscarId($id) {
        $sql = "SELECT * FROM cupom WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function listar() {
        $sql = "SELECT * FROM cupom";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

};