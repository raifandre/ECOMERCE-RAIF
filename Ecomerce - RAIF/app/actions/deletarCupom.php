<?php
    include_once("../controllers/Cupom_Controller.php");
    $id = $_GET['id'];
    $cupom = new Cupom_Controller;
    $deletar = $cupom->deletar($id);
?>