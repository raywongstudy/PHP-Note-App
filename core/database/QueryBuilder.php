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

	public function fetchOne($table, $criteria = [])
	{
		$keys = array_keys($criteria);
		$criteria_sql = [];

		foreach ($keys as $key)
		{
			array_push($criteria_sql, "`{$key}` = :{$key}");
		}

		$criteria_sql = join(' AND ', $criteria_sql);

		$stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$criteria_sql}");
		$stmt->execute($criteria);

		return $stmt->fetch(PDO::FETCH_OBJ);
	}
}