<?php
  if (isset($_POST ["cadastrarCupom"])){

    include_once("../controllers/Cupom_Controller.php");
    $cupom = new Cupom_Controller;
    $cupom->cadastrar();

}