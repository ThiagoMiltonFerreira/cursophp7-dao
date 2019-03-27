<?php

require_once("config.php");

$sql = new sql();

$usuarios = $sql->select("SELECT * FROM dbphp7.tb_usuarios");

echo json_encode($usuarios);



?>