<?php

class QueryBuilder
{
	protected $pdo;

	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function fetchAll($table)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM {$table}");
		$stmt->execute([$table]);

		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}