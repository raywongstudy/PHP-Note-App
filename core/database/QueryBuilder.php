<?php

namespace App\Database;
use PDO;

class QueryBuilder
{
	protected $pdo;
	protected $model;

	public function __construct(PDO $pdo, $model = null)
	{
		$this->pdo = $pdo;
		$this->model = $model;
	}

	public function bindModel($model)
	{
		return new self($this->pdo, $model);
	}
	
	public function fetchAll($table)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM {$table}");
		$stmt->execute([$table]);

		if (!is_null($this->model)) {
			return $stmt->fetchAll(PDO::FETCH_CLASS, $this->model);
		} else {
			return $stmt->fetchAll(PDO::FETCH_CLASS);
		}
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

		if (!is_null($this->model)) {
			return $stmt->fetchObject($this->model);
		} else {
			return $stmt->fetch(PDO::FETCH_CLASS);
		}
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