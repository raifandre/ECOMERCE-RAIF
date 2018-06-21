<?php
    include_once ('Controller.php');
    include_once (__DIR__.'../../models/cupom.php');

class Cupom_Controller extends Controller{

    private $cupom;

    public function __construct() {
        parent::__construct();
        $this->cupom = new cupom;
    }

    public function cadastrar() {

      $this->cupom->nome($this->input->get('nome'))
                    ->desconto($this->input->get('desconto'));

      $resultado = $this->cupom->cadastrar();

      if($resultado) {
        echo ('Cadastro realizado com sucesso.');
        return true;
      } else {
        echo ('Ocorreu um erro durante o cadastro, tente novamente mais tarde.');
        return false;
      }
    }

    public function alterar() {

        $this->cupom->id($this->input->get('alterarCupom'))
                      ->nome($this->input->get('nome'))
                      ->desconto($this->input->get('desconto'));

        $resultado = $this->cupom->alterar();

        if($resultado) {
          echo ('Dados alterado com sucesso.');
          return true;
        } else {
          echo ('Ocorreu um erro, tente novamente mais tarde.');
          return false;
        }
    }

    public function validar($nomeCupom){

      $resultado = $this->cupom->validar($nomeCupom);
      echo $resultado->desconto;


    }

    public function buscarId($id) {

        return $this->cupom->buscarId($id);

    }

    public function listar() {

        return $this->cupom->listar();

    }

    public function deletar($id) {

        try {
          $resultado = $this->cupom->deletar($id);
        } catch(Exception $e) {
          echo $e->getMessage();
        }

        if($resultado) {
            header('Location: ../views/listarCupons.php');
        }

    }

}