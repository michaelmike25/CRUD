<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Pessoa.php';

$db = new Conexao();

$con = $db->getConexao();

$post = new Pessoa($con);

$resultado = $post->read();

echo json_encode($resultado);