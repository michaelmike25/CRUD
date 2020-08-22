<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Pessoa.php';

$db = new Conexao();

$con = $db->getConexao();

$pessoa = new Pessoa($con);

$data = json_decode(file_get_contents('php://input'), true);
$pessoa->id = $data['id'];
$pessoa->nome = $data['nome'];
$pessoa->cpf = $data['cpf'];
$pessoa->whatsapp = $data['whatsapp'];

if ($pessoa->update()){
	$res = array('status', 'ok');
}else{
	$res = array('status', 'falha na alteracao');
}

echo json_encode($res);