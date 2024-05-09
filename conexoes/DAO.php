<?php
abstract class DAO {
    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    abstract public function create($data);
    abstract public function read();
    abstract public function update($data);
    abstract public function delete($id);
}