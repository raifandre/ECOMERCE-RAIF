<?php
	include_once("../controllers/Cupom_Controller.php");
	$cupom = new Cupom_Controller;

	if (isset ($_POST ["alterarCupom"])){
	    $cupom->alterar();
	}