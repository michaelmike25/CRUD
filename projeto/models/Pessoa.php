<?php
header('Access-Control-Allow-Origin: *');
class Pessoa{
	public $id;
	public $nome;
	public $cpf;
	public $whatsapp;
	private $conexao;

	public function __construct($con){
		$this->conexao = $con;

	}

	public function read(){
		$consulta = "SELECT idPessoa, nome, cpf, whatsapp from Pessoa ";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->execute();
		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
		die(json_encode($resultado));
	}

	public function create(){
		$consulta = "INSERT INTO Pessoa(nome, cpf, whatsapp) VALUES(:nome,:cpf,:whatsapp)";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->bindParam(':nome', $this->nome , PDO::PARAM_STR);
		$stmt->bindParam(':cpf', $this->cpf , PDO::PARAM_STR);
		$stmt->bindParam(':whatsapp', $this->whatsapp , PDO::PARAM_STR);
		if ($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function update(){
		$consulta = "UPDATE Pessoa SET nome = :nome, cpf = :cpf, whatsapp = :whatsapp WHERE idPessoa = :id;";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->bindParam(':id', $this->id , PDO::PARAM_INT);
		$stmt->bindParam(':nome', $this->nome , PDO::PARAM_STR);
		$stmt->bindParam(':cpf', $this->cpf , PDO::PARAM_STR);
		$stmt->bindParam(':whatsapp', $this->whatsapp , PDO::PARAM_STR);
		try {
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function delete(){
		$consulta = "DELETE FROM Pessoa WHERE idPessoa = :id";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->bindParam(':id', $this->id , PDO::PARAM_INT);
		try {
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
}