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

	public function insert($table, $fields = [])
	{
		$keys = array_keys($fields);
		$values_sql = [];

		foreach ($keys as $key)
		{
			array_push($values_sql, ":{$key}");
		}

		$fields_sql = join(', ', $keys);
		$values_sql = join(', ', $values_sql);

		$stmt = $this->pdo->prepare("INSERT INTO {$table} ({$fields_sql}) VALUES ({$values_sql})");
		$stmt->execute($fields);

		return $this->pdo->lastInsertId();
	}

	public function update($table, $fields = [], $criteria = [])
	{
		$fields_keys = array_keys($fields);
		$criteria_keys = array_keys($criteria);
		$fields_sql = [];
		$criteria_sql = [];

		foreach ($fields_keys as $key)
		{
			array_push($fields_sql, "`{$key}` = :{$key}");
		}

		foreach ($criteria_keys as $key)
		{
			array_push($criteria_sql, "`{$key}` = :{$key}");
		}

		$fields_sql = join(', ', $fields_sql);
		$criteria_sql = join(' AND ', $criteria_sql);

		$stmt = $this->pdo->prepare("UPDATE {$table} SET {$fields_sql} WHERE {$criteria_sql}");

		$stmt->execute(array_merge($fields, $criteria));

		return $this->pdo->lastInsertId();
	}

	public function delete($table, $criteria = [])
	{
		$criteria_keys = array_keys($criteria);
		$criteria_sql = [];

		foreach ($criteria_keys as $key)
		{
			array_push($criteria_sql, "`{$key}` = :{$key}");
		}

		$criteria_sql = join(' AND ', $criteria_sql);

		$stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE {$criteria_sql}");

		$stmt->execute($criteria);

		return $this->pdo->lastInsertId();
	}
}