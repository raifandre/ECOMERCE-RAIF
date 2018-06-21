<?php
  include_once("../controllers/Cupom_Controller.php");
  $cupom = new Cupom_Controller;
  $nomeCupom = $_GET ["nomeCupom"];

  if (isset($_POST ["nome"])){
    $cupom->validar($nomeCupom);

}