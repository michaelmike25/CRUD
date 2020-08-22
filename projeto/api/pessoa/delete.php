<?php
header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Pessoa.php';

$db = new Conexao();

$con = $db->getConexao();

$post = new Pessoa($con);

$data = json_decode(file_get_contents('php://input'), true);
$post->id = $data['id'];

if ($post->delete()){
	$res = array('status', 'ok');
}else{
	$res = array('status', 'falha na alteracao');
}

echo json_encode($res);