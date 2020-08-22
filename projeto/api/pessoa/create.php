<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Pessoa.php';

$db = new Conexao();

$con = $db->getConexao();

$data = json_decode(file_get_contents('php://input'), true);

$pessoa = new Pessoa($con);
$pessoa->id = $data['id'];
$pessoa->nome = $data['nome'];
$pessoa->cpf = $data['cpf'];
$pessoa->whatsapp = $data['whatsapp'];

if ($pessoa->create()){
	http_response_code(201);
	echo json_encode(['mensagem'=>'Pessoa criado']);
}else{
	echo json_encode(['mensagem'=>'Pessoa não foi criado']);
}

